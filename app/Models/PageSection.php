<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageSection extends Model
{
    protected $fillable = [
        'page_id', 'type', 'title', 'content', 'image', 'extra', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['extra' => 'array'];
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
