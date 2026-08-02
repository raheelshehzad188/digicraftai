<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $fillable = [
        'parent_id', 'label', 'type', 'url', 'route_name', 'page_id',
        'target', 'is_active', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('sort_order');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function getHrefAttribute(): string
    {
        return match ($this->type) {
            'page' => $this->page ? url('/page/'.$this->page->slug) : '#',
            'route' => ($this->route_name && \Illuminate\Support\Facades\Route::has($this->route_name))
                ? route($this->route_name)
                : '#',
            default => $this->url ?: '#',
        };
    }
}
