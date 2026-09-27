<?php

namespace App\Http\Controllers;

use App\Models\MarketplaceCategory;
use App\Models\MarketplaceProduct;
use App\Models\Page;
use App\Models\SiteSetting;
use App\Support\CatalogPages;
use App\Support\SoftwareDefaults;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarketplaceController extends Controller
{
    public function index(Request $request): View
    {
        $categories = MarketplaceCategory::query()
            ->where('is_published', true)
            ->withCount(['products as products_count' => fn ($q) => $q->where('is_published', true)])
            ->orderBy('sort_order')
            ->get();

        $query = MarketplaceProduct::query()
            ->where('is_published', true)
            ->with('category');

        $search = trim((string) $request->query('q', ''));
        if ($search !== '') {
            $query->where(function ($inner) use ($search) {
                $inner->where('title', 'like', '%'.$search.'%')
                    ->orWhere('short_description', 'like', '%'.$search.'%')
                    ->orWhere('sku', 'like', '%'.$search.'%');
            });
        }

        $categorySlug = (string) $request->query('category', '');
        $activeCategory = null;

        if ($categorySlug !== '') {
            $activeCategory = $categories->firstWhere('slug', $categorySlug);
            if ($activeCategory) {
                $query->where('marketplace_category_id', $activeCategory->id);
            }
        }

        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');

        if (is_numeric($minPrice)) {
            $query->whereRaw('COALESCE(NULLIF(sale_price, 0), price) >= ?', [(float) $minPrice]);
        }

        if (is_numeric($maxPrice)) {
            $query->whereRaw('COALESCE(NULLIF(sale_price, 0), price) <= ?', [(float) $maxPrice]);
        }

        $sort = (string) $request->query('sort', 'latest');
        match ($sort) {
            'price_low' => $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) ASC'),
            'price_high' => $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) DESC'),
            default => $query->orderByDesc('is_featured')->orderBy('sort_order')->orderByDesc('id'),
        };

        $products = $query->paginate(10)->withQueryString();

        $featured = MarketplaceProduct::query()
            ->where('is_published', true)
            ->where('is_featured', true)
            ->with('category')
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        if ($featured->isEmpty()) {
            $featured = MarketplaceProduct::query()
                ->where('is_published', true)
                ->with('category')
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->take(5)
                ->get();
        }

        $seo = CatalogPages::find(CatalogPages::MARKETPLACE)
            ?? new Page([
                'title' => 'Marketplace',
                'breadcrumb_title' => 'Marketplace',
                'meta_title' => 'Marketplace | '.SiteSetting::current()->site_name,
                'sections' => SoftwareDefaults::marketplacePageSections(),
            ]);

        if (blank($seo->sections)) {
            $seo->sections = SoftwareDefaults::marketplacePageSections();
        }

        return view('frontend.marketplace.index', [
            'products' => $products,
            'featured' => $featured,
            'categories' => $categories,
            'activeCategory' => $activeCategory,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sort' => $sort,
            'search' => $search,
            'seo' => $seo,
        ]);
    }

    public function show(MarketplaceProduct $product): View
    {
        abort_unless($product->is_published, 404);
        $product->loadMissing('category');

        $siblings = MarketplaceProduct::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'slug', 'title', 'image']);

        $index = $siblings->search(fn ($item) => $item->id === $product->id);
        $previous = $index !== false ? $siblings->get($index - 1) : null;
        $next = $index !== false ? $siblings->get($index + 1) : null;

        return view('frontend.marketplace.show', [
            'product' => $product,
            'previous' => $previous,
            'next' => $next,
            'seo' => $product,
        ]);
    }
}
