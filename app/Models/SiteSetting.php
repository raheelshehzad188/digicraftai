<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name', 'brand_accent', 'tagline', 'logo', 'favicon', 'preloader_enabled',
        'phone', 'phone_cta_label', 'email', 'address',
        'contact_display_address', 'contact_map_link',
        'footer_about', 'footer_background_image', 'newsletter_text', 'map_embed_url',
        'contact_form_notice', 'contact_background_image',
        'primary_color', 'secondary_color', 'dark_color',
        'menu_text_color', 'menu_hover_color',
        'facebook', 'twitter', 'linkedin', 'instagram', 'copyright_text', 'footer_help_links',
    ];

    protected function casts(): array
    {
        return [
            'footer_help_links' => 'array',
            'preloader_enabled' => 'boolean',
        ];
    }

    public static function defaults(): array
    {
        return [
            'site_name' => 'High',
            'brand_accent' => 'Tech',
            'tagline' => 'Note : We help you to Grow your Business',
            'logo' => null,
            'favicon' => null,
            'preloader_enabled' => true,
            'phone' => '+ 0123 456 7890',
            'phone_cta_label' => 'Have any questions?',
            'email' => 'Email@Example.com',
            'address' => '23 Ranking Street, New York',
            'contact_display_address' => '23 rank Str, NY',
            'contact_map_link' => 'https://goo.gl/maps/Zd4BCynmTb98ivUJ6',
            'footer_about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta facere delectus qui placeat inventore consectetur repellendus optio debitis.',
            'footer_background_image' => null,
            'newsletter_text' => '',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.4710403339755!2d-73.82241512404069!3d40.685622471397615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c26749046ee14f%3A0xea672968476d962c!2s123rd%20St%2C%20Queens%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1686493221834!5m2!1sen!2sbd',
            'contact_form_notice' => 'Send us a message and we will get back to you shortly.',
            'contact_background_image' => 'hightech/background.jpg',
            'primary_color' => '#1842b6',
            'secondary_color' => '#26d48c',
            'dark_color' => '#000103',
            'menu_text_color' => '#FFFFFF',
            'menu_hover_color' => '#26d48c',
            'facebook' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'instagram' => '#',
            'copyright_text' => 'All right reserved.',
            'footer_help_links' => [
                ['label' => 'Terms Of use', 'url' => '/page/privacy-policy'],
                ['label' => 'Privacy Policy', 'url' => '/page/privacy-policy'],
                ['label' => 'Helps', 'url' => '/contact'],
                ['label' => 'FQAs', 'url' => '/contact'],
                ['label' => 'Contact', 'url' => '/contact'],
            ],
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
