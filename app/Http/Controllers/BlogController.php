<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('frontend.blog', [
            'blogs' => Blog::query()->where('is_published', true)->orderByDesc('published_at')->orderBy('sort_order')->get(),
        ]);
    }

    public function show(string $slug): View
    {
        $blog = Blog::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $related = Blog::query()->where('is_published', true)->where('id', '!=', $blog->id)->orderBy('sort_order')->limit(3)->get();

        return view('frontend.blog-detail', compact('blog', 'related'));
    }
}
