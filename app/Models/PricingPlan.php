<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'name', 'tagline', 'price', 'period', 'currency', 'features',
        'button_text', 'button_url', 'is_featured', 'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'price' => 'decimal:2',
        ];
    }
}
