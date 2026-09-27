<?php

namespace App\Support;

use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Support\Collection;

class SystemPages
{
    /**
     * Core frontend routes that use page banners from DB.
     *
     * @return array<string, array{title: string, breadcrumb_title: string, template: string}>
     */
    public static function definitions(): array
    {
        return [
            'about' => [
                'title' => 'About Us',
                'breadcrumb_title' => 'About Us',
                'template' => 'about',
            ],
            'contact' => [
                'title' => 'Contact Us',
                'breadcrumb_title' => 'Contact Us',
                'template' => 'contact',
            ],
            'services' => [
                'title' => 'Our Services',
                'breadcrumb_title' => 'Services',
                'template' => 'default',
            ],
            'team' => [
                'title' => 'Our Team',
                'breadcrumb_title' => 'Team',
                'template' => 'default',
            ],
            'projects' => [
                'title' => 'Our Projects',
                'breadcrumb_title' => 'Projects',
                'template' => 'default',
            ],
            'blog' => [
                'title' => 'Blog',
                'breadcrumb_title' => 'Blog',
                'template' => 'default',
            ],
            'faq' => [
                'title' => 'FAQs',
                'breadcrumb_title' => 'FAQs',
                'template' => 'default',
            ],
            'quote' => [
                'title' => 'Get A Quote',
                'breadcrumb_title' => 'Get A Quote',
                'template' => 'default',
            ],
            'marketplace' => [
                'title' => 'Marketplace',
                'breadcrumb_title' => 'Marketplace',
                'template' => 'default',
            ],
            'filehippo' => [
                'title' => 'Software Downloads',
                'breadcrumb_title' => 'FileHippo',
                'template' => 'default',
            ],
        ];
    }

    /**
     * Create missing system pages (does not overwrite existing content/banners).
     *
     * @return Collection<int, Page>
     */
    public static function ensure(): Collection
    {
        $pages = collect();

        foreach (self::definitions() as $slug => $data) {
            $attributes = [
                'title' => $data['title'],
                'breadcrumb_title' => $data['breadcrumb_title'],
                'template' => $data['template'],
                'is_published' => true,
                'sort_order' => 0,
                'meta_title' => $data['title'],
            ];

            if (in_array($slug, ['marketplace', 'filehippo'], true)) {
                $page = Page::query()->where('system_key', $slug)->first()
                    ?? Page::query()->where('slug', $slug)->first();

                if ($page) {
                    if (blank($page->system_key)) {
                        $page->forceFill(['system_key' => $slug])->save();
                    }
                } else {
                    $page = Page::query()->create(array_merge($attributes, [
                        'slug' => $slug,
                        'system_key' => $slug,
                    ]));
                }
            } else {
                $page = Page::query()->firstOrCreate(
                    ['slug' => $slug],
                    $attributes
                );
            }

            $pages->push($page);
        }

        self::ensureNavLinks();

        return $pages;
    }

    /**
     * Keep Marketplace and Software in header (and footer quick links).
     */
    public static function ensureNavLinks(): void
    {
        $headerLinks = [
            ['label' => 'Marketplace', 'route_name' => 'marketplace.index', 'sort_order' => 6],
            ['label' => 'Software', 'route_name' => 'filehippo.index', 'sort_order' => 7],
        ];

        foreach ($headerLinks as $link) {
            $item = MenuItem::query()->firstOrCreate(
                ['route_name' => $link['route_name'], 'location' => 'header'],
                [
                    'label' => $link['label'],
                    'is_active' => true,
                    'sort_order' => $link['sort_order'],
                    'parent_id' => null,
                ]
            );

            $item->forceFill([
                'label' => $link['label'],
                'is_active' => true,
                'sort_order' => $link['sort_order'],
                'parent_id' => null,
            ])->save();
        }

        MenuItem::query()
            ->where('location', 'header')
            ->where(function ($q) {
                $q->where('label', 'Blog')->orWhere('url', '/blog')->orWhere('route_name', 'blog.index');
            })
            ->update(['sort_order' => 8]);

        MenuItem::query()
            ->where('location', 'header')
            ->where(function ($q) {
                $q->where('label', 'Contact')->orWhere('url', '/contact')->orWhere('route_name', 'contact');
            })
            ->update(['sort_order' => 9]);

        foreach ($headerLinks as $index => $link) {
            MenuItem::query()->firstOrCreate(
                ['route_name' => $link['route_name'], 'location' => 'footer'],
                [
                    'label' => $link['label'],
                    'is_active' => true,
                    'sort_order' => 6 + $index,
                    'parent_id' => null,
                ]
            );
        }
    }
}
