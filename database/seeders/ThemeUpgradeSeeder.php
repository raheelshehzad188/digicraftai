<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\HomeSection;
use App\Models\MenuItem;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class ThemeUpgradeSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['key' => 'quote_form', 'name' => 'Quote Form', 'title' => 'Find Your Pest Control Services', 'sort_order' => 15],
            ['key' => 'blog_title', 'name' => 'Blog Section', 'title' => 'Latest Blog & News', 'subtitle' => 'Our Blog', 'sort_order' => 45],
            ['key' => 'cta', 'name' => 'Call To Action', 'title' => 'Sign Up To Our Newsletter To Get The Latest Offers', 'button_text' => 'Subscribe', 'sort_order' => 48],
        ];

        foreach ($sections as $section) {
            HomeSection::query()->firstOrCreate(
                ['key' => $section['key']],
                array_merge(['is_visible' => true], $section)
            );
        }

        // Ensure existing section badges/subtitles for pest theme without overwriting titles if set
        foreach ([
            'about' => ['subtitle' => 'About Us'],
            'services_title' => ['subtitle' => 'Our Services'],
            'portfolio_title' => ['subtitle' => 'Our Project'],
            'pricing_title' => ['subtitle' => 'Our Pricing'],
            'team_title' => ['subtitle' => 'Our Team'],
            'testimonial_title' => ['subtitle' => 'Testimonial'],
        ] as $key => $attrs) {
            $row = HomeSection::query()->where('key', $key)->first();
            if ($row && blank($row->subtitle)) {
                $row->update($attrs);
            }
        }

        if (Slider::query()->count() === 0) {
            Slider::query()->insert([
                [
                    'title' => 'Enjoy Your Home Totally Pest Free',
                    'subtitle' => 'No 1 Pest Control Services',
                    'button_text' => 'Read More',
                    'button_url' => '/about',
                    'sort_order' => 1,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Professional Pest Control Solutions',
                    'subtitle' => 'Trusted Experts Near You',
                    'button_text' => 'Our Services',
                    'button_url' => '/services',
                    'sort_order' => 2,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        if (Blog::query()->count() === 0) {
            foreach ([
                ['title' => 'How To Build A Cleaning Plan', 'slug' => 'how-to-build-a-cleaning-plan', 'excerpt' => 'Lorem ipsum dolor sit amet consectur adip sed eiusmod tempor.', 'sort_order' => 1],
                ['title' => 'Tips For Seasonal Pest Prevention', 'slug' => 'tips-for-seasonal-pest-prevention', 'excerpt' => 'Practical steps to keep your home pest free year round.', 'sort_order' => 2],
                ['title' => 'Why Professional Pest Control Matters', 'slug' => 'why-professional-pest-control-matters', 'excerpt' => 'Learn how experts protect your property effectively.', 'sort_order' => 3],
            ] as $blog) {
                Blog::query()->create(array_merge($blog, [
                    'author' => 'Admin',
                    'published_at' => now()->subDays($blog['sort_order']),
                    'comments_count' => 12,
                    'content' => '<p>'.$blog['excerpt'].'</p><p>Full article content can be edited from the admin panel.</p>',
                    'is_published' => true,
                ]));
            }
        }

        if (! MenuItem::query()->where('route_name', 'blog')->exists()) {
            $parent = MenuItem::query()->whereNull('parent_id')->where('label', 'Pages')->first();
            MenuItem::query()->create([
                'parent_id' => $parent?->id,
                'label' => 'Blog',
                'type' => 'route',
                'route_name' => 'blog',
                'sort_order' => 3,
                'is_active' => true,
            ]);
        }
    }
}
