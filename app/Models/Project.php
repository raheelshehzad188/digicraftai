<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'project_category_id', 'title', 'slug', 'description', 'image',
        'client', 'project_url', 'is_featured', 'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
