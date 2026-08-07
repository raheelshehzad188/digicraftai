<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageBanner extends Model
{
    protected $fillable = [
        'page_key',
        'label',
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'background_image',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('page_banners_map'));
        static::deleted(fn () => Cache::forget('page_banners_map'));
    }

    public static function forKey(string $key): ?self
    {
        $map = Cache::remember('page_banners_map', 600, function () {
            return static::query()
                ->where('is_active', true)
                ->get()
                ->keyBy('page_key');
        });

        return $map->get($key) ?? $map->get('default');
    }

    public function getBackgroundUrlAttribute(): string
    {
        return $this->background_image
            ? asset('storage/'.$this->background_image)
            : asset('assets/img/carousel-2.jpg');
    }
}
