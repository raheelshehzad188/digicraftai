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
    function cms_image(?string $path, string $fallback): string
    {
        return $path ? asset('storage/'.$path) : asset('assets/img/'.$fallback);
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
