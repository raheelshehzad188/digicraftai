<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProjectCategory extends Model
{
    protected $fillable = ['name', 'slug', 'filter_class', 'icon', 'sort_order'];

    protected static function booted(): void
    {
        static::saving(function (ProjectCategory $category) {
            if (blank($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
