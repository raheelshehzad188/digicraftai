<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'slug', 'designation', 'image', 'bio', 'content',
        'facebook', 'twitter', 'linkedin', 'instagram',
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
