<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = [
        'key', 'name', 'title', 'subtitle', 'content', 'button_text',
        'button_url', 'image', 'extra', 'is_visible', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'extra' => 'array',
            'is_visible' => 'boolean',
        ];
    }

    public static function byKey(string $key): ?self
    {
        return static::query()->where('key', $key)->first();
    }
}
