<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\SoftwareCategory;
use App\Models\SoftwareItem;
use App\Support\CatalogPages;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FileHippoController extends Controller
{
    public function index(Request $request): View
    {
        $category = (string) $request->query('category', 'all');
        $search = trim((string) $request->query('q', ''));
        $platform = (string) $request->query('platform', '');
        $license = (string) $request->query('license', 'all');
        $sort = (string) $request->query('sort', 'popular');

        $categories = SoftwareCategory::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->get();

        $query = SoftwareItem::query()
            ->where('is_published', true)
            ->with('categories');

        if ($category !== '' && $category !== 'all') {
            $query->whereHas('categories', fn ($q) => $q->where('slug', $category));
        }

        if ($search !== '') {
            $query->where(function ($inner) use ($search) {
                $inner->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }

        if ($platform !== '') {
            $query->where(function ($inner) use ($platform) {
                $inner->whereJsonContains('platforms', $platform)
                    ->orWhere('platforms', 'like', '%'.$platform.'%');
            });
        }

        if ($license !== '' && $license !== 'all') {
            $query->where('license', $license);
        }

        match ($sort) {
            'newest' => $query->orderByDesc('id'),
            'rated' => $query->orderByDesc('rating'),
            default => $query->orderBy('sort_order')->orderBy('id'),
        };

        $items = $query->get();

        $publishedItems = SoftwareItem::query()
            ->where('is_published', true)
            ->with('categories:id,slug')
            ->get();

        $categoryCounts = ['all' => $publishedItems->count()];
        foreach ($categories as $cat) {
            $categoryCounts[$cat->slug] = $publishedItems
                ->filter(fn (SoftwareItem $item) => $item->categories->contains('slug', $cat->slug))
                ->count();
        }

        $seo = CatalogPages::find(CatalogPages::SOFTWARE)
            ?? new Page([
                'title' => 'Software Downloads',
                'breadcrumb_title' => 'FileHippo',
                'meta_title' => 'Software Downloads | '.SiteSetting::current()->site_name,
                'sections' => [],
            ]);

        return view('frontend.filehippo.index', [
            'items' => $items,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
            'activeCategory' => $category,
            'search' => $search,
            'platform' => $platform,
            'license' => $license,
            'sort' => $sort,
            'seo' => $seo,
        ]);
    }

    public function show(string $software): View
    {
        $item = SoftwareItem::query()
            ->where('is_published', true)
            ->where('slug', $software)
            ->with('categories')
            ->firstOrFail();

        $related = SoftwareItem::query()
            ->where('is_published', true)
            ->where('id', '!=', $item->id)
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        return view('frontend.filehippo.show', [
            'item' => $item,
            'related' => $related,
            'seo' => $item,
        ]);
    }
}
