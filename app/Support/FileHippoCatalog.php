<?php

namespace App\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class FileHippoCatalog
{
    /**
     * @return array<int, array{slug: string, label: string, icon: string, chip?: bool}>
     */
    public static function categories(): array
    {
        return [
            ['slug' => 'windows', 'label' => 'Windows Apps', 'icon' => 'fab fa-windows', 'chip' => true],
            ['slug' => 'mac', 'label' => 'Mac Apps', 'icon' => 'fab fa-apple', 'chip' => true],
            ['slug' => 'android', 'label' => 'Android Apps', 'icon' => 'fab fa-android', 'chip' => true],
            ['slug' => 'games', 'label' => 'Games', 'icon' => 'fas fa-gamepad', 'chip' => true],
            ['slug' => 'security', 'label' => 'Security', 'icon' => 'fas fa-shield-alt', 'chip' => true],
            ['slug' => 'multimedia', 'label' => 'Multimedia', 'icon' => 'fas fa-play', 'chip' => true],
            ['slug' => 'productivity', 'label' => 'Productivity', 'icon' => 'fas fa-layer-group', 'chip' => true],
            ['slug' => 'development', 'label' => 'Development', 'icon' => 'fas fa-code', 'chip' => true],
            ['slug' => 'utilities', 'label' => 'Utilities', 'icon' => 'fas fa-wrench', 'chip' => true],
            ['slug' => 'browsers', 'label' => 'Browsers', 'icon' => 'fas fa-globe', 'chip' => false],
            ['slug' => 'system-tools', 'label' => 'System Tools', 'icon' => 'fas fa-tools', 'chip' => false],
            ['slug' => 'graphics', 'label' => 'Graphics & Design', 'icon' => 'fas fa-palette', 'chip' => false],
            ['slug' => 'mobile', 'label' => 'Mobile Apps', 'icon' => 'fas fa-mobile-alt', 'chip' => false],
            ['slug' => 'drivers', 'label' => 'Drivers', 'icon' => 'fas fa-car', 'chip' => false],
        ];
    }

    public static function items(): Collection
    {
        return collect([
            [
                'slug' => 'google-chrome',
                'name' => 'Google Chrome',
                'version' => 'v128.0.6613.120',
                'description' => 'Fast, secure, and free web browser from Google.',
                'icon_class' => 'chrome',
                'icon' => 'fab fa-chrome',
                'icon_text' => null,
                'tags' => ['Web Browser', 'Productivity'],
                'license' => 'free',
                'categories' => ['windows', 'browsers', 'productivity'],
                'platforms' => ['Windows'],
                'rating' => '4.8',
                'votes' => '12,420',
                'downloads' => '1.2M',
                'download_url' => 'https://www.google.com/chrome/',
            ],
            [
                'slug' => 'vlc-media-player',
                'name' => 'VLC Media Player',
                'version' => 'v3.0.21',
                'description' => 'Play almost any audio or video format.',
                'icon_class' => 'vlc',
                'icon' => 'fas fa-play',
                'icon_text' => null,
                'tags' => ['Multimedia', 'Video Player'],
                'license' => 'free',
                'categories' => ['windows', 'mac', 'multimedia'],
                'platforms' => ['Windows', 'Mac'],
                'rating' => '4.7',
                'votes' => '8,230',
                'downloads' => '980K',
                'download_url' => 'https://www.videolan.org/vlc/',
            ],
            [
                'slug' => 'adobe-photoshop',
                'name' => 'Adobe Photoshop',
                'version' => 'v25.4.1',
                'description' => 'Professional image editing and design software.',
                'icon_class' => 'ps',
                'icon' => null,
                'icon_text' => 'Ps',
                'tags' => ['Graphics & Design', 'Photo Editing'],
                'license' => 'paid',
                'categories' => ['windows', 'mac', 'graphics', 'productivity'],
                'platforms' => ['Windows', 'Mac'],
                'rating' => '4.6',
                'votes' => '6,120',
                'downloads' => '520K',
                'download_url' => 'https://www.adobe.com/products/photoshop.html',
            ],
            [
                'slug' => 'winrar',
                'name' => 'WinRAR',
                'version' => 'v7.01',
                'description' => 'Compress, encrypt and manage your files easily.',
                'icon_class' => 'winrar',
                'icon' => null,
                'icon_text' => 'RAR',
                'tags' => ['System Tools', 'File Compression'],
                'license' => 'freemium',
                'categories' => ['windows', 'system-tools', 'utilities'],
                'platforms' => ['Windows'],
                'rating' => '4.8',
                'votes' => '9,320',
                'downloads' => '1.8M',
                'download_url' => 'https://www.win-rar.com/',
            ],
            [
                'slug' => 'zoom',
                'name' => 'Zoom',
                'version' => 'v6.1.10',
                'description' => 'Video conferencing and online meetings.',
                'icon_class' => 'zoom',
                'icon' => 'fas fa-video',
                'icon_text' => null,
                'tags' => ['Communication', 'Productivity'],
                'license' => 'free',
                'categories' => ['windows', 'mac', 'productivity'],
                'platforms' => ['Windows', 'Mac'],
                'rating' => '4.5',
                'votes' => '4,210',
                'downloads' => '640K',
                'download_url' => 'https://zoom.us/download',
            ],
            [
                'slug' => 'notepad-plus-plus',
                'name' => 'Notepad++',
                'version' => 'v8.6.8',
                'description' => 'A free source code editor for developers.',
                'icon_class' => 'notepad',
                'icon' => 'far fa-file-alt',
                'icon_text' => null,
                'tags' => ['Development', 'Code Editor'],
                'license' => 'free',
                'categories' => ['windows', 'development', 'utilities'],
                'platforms' => ['Windows'],
                'rating' => '4.8',
                'votes' => '7,900',
                'downloads' => '1.1M',
                'download_url' => 'https://notepad-plus-plus.org/downloads/',
            ],
        ])->map(function (array $item) {
            $details = static::details()[$item['slug']] ?? [];

            return (object) array_merge([
                'publisher' => null,
                'file_size' => null,
                'release_date' => null,
                'os' => implode(' / ', $item['platforms'] ?? []),
                'language' => 'Multi-language',
                'overview' => [$item['description']],
                'key_features' => [],
                'versions' => [],
                'faqs' => [],
                'show_mock_screenshots' => false,
            ], $item, $details);
        });
    }

    /**
     * Extra detail-page copy for the existing catalog items.
     *
     * @return array<string, array<string, mixed>>
     */
    protected static function details(): array
    {
        return [
            'google-chrome' => [
                'publisher' => 'Google LLC',
                'file_size' => '110 MB',
                'release_date' => 'Sep 3, 2024',
                'os' => 'Windows 11 / 10 / 8 / 7',
                'show_mock_screenshots' => true,
                'overview' => [
                    'Google Chrome is a fast, simple, and secure web browser, built for the modern web. Chrome combines a minimal design with sophisticated technology to make the web faster, safer, and easier for everyone.',
                    'With built-in Google services, powerful privacy features, and a huge library of extensions, Chrome helps you get more done online.',
                ],
                'key_features' => [
                    ['icon' => 'fa-solid fa-bolt', 'title' => 'Fast Browsing', 'text' => 'Loads pages quickly and runs web apps with high performance.'],
                    ['icon' => 'fa-solid fa-arrows-rotate', 'title' => 'Sync Across Devices', 'text' => 'Access your bookmarks, passwords, and settings everywhere.'],
                    ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Built-in Security', 'text' => 'Protection from phishing, malware, and dangerous sites.'],
                    ['icon' => 'fa-regular fa-circle-user', 'title' => 'Simple & Clean Design', 'text' => 'A modern, minimal interface that stays out of your way.'],
                    ['icon' => 'fa-solid fa-puzzle-piece', 'title' => 'Extensions Support', 'text' => 'Thousands of extensions from the Chrome Web Store.'],
                    ['icon' => 'fa-solid fa-gear', 'title' => 'Regular Updates', 'text' => 'Latest features and security fixes delivered automatically.'],
                ],
                'versions' => [
                    ['label' => 'v128.0.6613.120', 'latest' => true, 'date' => 'Sep 3, 2024', 'size' => '110 MB', 'downloads' => '1,234,567'],
                    ['label' => 'v127.0.6533.89', 'latest' => false, 'date' => 'Aug 15, 2024', 'size' => '108 MB', 'downloads' => '980,234'],
                    ['label' => 'v126.0.6478.126', 'latest' => false, 'date' => 'Jul 22, 2024', 'size' => '107 MB', 'downloads' => '876,521'],
                    ['label' => 'v125.0.6422.112', 'latest' => false, 'date' => 'Jun 10, 2024', 'size' => '105 MB', 'downloads' => '765,432'],
                    ['label' => 'v124.0.6367.207', 'latest' => false, 'date' => 'May 5, 2024', 'size' => '104 MB', 'downloads' => '654,210'],
                ],
                'faqs' => [
                    ['q' => 'Is Google Chrome free to download?', 'a' => 'Yes. Google Chrome is available as a free web browser for supported devices.'],
                    ['q' => 'Is Chrome safe to install?', 'a' => 'Chrome includes built-in security features designed to help protect users while browsing.'],
                    ['q' => 'Can I sync Chrome across devices?', 'a' => 'Yes. Signing in lets supported Chrome data such as bookmarks and settings sync across devices.'],
                ],
            ],
            'vlc-media-player' => [
                'publisher' => 'VideoLAN',
                'file_size' => '40 MB',
                'os' => 'Windows / Mac',
                'overview' => ['Play almost any audio or video format.'],
                'key_features' => [
                    ['icon' => 'fa-solid fa-play', 'title' => 'Multimedia', 'text' => 'Play almost any audio or video format.'],
                    ['icon' => 'fa-solid fa-film', 'title' => 'Video Player', 'text' => 'Open common audio and video files on Windows and Mac.'],
                ],
            ],
            'adobe-photoshop' => [
                'publisher' => 'Adobe',
                'os' => 'Windows / Mac',
                'overview' => ['Professional image editing and design software.'],
                'key_features' => [
                    ['icon' => 'fa-solid fa-palette', 'title' => 'Graphics & Design', 'text' => 'Professional image editing and design software.'],
                    ['icon' => 'fa-solid fa-image', 'title' => 'Photo Editing', 'text' => 'Edit photos and create design assets for Windows and Mac.'],
                ],
            ],
            'winrar' => [
                'publisher' => 'win.rar GmbH',
                'os' => 'Windows',
                'overview' => ['Compress, encrypt and manage your files easily.'],
                'key_features' => [
                    ['icon' => 'fa-solid fa-file-zipper', 'title' => 'File Compression', 'text' => 'Compress, encrypt and manage your files easily.'],
                    ['icon' => 'fa-solid fa-toolbox', 'title' => 'System Tools', 'text' => 'Archive and extract common file formats on Windows.'],
                ],
            ],
            'zoom' => [
                'publisher' => 'Zoom',
                'os' => 'Windows / Mac',
                'overview' => ['Video conferencing and online meetings.'],
                'key_features' => [
                    ['icon' => 'fa-solid fa-video', 'title' => 'Communication', 'text' => 'Video conferencing and online meetings.'],
                    ['icon' => 'fa-solid fa-layer-group', 'title' => 'Productivity', 'text' => 'Available for Windows and Mac.'],
                ],
            ],
            'notepad-plus-plus' => [
                'publisher' => 'Don Ho',
                'os' => 'Windows',
                'overview' => ['A free source code editor for developers.'],
                'key_features' => [
                    ['icon' => 'fa-solid fa-code', 'title' => 'Development', 'text' => 'A free source code editor for developers.'],
                    ['icon' => 'fa-regular fa-file-alt', 'title' => 'Code Editor', 'text' => 'Edit source files on Windows.'],
                ],
            ],
        ];
    }

    public static function categoryLabel(string $slug): string
    {
        return collect(static::categories())->firstWhere('slug', $slug)['label'] ?? Str::headline($slug);
    }

    public static function find(string $slug): ?object
    {
        return static::items()->firstWhere('slug', $slug);
    }

    public static function filtered(?string $category, ?string $q, ?string $platform, ?string $license, string $sort = 'popular'): Collection
    {
        $items = static::items();

        if (filled($category) && $category !== 'all') {
            $items = $items->filter(fn ($item) => in_array($category, $item->categories, true));
        }

        if (filled($q)) {
            $needle = Str::lower($q);
            $items = $items->filter(function ($item) use ($needle) {
                $haystack = Str::lower($item->name.' '.$item->description.' '.implode(' ', $item->tags));

                return str_contains($haystack, $needle);
            });
        }

        if (filled($platform)) {
            $items = $items->filter(fn ($item) => collect($item->platforms)->contains(fn ($p) => Str::lower($p) === Str::lower($platform)));
        }

        if (filled($license) && $license !== 'all') {
            $items = $items->filter(fn ($item) => $item->license === $license);
        }

        return match ($sort) {
            'newest' => $items->sortByDesc('version')->values(),
            'rated' => $items->sortByDesc('rating')->values(),
            default => $items->values(),
        };
    }

    public static function categoryCount(string $slug): int
    {
        if ($slug === 'all') {
            return static::items()->count();
        }

        return static::items()->filter(fn ($item) => in_array($slug, $item->categories, true))->count();
    }

    public static function licenseLabel(string $license): string
    {
        return match ($license) {
            'paid' => 'Paid',
            'freemium' => 'Freemium',
            default => 'Free',
        };
    }
}
