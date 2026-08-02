<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'title_line2', 'icon', 'description', 'image',
        'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }
}
