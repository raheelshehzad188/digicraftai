<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class SoftwareItem extends Model
{
    use HasSeo;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'overview' => 'array',
            'tags' => 'array',
            'platforms' => 'array',
            'key_features' => 'array',
            'versions' => 'array',
            'faqs' => 'array',
            'show_mock_screenshots' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (SoftwareItem $item) {
            if (blank($item->slug) && filled($item->name)) {
                $item->slug = Str::slug($item->name);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(SoftwareCategory::class, 'software_category_item');
    }

    public function categorySlugs(): array
    {
        return $this->categories->pluck('slug')->all();
    }

    public function licenseLabel(): string
    {
        return match ($this->license) {
            'paid' => 'Paid',
            'freemium' => 'Freemium',
            default => 'Free',
        };
    }

    public function mediaUrl(?string $path, ?string $fallback = null): ?string
    {
        if (blank($path)) {
            return $fallback ? asset($fallback) : null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        return asset('storage/'.$path);
    }

    public function imageUrl(): string
    {
        return $this->mediaUrl($this->image) ?: '';
    }

    public function downloadUrl(?array $version = null): ?string
    {
        if (is_array($version)) {
            if (filled($version['file'] ?? null)) {
                return $this->mediaUrl((string) $version['file']);
            }

            if (filled($version['url'] ?? null)) {
                return (string) $version['url'];
            }
        }

        if (filled($this->download_file)) {
            return $this->mediaUrl((string) $this->download_file);
        }

        if (filled($this->download_url)) {
            return (string) $this->download_url;
        }

        return null;
    }

    public function isLocalDownload(?array $version = null): bool
    {
        if (is_array($version)) {
            if (filled($version['file'] ?? null)) {
                return true;
            }

            if (filled($version['url'] ?? null)) {
                return false;
            }
        }

        return filled($this->download_file);
    }

    public function overviewParagraphs(): array
    {
        $paragraphs = $this->stringList($this->overview ?? []);

        if ($paragraphs === []) {
            return array_values(array_filter([(string) $this->description]));
        }

        return $paragraphs;
    }

    public function tagList(): array
    {
        return $this->stringList($this->tags ?? []);
    }

    public function platformList(): array
    {
        return $this->stringList($this->platforms ?? []);
    }

    /**
     * @param  array<int, mixed>  $items
     * @return list<string>
     */
    protected function stringList(array $items): array
    {
        $out = [];

        foreach ($items as $item) {
            if (is_array($item)) {
                $out[] = (string) ($item['paragraph'] ?? $item['tag'] ?? $item['platform'] ?? reset($item) ?: '');
            } else {
                $out[] = (string) $item;
            }
        }

        return array_values(array_filter($out));
    }
}
