<?php

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
            return request()->routeIs($item->route_name);
        }

        return rtrim(url()->current(), '/') === rtrim($item->href, '/');
    }
}
