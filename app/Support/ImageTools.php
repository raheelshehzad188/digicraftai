<?php

namespace App\Support;

class ImageTools
{
    /**
     * @return list<array{key: string, label: string, tools: list<array<string, string>>}>
     */
    public static function categories(): array
    {
        return [
            [
                'key' => 'optimize',
                'label' => 'Optimize',
                'tools' => [
                    self::tool('compress-image', 'Compress Image', 'Reduce JPG, PNG, SVG and GIF file size.', 'compress', '#16a34a'),
                    self::tool('resize-image', 'Resize Image', 'Resize images by pixels or percentage.', 'resize', '#2563eb'),
                    self::tool('crop-image', 'Crop Image', 'Crop JPG, PNG and GIF images.', 'crop', '#7c3aed'),
                    self::tool('convert-to-jpg', 'Convert to JPG', 'Convert PNG, GIF, WEBP, SVG and other formats to JPG.', 'jpg', '#ca8a04'),
                ],
            ],
            [
                'key' => 'create',
                'label' => 'Create',
                'tools' => [
                    self::tool('photo-editor', 'Photo Editor', 'Add text, effects, frames and stickers.', 'edit', '#db2777'),
                    self::tool('meme-generator', 'Meme Generator', 'Create custom memes from images and text.', 'meme', '#d97706'),
                    self::tool('html-to-image', 'HTML to Image', 'Convert HTML/webpages into images.', 'html', '#ea580c'),
                    self::tool('gif-maker', 'GIF Maker', 'Create animated GIFs from images.', 'gif', '#7c3aed'),
                ],
            ],
            [
                'key' => 'edit',
                'label' => 'Edit',
                'tools' => [
                    self::tool('upscale-image', 'Upscale Image', 'Increase image resolution and improve image quality.', 'upscale', '#16a34a'),
                    self::tool('remove-background', 'Remove Background', 'Automatically remove image backgrounds.', 'background', '#7c3aed'),
                    self::tool('watermark-image', 'Watermark Image', 'Add text or image watermarks.', 'watermark', '#2563eb'),
                    self::tool('blur-face', 'Blur Face', 'Detect and blur faces in images.', 'blur', '#db2777'),
                    self::tool('rotate-image', 'Rotate Image', 'Rotate JPG, PNG and GIF images.', 'rotate', '#0f766e'),
                ],
            ],
            [
                'key' => 'convert',
                'label' => 'Convert',
                'tools' => [
                    self::tool('jpg-to-png', 'JPG to PNG', 'Convert JPG images to PNG.', 'png', '#db2777'),
                    self::tool('png-to-jpg', 'PNG to JPG', 'Convert PNG images to JPG.', 'jpg', '#2563eb'),
                    self::tool('webp-converter', 'WEBP Converter', 'Convert images to and from WEBP.', 'webp', '#16a34a'),
                    self::tool('gif-converter', 'GIF Converter', 'Convert images to GIF.', 'gif', '#7c3aed'),
                    self::tool('image-format-converter', 'Image Format Converter', 'Convert between supported image formats.', 'convert', '#0284c7'),
                ],
            ],
        ];
    }

    /**
     * Shortcuts shown directly in the main navigation.
     *
     * @return list<array<string, string>>
     */
    public static function primaryNav(): array
    {
        return array_values(array_filter(array_map(
            fn (string $slug) => self::find($slug),
            ['compress-image', 'resize-image', 'crop-image', 'convert-to-jpg', 'photo-editor']
        )));
    }

    /**
     * @return list<string>
     */
    public static function slugs(): array
    {
        return array_map(
            fn (array $tool) => $tool['slug'],
            self::all()
        );
    }

    /**
     * @return list<array<string, string>>
     */
    public static function all(): array
    {
        $tools = [];

        foreach (self::categories() as $category) {
            foreach ($category['tools'] as $tool) {
                $tools[] = $tool;
            }
        }

        return $tools;
    }

    /**
     * @return array<string, string>|null
     */
    public static function find(string $slug): ?array
    {
        foreach (self::all() as $tool) {
            if ($tool['slug'] === $slug) {
                return $tool;
            }
        }

        return null;
    }

    public static function isCurrent(string $slug): bool
    {
        return self::currentSlug() === $slug;
    }

    public static function currentSlug(): ?string
    {
        $route = request()->route();

        if (! $route || ! $route->named('image-tools.show')) {
            return null;
        }

        $slug = $route->parameter('tool');

        return is_string($slug) ? $slug : null;
    }

    /**
     * @return array<string, string>
     */
    private static function tool(string $slug, string $name, string $description, string $icon, string $color): array
    {
        return [
            'slug' => $slug,
            'name' => $name,
            'description' => $description,
            'icon' => $icon,
            'color' => $color,
        ];
    }
}
