<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'image', 'excerpt', 'content', 'author',
        'published_at', 'comments_count',
        'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description',
        'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if (blank($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }
}
