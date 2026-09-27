<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class SoftwareCategory extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'is_chip' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (SoftwareCategory $category) {
            if (blank($category->slug) && filled($category->name)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(SoftwareItem::class, 'software_category_item');
    }

    public function getLabelAttribute(): string
    {
        return (string) $this->name;
    }

    public function getChipAttribute(): bool
    {
        return (bool) $this->is_chip;
    }
}
