<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name', 'tagline', 'logo', 'favicon', 'phone', 'email', 'address',
        'footer_about', 'newsletter_text', 'map_embed_url',
        'primary_color', 'secondary_color', 'dark_color',
        'facebook', 'twitter', 'linkedin', 'instagram', 'copyright_text',
    ];

    public static function defaults(): array
    {
        return [
            'site_name' => 'DOT.NET',
            'tagline' => 'Digital Agency Website',
            'logo' => null,
            'favicon' => null,
            'phone' => '+012 345 6789',
            'email' => 'info@example.com',
            'address' => '123 Street, New York, USA',
            'footer_about' => 'Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et',
            'newsletter_text' => 'Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd',
            'primary_color' => '#FFAA17',
            'secondary_color' => '#6c757d',
            'dark_color' => '#212529',
            'facebook' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'instagram' => '#',
            'copyright_text' => 'DOT.NET. All Rights Reserved.',
        ];
    }

    public static function current(): self
    {
        return static::query()->first() ?? static::query()->create(static::defaults());
    }

    public function resetToDefaults(): void
    {
        $this->update(static::defaults());
    }
}
