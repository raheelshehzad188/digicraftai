<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'service_type', 'name', 'phone', 'email', 'message', 'is_read',
    ];

    protected function casts(): array
    {
        return ['is_read' => 'boolean'];
    }
}
