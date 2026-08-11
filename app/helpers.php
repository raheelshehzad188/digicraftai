<?php

if (! function_exists('cms_html')) {
    function cms_html(?string $html): string
    {
        if (blank($html)) {
            return '';
        }

        // If content is plain text (no tags), wrap paragraphs.
        if ($html === strip_tags($html)) {
            return '<p>'.nl2br(e($html)).'</p>';
        }

        return $html;
    }
}

if (! function_exists('cms_image')) {
    /**
     * Resolve a CMS image URL.
     * Uses /raw-file/* so Hostinger CDN cannot rewrite image bytes.
     */
    function cms_image(?string $path, string $fallback = ''): string
    {
        if ($path) {
            $path = ltrim($path, '/');

            // Explicit asset path stored in DB / admin
            if (str_starts_with($path, 'assets/')) {
                return url('/raw-file/'.$path);
            }

            $basename = basename($path);

            // Theme stock images (assets/img)
            if ($basename !== '' && is_file(public_path('assets/img/'.$basename))) {
                return url('/raw-file/assets/img/'.$basename);
            }

            // Admin uploads live under public/media
            if (is_file(public_path('media/'.$path))) {
                return url('/raw-file/media/'.$path);
            }

            return url('/raw-file/media/'.$path);
        }

        return $fallback !== ''
            ? url('/raw-file/assets/img/'.$fallback)
            : '';
    }
}

if (! function_exists('menu_is_active')) {
    function menu_is_active(object $item): bool
    {
        if ($item->type === 'route' && $item->route_name) {
            return request()->routeIs($item->route_name)
                || request()->routeIs($item->route_name.'.*')
                || request()->routeIs($item->route_name.'.show');
        }

        return rtrim(url()->current(), '/') === rtrim($item->href, '/');
    }
}

if (! function_exists('page_banner_seo')) {
    /**
     * Resolve SEO meta from Page Banners admin, with optional fallbacks.
     *
     * @param  array{title?:string|null,description?:string|null,keywords?:string|null}  $fallback
     * @return array{title:string,description:string,keywords:string,og_title:string,og_description:string}
     */
    function page_banner_seo(string $key, array $fallback = []): array
    {
        $banner = \App\Models\PageBanner::forKey($key);
        $settings = view()->shared('settings');
        $siteName = $settings->site_name ?? config('app.name', 'Site');
        $tagline = $settings->tagline ?? '';
        $isDetail = str_ends_with($key, '_detail');

        // List pages: admin SEO wins. Detail pages: item fallback wins (unique titles).
        if ($isDetail) {
            $title = $fallback['title'] ?? $banner?->meta_title ?: $siteName;
            $description = $fallback['description'] ?? $banner?->meta_description ?: $tagline;
            $keywords = $banner?->meta_keywords ?: ($fallback['keywords'] ?? $tagline);
        } else {
            $title = $banner?->meta_title ?: ($fallback['title'] ?? $siteName);
            $description = $banner?->meta_description ?: ($fallback['description'] ?? $tagline);
            $keywords = $banner?->meta_keywords ?: ($fallback['keywords'] ?? $tagline);
        }

        $ogTitle = $banner?->og_title ?: $title;
        $ogDescription = $banner?->og_description ?: $description;

        return [
            'title' => $title,
            'description' => (string) $description,
            'keywords' => (string) $keywords,
            'og_title' => $ogTitle,
            'og_description' => (string) $ogDescription,
        ];
    }
}

if (! function_exists('entity_seo')) {
    /**
     * Prefer per-record SEO fields, then page-banner SEO, then fallbacks.
     *
     * @param  array{title?:string|null,description?:string|null,keywords?:string|null}  $fallback
     * @return array{title:string,description:string,keywords:string,og_title:string,og_description:string}
     */
    function entity_seo(object $record, string $bannerKey, array $fallback = []): array
    {
        $base = page_banner_seo($bannerKey, $fallback);

        $title = $record->meta_title ?: $base['title'];
        $description = $record->meta_description ?: $base['description'];
        $keywords = $record->meta_keywords ?: $base['keywords'];
        $ogTitle = $record->og_title ?: ($record->meta_title ?: $base['og_title']);
        $ogDescription = $record->og_description ?: ($record->meta_description ?: $base['og_description']);

        return [
            'title' => $title,
            'description' => (string) $description,
            'keywords' => (string) $keywords,
            'og_title' => $ogTitle,
            'og_description' => (string) $ogDescription,
        ];
    }
}
