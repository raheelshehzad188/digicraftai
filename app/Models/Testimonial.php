<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'profession', 'content', 'image', 'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }
}
