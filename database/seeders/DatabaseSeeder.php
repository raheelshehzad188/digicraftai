<?php

namespace Database\Seeders;

use App\Models\HomeSection;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\PricingPlan;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@digicraftai.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        SiteSetting::query()->updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'DOT.NET',
                'tagline' => 'Digital Agency Website',
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
            ]
        );

        $sections = [
            [
                'key' => 'hero',
                'name' => 'Hero Banner',
                'title' => 'Best Digital Marketing Agency',
                'content' => 'Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed sit. Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed ipsum at ipsum nonumy amet.',
                'button_text' => 'Learn More',
                'button_url' => '/about',
                'image' => null,
                'extra' => ['fallback_image' => 'header.png'],
                'sort_order' => 1,
            ],
            [
                'key' => 'about',
                'name' => 'About Section',
                'title' => 'Best digital agency in downtown',
                'subtitle' => 'Clita elitr et amet et ipsum sea. Ipsum stet kasd ea et no est duo diam. Lorem dolores eos ut nonumy ipsum sit clita lorem no amet dolor dolore, stet sit dolor justo',
                'content' => 'Eirmod est dolor nonumy sea amet dolore erat sit dolor et dolor vero. Tempor ipsum at justo amet at ipsum justo. Aiam kasd sea sit dolor duo elitr dolor amet, justo est ipsum amet dolor ut ipsum.',
                'button_text' => 'Read More',
                'button_url' => '/about',
                'extra' => ['fallback_image' => 'about.jpg'],
                'sort_order' => 2,
            ],
            [
                'key' => 'services_title',
                'name' => 'Services Section',
                'title' => 'Our Creative Services',
                'sort_order' => 3,
            ],
            [
                'key' => 'portfolio_title',
                'name' => 'Projects Section',
                'title' => 'Visit Our Projects',
                'sort_order' => 4,
            ],
            [
                'key' => 'pricing_title',
                'name' => 'Pricing Section',
                'title' => 'Competitive Pricing',
                'sort_order' => 5,
            ],
            [
                'key' => 'team_title',
                'name' => 'Team Section',
                'title' => 'Meet Our Team',
                'sort_order' => 6,
            ],
            [
                'key' => 'testimonial_title',
                'name' => 'Testimonials Section',
                'title' => "Our Client's Say",
                'sort_order' => 7,
            ],
            [
                'key' => 'contact',
                'name' => 'Contact Section',
                'title' => 'Contact Us',
                'sort_order' => 8,
            ],
        ];

        foreach ($sections as $section) {
            HomeSection::query()->updateOrCreate(
                ['key' => $section['key']],
                array_merge(['is_visible' => true], $section)
            );
        }

        $services = [
            ['title' => 'Web', 'title_line2' => 'Design', 'slug' => 'web-design', 'icon' => 'fa-laptop-code', 'description' => 'Vero amet vero eos kasd justo ipsum diam sed elitr', 'content' => '<p>Professional web design services focused on clean UI, branding, and conversion-ready layouts.</p>', 'sort_order' => 1],
            ['title' => 'Web', 'title_line2' => 'Development', 'slug' => 'web-development', 'icon' => 'fa-code', 'description' => 'Vero amet vero eos kasd justo ipsum diam sed elitr', 'content' => '<p>Custom web development with modern frameworks, performance, and scalable architecture.</p>', 'sort_order' => 2],
            ['title' => 'Digital', 'title_line2' => 'Marketing', 'slug' => 'digital-marketing', 'icon' => 'fa-envelope-open-text', 'description' => 'Vero amet vero eos kasd justo ipsum diam sed elitr', 'content' => '<p>Result-driven digital marketing campaigns across SEO, social, and paid channels.</p>', 'sort_order' => 3],
            ['title' => 'Content', 'title_line2' => 'Writing', 'slug' => 'content-writing', 'icon' => 'fa-edit', 'description' => 'Vero amet vero eos kasd justo ipsum diam sed elitr', 'content' => '<p>Clear, engaging content writing that strengthens your brand voice and SEO.</p>', 'sort_order' => 4],
        ];

        foreach ($services as $service) {
            Service::query()->updateOrCreate(
                ['slug' => $service['slug']],
                array_merge(['is_published' => true], $service)
            );
        }

        $design = ProjectCategory::query()->updateOrCreate(
            ['slug' => 'design'],
            ['name' => 'Design', 'filter_class' => 'first', 'icon' => 'fa-laptop-code', 'sort_order' => 1]
        );
        $dev = ProjectCategory::query()->updateOrCreate(
            ['slug' => 'development'],
            ['name' => 'Development', 'filter_class' => 'second', 'icon' => 'fa-mobile-alt', 'sort_order' => 2]
        );

        $projects = [
            ['title' => 'Portfolio 1', 'slug' => 'portfolio-1', 'project_category_id' => $design->id, 'extra_img' => 'portfolio-1.jpg', 'sort_order' => 1],
            ['title' => 'Portfolio 2', 'slug' => 'portfolio-2', 'project_category_id' => $dev->id, 'extra_img' => 'portfolio-2.jpg', 'sort_order' => 2],
            ['title' => 'Portfolio 3', 'slug' => 'portfolio-3', 'project_category_id' => $design->id, 'extra_img' => 'portfolio-3.jpg', 'sort_order' => 3],
            ['title' => 'Portfolio 4', 'slug' => 'portfolio-4', 'project_category_id' => $dev->id, 'extra_img' => 'portfolio-4.jpg', 'sort_order' => 4],
            ['title' => 'Portfolio 5', 'slug' => 'portfolio-5', 'project_category_id' => $design->id, 'extra_img' => 'portfolio-5.jpg', 'sort_order' => 5],
            ['title' => 'Portfolio 6', 'slug' => 'portfolio-6', 'project_category_id' => $dev->id, 'extra_img' => 'portfolio-6.jpg', 'sort_order' => 6],
        ];

        foreach ($projects as $project) {
            Project::query()->updateOrCreate(
                ['slug' => $project['slug']],
                [
                    'title' => $project['title'],
                    'project_category_id' => $project['project_category_id'],
                    'description' => 'Project showcase item',
                    'is_featured' => true,
                    'is_published' => true,
                    'sort_order' => $project['sort_order'],
                ]
            );
        }

        // Store fallback image names in description isn't ideal - home view uses portfolio-N.jpg by sort
        // We'll rely on cms_image fallbacks in views

        $plans = [
            ['name' => 'Basic', 'tagline' => 'The Best Choice', 'price' => 49, 'is_featured' => false, 'sort_order' => 1],
            ['name' => 'Standard', 'tagline' => 'The Best Choice', 'price' => 99, 'is_featured' => true, 'sort_order' => 2],
            ['name' => 'Extended', 'tagline' => 'The Best Choice', 'price' => 149, 'is_featured' => false, 'sort_order' => 3],
        ];

        foreach ($plans as $plan) {
            PricingPlan::query()->updateOrCreate(
                ['name' => $plan['name']],
                array_merge($plan, [
                    'period' => '/ Mo',
                    'currency' => '$',
                    'features' => ['HTML5 & CSS3', 'Bootstrap v4', 'Responsive Layout', 'Compatible With All Browsers'],
                    'button_text' => 'Order Now',
                    'button_url' => '/contact',
                    'is_published' => true,
                ])
            );
        }

        $teams = [
            ['name' => 'John Doe', 'slug' => 'john-doe', 'designation' => 'CEO, Founder', 'sort_order' => 1],
            ['name' => 'Kate Wilson', 'slug' => 'kate-wilson', 'designation' => 'Designer', 'sort_order' => 2],
            ['name' => 'John Brown', 'slug' => 'john-brown', 'designation' => 'Developer', 'sort_order' => 3],
            ['name' => 'Paul Watson', 'slug' => 'paul-watson', 'designation' => 'Marketer', 'sort_order' => 4],
        ];

        foreach ($teams as $member) {
            Team::query()->updateOrCreate(
                ['slug' => $member['slug']],
                [
                    'name' => $member['name'],
                    'designation' => $member['designation'],
                    'content' => '<p>'.$member['name'].' is a valued team member working as '.$member['designation'].'.</p>',
                    'facebook' => '#',
                    'twitter' => '#',
                    'linkedin' => '#',
                    'is_published' => true,
                    'sort_order' => $member['sort_order'],
                ]
            );
        }

        for ($i = 1; $i <= 4; $i++) {
            Testimonial::query()->updateOrCreate(
                ['name' => "Client Name {$i}"],
                [
                    'profession' => 'Profession',
                    'content' => 'Tempor lorem dolor sea et ipsum, lorem justo kasd dolore vero eos. Lorem duo ipsum sea amet et clita dolor',
                    'is_published' => true,
                    'sort_order' => $i,
                ]
            );
        }

        Page::query()->updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'banner_title' => 'Privacy Policy',
                'content' => '<p>Your privacy policy content goes here. Edit this page from the admin CMS.</p>',
                'is_published' => true,
                'sort_order' => 1,
            ]
        );

        MenuItem::query()->delete();

        $home = MenuItem::query()->create(['label' => 'Home', 'type' => 'route', 'route_name' => 'home', 'sort_order' => 1, 'is_active' => true]);
        MenuItem::query()->create(['label' => 'About', 'type' => 'route', 'route_name' => 'about', 'sort_order' => 2, 'is_active' => true]);
        MenuItem::query()->create(['label' => 'Services', 'type' => 'route', 'route_name' => 'services', 'sort_order' => 3, 'is_active' => true]);
        MenuItem::query()->create(['label' => 'Prices', 'type' => 'route', 'route_name' => 'prices', 'sort_order' => 4, 'is_active' => true]);
        MenuItem::query()->create(['label' => 'Projects', 'type' => 'route', 'route_name' => 'projects', 'sort_order' => 5, 'is_active' => true]);

        $pagesParent = MenuItem::query()->create([
            'label' => 'Pages',
            'type' => 'custom',
            'url' => '#',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        MenuItem::query()->create([
            'parent_id' => $pagesParent->id,
            'label' => 'Meet The Team',
            'type' => 'route',
            'route_name' => 'team',
            'sort_order' => 1,
            'is_active' => true,
        ]);
        MenuItem::query()->create([
            'parent_id' => $pagesParent->id,
            'label' => 'Testimonial',
            'type' => 'route',
            'route_name' => 'testimonials',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        MenuItem::query()->create(['label' => 'Contact', 'type' => 'route', 'route_name' => 'contact', 'sort_order' => 7, 'is_active' => true]);

        unset($home);
    }
}
