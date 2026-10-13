<?php

namespace App\Support;

use App\Models\SoftwareItem;

/**
 * Design-pack images from main-file/assets/img/zenvello-software.
 */
class SoftwareDesignAssets
{
    public static function url(string $filename): string
    {
        return asset('assets/img/zenvello-software/'.ltrim($filename, '/'));
    }

    public static function hero(): string
    {
        return self::url('hero-software.svg');
    }

    /**
     * Logo SVG for list/detail fallbacks when the item has no uploaded image.
     */
    public static function logoFor(?SoftwareItem $item): ?string
    {
        if (! $item) {
            return null;
        }

        $key = strtolower(trim((string) ($item->icon_class ?: '')));
        $slug = strtolower((string) $item->slug);
        $name = strtolower((string) $item->name);

        $map = [
            'chrome' => 'chrome.svg',
            'vlc' => 'vlc.svg',
            'ps' => 'photoshop.svg',
            'photoshop' => 'photoshop.svg',
            'winrar' => 'winrar.svg',
            'zoom' => 'zoom.svg',
            'notepad' => 'notepadpp.svg',
            'notepadpp' => 'notepadpp.svg',
            'illustrator' => 'illustrator.svg',
            'coreldraw' => 'coreldraw.svg',
            'canva' => 'canva.svg',
            'figma' => 'figma.svg',
            'luminar' => 'luminar.svg',
            'adobe' => 'adobe.svg',
        ];

        if ($key !== '' && isset($map[$key])) {
            return self::url($map[$key]);
        }

        foreach ($map as $needle => $file) {
            if (str_contains($slug, $needle) || str_contains($name, $needle)) {
                return self::url($file);
            }
        }

        return null;
    }

    /**
     * Gallery / screenshot set used by the design mockup.
     *
     * @return list<array{src: string, alt: string, caption: string}>
     */
    public static function mockScreenshots(): array
    {
        return [
            [
                'src' => self::url('ps-shot-generative-fill.svg'),
                'alt' => 'Generative Fill extending a portrait',
                'caption' => 'Generative Fill',
            ],
            [
                'src' => self::url('ps-shot-before-after.svg'),
                'alt' => 'Before and after landscape colour grade',
                'caption' => 'Before & after colour grading',
            ],
            [
                'src' => self::url('ps-shot-color.svg'),
                'alt' => 'Portrait retouching with the colour picker',
                'caption' => 'Colour & retouching tools',
            ],
            [
                'src' => self::url('ps-shot-night.svg'),
                'alt' => 'Night scene digital artwork',
                'caption' => 'Digital art & compositing',
            ],
            [
                'src' => self::url('ps-shot-video.svg'),
                'alt' => 'Workspace with layers panel',
                'caption' => 'Layers & workspace',
            ],
            [
                'src' => self::url('photoshop-cover.svg'),
                'alt' => 'Product cover artwork',
                'caption' => 'Product cover',
            ],
        ];
    }

    public static function coverFallback(?SoftwareItem $item = null): string
    {
        return self::logoFor($item) ?: self::url('photoshop-cover.svg');
    }

    public static function adobeMark(): string
    {
        return self::url('adobe.svg');
    }
}
