<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasSeo;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'sections' => 'array',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Page $page) {
            if (blank($page->slug) && filled($page->title)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function section(string $key, mixed $default = null): mixed
    {
        return data_get($this->sections ?? [], $key, $default);
    }

    public function sectionMedia(string $key, ?string $default = null): ?string
    {
        $path = $this->section($key, $default);

        if (blank($path)) {
            return $default;
        }

        if (str_starts_with((string) $path, 'http://') || str_starts_with((string) $path, 'https://')) {
            return (string) $path;
        }

        if (str_starts_with((string) $path, 'assets/')) {
            return asset((string) $path);
        }

        return asset('storage/'.$path);
    }
}
