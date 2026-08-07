<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'slug', 'designation', 'image', 'bio', 'content',
        'facebook', 'twitter', 'linkedin', 'instagram',
        'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description',
        'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }

    protected static function booted(): void
    {
        static::saving(function (Team $team) {
            if (blank($team->slug)) {
                $team->slug = \Illuminate\Support\Str::slug($team->name);
            }
        });
    }
}
