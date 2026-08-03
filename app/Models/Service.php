<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'title_line2', 'slug', 'icon', 'description', 'content', 'image',
        'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }

    protected static function booted(): void
    {
        static::saving(function (Service $service) {
            if (blank($service->slug)) {
                $service->slug = \Illuminate\Support\Str::slug(trim($service->title.' '.$service->title_line2));
            }
        });
    }

    public function getFullTitleAttribute(): string
    {
        return trim($this->title.($this->title_line2 ? ' '.$this->title_line2 : ''));
    }
}
