<?php

namespace App\Support;

use App\Models\SoftwareCategory;
use App\Models\SoftwareItem;

class SoftwareDefaults
{
    public static function apply(): int
    {
        $created = 0;

        foreach (FileHippoCatalog::categories() as $index => $row) {
            SoftwareCategory::query()->firstOrCreate(
                ['slug' => $row['slug']],
                [
                    'name' => $row['label'],
                    'icon' => $row['icon'],
                    'is_chip' => (bool) ($row['chip'] ?? false),
                    'is_published' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }

        foreach (FileHippoCatalog::items() as $index => $item) {
            $record = SoftwareItem::query()->firstOrCreate(
                ['slug' => $item->slug],
                [
                    'name' => $item->name,
                    'version' => $item->version,
                    'description' => $item->description,
                    'overview' => $item->overview ?? [$item->description],
                    'icon_class' => $item->icon_class,
                    'icon' => $item->icon,
                    'icon_text' => $item->icon_text,
                    'tags' => $item->tags,
                    'license' => $item->license,
                    'platforms' => $item->platforms,
                    'rating' => $item->rating,
                    'votes' => $item->votes,
                    'downloads' => $item->downloads,
                    'download_url' => $item->download_url,
                    'publisher' => $item->publisher,
                    'file_size' => $item->file_size,
                    'release_date' => $item->release_date,
                    'os' => $item->os,
                    'language' => $item->language ?? 'Multi-language',
                    'key_features' => $item->key_features ?? [],
                    'versions' => $item->versions ?? [],
                    'faqs' => $item->faqs ?? [],
                    'show_mock_screenshots' => (bool) ($item->show_mock_screenshots ?? false),
                    'is_published' => true,
                    'sort_order' => $index + 1,
                ]
            );

            $categoryIds = SoftwareCategory::query()
                ->whereIn('slug', $item->categories ?? [])
                ->pluck('id');

            $record->categories()->sync($categoryIds);
            $created++;
        }

        return $created;
    }

    /**
     * @return array<string, mixed>
     */
    public static function pageSections(): array
    {
        return [
            'hero_kicker' => 'Software Downloads',
            'hero_title' => 'Find the Best Software for Your Needs',
            'hero_description' => 'Download trusted, safe and verified software for Windows, Mac, Android and more. Free & premium software in one place.',
            'search_placeholder' => 'Search for software, e.g. Chrome, Photoshop, VLC...',
            'hero_image' => 'assets/img/zenvello-software/hero-software.svg',
            'list_subtitle' => 'Discover and download the best software for your device.',
            'subscribe_title' => 'Stay Updated With the Latest Software',
            'subscribe_text' => 'Get notified about new versions, popular software and exclusive deals.',
            'trust' => [
                ['icon' => 'fas fa-shield-alt', 'title' => '100% Safe Downloads', 'text' => 'Virus Scanned'],
                ['icon' => 'fas fa-clock', 'title' => 'Latest Versions', 'text' => 'Always up to date'],
                ['icon' => 'fas fa-th-large', 'title' => 'Wide Selection', 'text' => 'Thousands of apps'],
                ['icon' => 'fas fa-check-circle', 'title' => 'Trusted Source', 'text' => 'Verified and secure'],
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function marketplacePageSections(): array
    {
        return [
            'hero_kicker' => 'Digital Marketplace',
            'hero_title' => 'Buy & Sell Digital Products',
            'hero_description' => 'Discover high-quality digital products from talented creators around the world. Templates, courses, plugins, graphics, and more — all in one place.',
            'search_placeholder' => 'Search for products, creators, or categories...',
            'categories_title' => 'Shop by Category',
            'categories_subtitle' => 'Find exactly what you’re looking for',
            'featured_title' => 'Featured Digital Products',
            'featured_subtitle' => 'Handpicked products from top creators',
            'latest_title' => 'Latest Digital Products',
            'latest_subtitle' => 'Fresh digital products from our creator community',
            'cta_title' => 'Start Buying or Selling Digital Products',
            'cta_text' => 'Be part of a growing community of creators and entrepreneurs.',
            'cta_primary_text' => 'Browse Products',
            'cta_secondary_text' => 'Become a Seller',
            'seller_title' => 'Are you a creator? Turn your skills into income',
            'seller_text' => 'Join thousands of creators selling digital products. It’s free and easy to get started.',
            'seller_image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1000&q=90',
            'why_title' => 'Why Choose Us?',
            'why_subtitle' => 'Everything you need for a seamless digital marketplace experience',
            'hero_image' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1400&q=90',
            'benefits' => [
                ['icon' => 'fa-solid fa-globe', 'title' => 'Wide Variety', 'text' => 'Thousands of high-quality digital products'],
                ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Trusted Sellers', 'text' => 'Verified creators and quality products'],
                ['icon' => 'fa-solid fa-bolt', 'title' => 'Instant Access', 'text' => 'Download your purchases immediately'],
                ['icon' => 'fa-solid fa-headset', 'title' => '24/7 Support', 'text' => 'We’re here to help anytime'],
            ],
            'trust' => [
                ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Secure Payments', 'text' => '100% Safe & Secure'],
                ['icon' => 'fa-solid fa-download', 'title' => 'Instant Download', 'text' => 'Get Files Immediately'],
                ['icon' => 'fa-solid fa-headset', 'title' => 'Support Creators', 'text' => 'Help Independent Sellers'],
            ],
        ];
    }
}
