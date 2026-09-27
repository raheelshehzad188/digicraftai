<?php

namespace App\Support;

use App\Models\Page;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CatalogPages
{
    public const MARKETPLACE = 'marketplace';

    public const SOFTWARE = 'filehippo';

    /**
     * @return list<string>
     */
    public static function reservedPrefixes(): array
    {
        return [
            'admin',
            'livewire',
            'storage',
            'assets',
            'build',
            'vendor',
            'filament',
            'quote',
            'contact',
            'about',
            'services',
            'team',
            'projects',
            'blog',
            'faq',
            'newsletter',
            'plan',
            'page',
            'login',
            'register',
            'password',
            'image-tools',
            'preview',
        ];
    }

    public static function find(string $key): ?Page
    {
        try {
            $page = Page::query()->where('system_key', $key)->first();

            if ($page) {
                return $page;
            }

            $page = Page::query()->where('slug', $key)->first();

            if ($page && blank($page->system_key)) {
                $page->forceFill(['system_key' => $key])->save();
            }

            return $page;
        } catch (\Throwable) {
            return null;
        }
    }

    public static function ensure(string $key, array $attributes = []): Page
    {
        $page = static::find($key);

        if ($page) {
            if (blank($page->system_key)) {
                $page->forceFill(['system_key' => $key])->save();
            }

            return $page;
        }

        return Page::query()->create(array_merge([
            'slug' => $key,
            'system_key' => $key,
            'title' => $key === self::SOFTWARE ? 'Software Downloads' : 'Marketplace',
            'breadcrumb_title' => $key === self::SOFTWARE ? 'Software' : 'Marketplace',
            'template' => 'default',
            'is_published' => true,
        ], $attributes));
    }

    public static function slug(string $key, ?string $fallback = null): string
    {
        $fallback ??= $key;

        try {
            return Cache::remember('catalog_page_slug_'.$key, 120, function () use ($key, $fallback) {
                $slug = static::find($key)?->slug;

                return filled($slug) ? (string) $slug : $fallback;
            });
        } catch (\Throwable) {
            return $fallback;
        }
    }

    public static function forgetCache(): void
    {
        Cache::forget('catalog_page_slug_'.self::MARKETPLACE);
        Cache::forget('catalog_page_slug_'.self::SOFTWARE);

        try {
            Artisan::call('route:clear');
        } catch (\Throwable) {
            // Route cache may not exist.
        }
    }

    public static function isReserved(string $slug, ?string $exceptKey = null): bool
    {
        $slug = Str::slug($slug);

        if ($slug === '' || in_array($slug, static::reservedPrefixes(), true)) {
            return true;
        }

        foreach ([self::MARKETPLACE, self::SOFTWARE] as $key) {
            if ($exceptKey === $key) {
                continue;
            }

            if (static::slug($key, $key) === $slug) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array{ok: bool, slug: string, message: ?string}
     */
    public static function sanitizeSlug(string $slug, Page $page, string $key): array
    {
        $slug = Str::slug($slug);

        if ($slug === '') {
            return ['ok' => false, 'slug' => $slug, 'message' => 'Slug cannot be empty.'];
        }

        if (static::isReserved($slug, $key)) {
            return ['ok' => false, 'slug' => $slug, 'message' => 'This URL is reserved. Choose another slug.'];
        }

        $taken = Page::query()
            ->where('slug', $slug)
            ->where('id', '!=', $page->id)
            ->exists();

        if ($taken) {
            return ['ok' => false, 'slug' => $slug, 'message' => 'This slug is already used by another page.'];
        }

        return ['ok' => true, 'slug' => $slug, 'message' => null];
    }

    public static function routeExclusions(): string
    {
        $parts = array_merge(static::reservedPrefixes(), ImageTools::slugs(), [
            'marketplace',
            'filehippo',
            'software',
            static::slug(self::MARKETPLACE, 'marketplace'),
            static::slug(self::SOFTWARE, 'filehippo'),
        ]);

        $parts = array_values(array_unique(array_filter($parts)));

        return implode('|', array_map(fn (string $part) => preg_quote($part, '/'), $parts));
    }
}
