<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\HomeSection;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\PageBanner;
use App\Models\PricingPlan;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@digicraftai.test'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        SiteSetting::query()->updateOrCreate(['id' => 1], SiteSetting::defaults() + [
            'email' => 'Email@Example.com',
            'phone' => '+ 0123 456 7890',
            'address' => '23 Ranking Street, New York',
            'contact_display_address' => '23 rank Str, NY',
            'contact_map_link' => 'https://goo.gl/maps/Zd4BCynmTb98ivUJ6',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'linkedin' => '#',
            'copyright_text' => 'All right reserved.',
        ]);

        $facts = [
            ['value' => 99, 'label' => 'Success in getting happy customer'],
            ['value' => 25, 'label' => 'Thousands of successful business'],
            ['value' => 120, 'label' => 'Total clients who love HighTech'],
            ['value' => 5, 'label' => 'Stars reviews given by satisfied clients'],
        ];

        $aboutContent = <<<HTML
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo nec erat vestibulum, et malesuada augue laoreet.</p>
<p>Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
HTML;

        $sections = [
            [
                'key' => 'hero',
                'name' => '1. Hero / Carousel',
                'title' => 'Hero',
                'is_visible' => true,
                'sort_order' => 1,
            ],
            [
                'key' => 'facts',
                'name' => '2. Fact Counters',
                'title' => 'Facts',
                'extra' => ['facts' => $facts],
                'is_visible' => true,
                'sort_order' => 2,
            ],
            [
                'key' => 'about',
                'name' => '3. About Section',
                'subtitle' => 'About Us',
                'title' => "About HighTech Agency And It's Innovative IT Solutions",
                'content' => $aboutContent,
                'button_text' => 'More Details',
                'button_url' => '/about',
                'image' => 'hightech/about-1.jpg',
                'extra' => [
                    'image_2' => 'hightech/about-2.jpg',
                    'banner_title' => 'About Us',
                    'show_cta' => false,
                    'show_team' => false,
                    'show_testimonials' => false,
                ],
                'is_visible' => true,
                'sort_order' => 3,
            ],
            [
                'key' => 'services_title',
                'name' => '4. Services Heading',
                'subtitle' => 'Our Services',
                'title' => 'Services Built Specifically For Your Business',
                'extra' => ['read_more_text' => 'Read More'],
                'is_visible' => true,
                'sort_order' => 4,
            ],
            [
                'key' => 'blog_title',
                'name' => '5. Blog Heading',
                'subtitle' => 'Our Blog',
                'title' => 'Latest Blog & News',
                'extra' => ['read_more_text' => 'Read More', 'share_label' => 'Share'],
                'is_visible' => true,
                'sort_order' => 5,
            ],
            [
                'key' => 'contact',
                'name' => '6. Contact Section',
                'subtitle' => 'Get In Touch',
                'title' => 'Contact for any query',
                'extra' => [
                    'address_label' => 'Address',
                    'phone_label' => 'Call Us',
                    'email_label' => 'Email Us',
                    'form_notice' => 'Send us a message and we will get back to you shortly.',
                    'name_placeholder' => 'Your Name',
                    'email_placeholder' => 'Your Email',
                    'subject_placeholder' => 'Project',
                    'message_placeholder' => 'Message',
                    'submit_text' => 'Send Message',
                ],
                'is_visible' => true,
                'sort_order' => 6,
            ],
            ['key' => 'portfolio_title', 'name' => '7. Projects Heading', 'subtitle' => 'Our Projects', 'title' => 'Recently Completed Projects', 'extra' => ['read_more_text' => 'View Project'], 'is_visible' => true, 'sort_order' => 7],
            ['key' => 'pricing_title', 'name' => '8. Pricing Heading', 'subtitle' => 'Our Pricing', 'title' => 'Affordable Pricing Plans', 'is_visible' => true, 'sort_order' => 8],
            ['key' => 'team_title', 'name' => '9. Team Heading', 'subtitle' => 'Our Team', 'title' => 'Meet Our Expert Team', 'is_visible' => true, 'sort_order' => 9],
            ['key' => 'quote_form', 'name' => 'Quote Form', 'title' => 'Get A Quote', 'is_visible' => false, 'sort_order' => 90],
            ['key' => 'testimonial_title', 'name' => 'Testimonials', 'title' => 'Testimonials', 'is_visible' => false, 'sort_order' => 94],
            ['key' => 'cta', 'name' => 'Newsletter CTA', 'title' => 'Subscribe', 'is_visible' => false, 'sort_order' => 95],
        ];

        foreach ($sections as $section) {
            HomeSection::query()->updateOrCreate(['key' => $section['key']], $section);
        }

        Slider::query()->delete();
        $slideBody = 'Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies tincidunt.';
        Slider::query()->create([
            'subtitle' => 'Best IT Solutions',
            'title' => 'An Innovative IT Solutions Agency',
            'description' => $slideBody,
            'image' => 'hightech/carousel-1.jpg',
            'button_text' => 'Read More',
            'button_url' => '/about',
            'button_2_text' => 'Contact Us',
            'button_2_url' => '/contact',
            'sort_order' => 1,
            'is_active' => true,
        ]);
        Slider::query()->create([
            'subtitle' => 'Best IT Solutions',
            'title' => 'Quality Digital Services You Really Need!',
            'description' => $slideBody,
            'image' => 'hightech/carousel-2.jpg',
            'button_text' => 'Read More',
            'button_url' => '/about',
            'button_2_text' => 'Contact Us',
            'button_2_url' => '/contact',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Service::query()->delete();
        $serviceDesc = 'Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt.';
        $services = [
            ['title' => 'Web Design', 'icon' => 'fa fa-code', 'sort_order' => 1],
            ['title' => 'Web Development', 'icon' => 'fa fa-file-code', 'sort_order' => 2],
            ['title' => 'UI/UX Design', 'icon' => 'fa fa-external-link-alt', 'sort_order' => 3],
            ['title' => 'Web Cecurity', 'icon' => 'fas fa-user-secret', 'sort_order' => 4],
            ['title' => 'Digital Marketing', 'icon' => 'fa fa-envelope-open', 'sort_order' => 5],
            ['title' => 'Programming', 'icon' => 'fas fa-laptop', 'sort_order' => 6],
        ];
        foreach ($services as $service) {
            Service::query()->create([
                'title' => $service['title'],
                'slug' => \Illuminate\Support\Str::slug($service['title']),
                'icon' => $service['icon'],
                'description' => $serviceDesc,
                'content' => '<p>'.$serviceDesc.'</p>',
                'is_published' => true,
                'sort_order' => $service['sort_order'],
            ]);
        }

        Blog::query()->delete();
        $blogExcerpt = 'Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt libero sit amet';
        $blogs = [
            ['title' => 'Web Design Trends', 'category' => 'Web Design', 'image' => 'hightech/blog-1.jpg', 'date' => '2023-03-24'],
            ['title' => 'Development Best Practices', 'category' => 'Development', 'image' => 'hightech/blog-2.jpg', 'date' => '2023-04-23'],
            ['title' => 'Mobile App Insights', 'category' => 'Mobile App', 'image' => 'hightech/blog-3.jpg', 'date' => '2023-01-30'],
        ];
        foreach ($blogs as $i => $blog) {
            Blog::query()->create([
                'title' => $blog['title'],
                'slug' => Str::slug($blog['title']),
                'image' => $blog['image'],
                'excerpt' => $blogExcerpt,
                'content' => '<p>'.$blogExcerpt.'</p>',
                'author' => 'Daniel Martin',
                'category' => $blog['category'],
                'author_image' => 'hightech/admin.jpg',
                'published_at' => $blog['date'],
                'comments_count' => 5,
                'shares_count' => 5324,
                'is_published' => true,
                'sort_order' => $i + 1,
            ]);
        }

        Project::query()->delete();
        ProjectCategory::query()->delete();
        $web = ProjectCategory::query()->create(['name' => 'Web Design', 'slug' => 'web-design', 'filter_class' => 'web', 'sort_order' => 1]);
        $app = ProjectCategory::query()->create(['name' => 'App Development', 'slug' => 'app-development', 'filter_class' => 'app', 'sort_order' => 2]);
        $mkt = ProjectCategory::query()->create(['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'filter_class' => 'marketing', 'sort_order' => 3]);
        $projectDesc = 'Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt.';
        $projectContent = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies tincidunt.</p>';
        $projectItems = [
            ['title' => 'Corporate Website Redesign', 'cat' => $web, 'client' => 'HighTech Corp', 'img' => 'projects/project-1.jpg'],
            ['title' => 'E-Commerce Platform', 'cat' => $web, 'client' => 'ShopMax', 'img' => 'projects/project-2.jpg'],
            ['title' => 'Mobile Banking App UI', 'cat' => $app, 'client' => 'FinSoft', 'img' => 'projects/project-3.jpg'],
            ['title' => 'SaaS Dashboard System', 'cat' => $app, 'client' => 'CloudOps', 'img' => 'projects/project-4.jpg'],
            ['title' => 'Brand SEO Campaign', 'cat' => $mkt, 'client' => 'Growly', 'img' => 'projects/project-5.jpg'],
            ['title' => 'Social Media Launch Kit', 'cat' => $mkt, 'client' => 'BuzzMedia', 'img' => 'projects/project-6.jpg'],
        ];
        foreach ($projectItems as $i => $item) {
            Project::query()->create([
                'project_category_id' => $item['cat']->id,
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'description' => $projectDesc,
                'content' => $projectContent,
                'image' => $item['img'],
                'client' => $item['client'],
                'project_url' => '#',
                'is_featured' => $i < 3,
                'is_published' => true,
                'sort_order' => $i + 1,
            ]);
        }

        PricingPlan::query()->delete();
        PricingPlan::query()->insert([
            [
                'name' => 'Basic',
                'tagline' => 'Perfect for startups and small businesses',
                'price' => 49,
                'period' => '/ month',
                'currency' => '$',
                'features' => json_encode(['10 GB SSD Storage', '50 GB Bandwidth', 'Unlimited Emails', 'Free SSL Certificate', '-Dedicated Support']),
                'button_text' => 'Get Started',
                'button_url' => '/contact',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard',
                'tagline' => 'Best for growing agencies and teams',
                'price' => 99,
                'period' => '/ month',
                'currency' => '$',
                'features' => json_encode(['50 GB SSD Storage', '200 GB Bandwidth', 'Unlimited Emails', 'Free SSL Certificate', 'Priority Support']),
                'button_text' => 'Get Started',
                'button_url' => '/contact',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium',
                'tagline' => 'Enterprise-grade power and flexibility',
                'price' => 149,
                'period' => '/ month',
                'currency' => '$',
                'features' => json_encode(['100 GB SSD Storage', 'Unlimited Bandwidth', 'Unlimited Emails', 'Free SSL Certificate', '24/7 Dedicated Support']),
                'button_text' => 'Get Started',
                'button_url' => '/contact',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Team::query()->delete();
        $teamMembers = [
            ['name' => 'Daniel Martin', 'designation' => 'CEO & Founder', 'img' => 'teams/team-1.jpg'],
            ['name' => 'Sarah Johnson', 'designation' => 'Project Manager', 'img' => 'teams/team-2.jpg'],
            ['name' => 'Michael Lee', 'designation' => 'Lead Developer', 'img' => 'teams/team-3.jpg'],
            ['name' => 'Emily Davis', 'designation' => 'UI/UX Designer', 'img' => 'teams/team-4.jpg'],
        ];
        foreach ($teamMembers as $i => $member) {
            Team::query()->create([
                'name' => $member['name'],
                'slug' => Str::slug($member['name']),
                'designation' => $member['designation'],
                'image' => $member['img'],
                'bio' => 'Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum.</p>',
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'linkedin' => '#',
                'is_published' => true,
                'sort_order' => $i + 1,
            ]);
        }

        Page::query()->updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'content' => '<p>Privacy policy content for HighTech.</p>',
                'is_published' => true,
                'sort_order' => 1,
            ]
        );

        MenuItem::query()->delete();
        $menu = [
            ['label' => 'Home', 'type' => 'route', 'route_name' => 'home', 'sort_order' => 1],
            ['label' => 'About', 'type' => 'route', 'route_name' => 'about', 'sort_order' => 2],
            ['label' => 'Services', 'type' => 'route', 'route_name' => 'services', 'sort_order' => 3],
            ['label' => 'Projects', 'type' => 'route', 'route_name' => 'projects', 'sort_order' => 4],
            ['label' => 'Prices', 'type' => 'route', 'route_name' => 'prices', 'sort_order' => 5],
            ['label' => 'Team', 'type' => 'route', 'route_name' => 'team', 'sort_order' => 6],
            ['label' => 'Blog Posts', 'type' => 'route', 'route_name' => 'blog', 'sort_order' => 7],
            ['label' => 'Contact', 'type' => 'route', 'route_name' => 'contact', 'sort_order' => 8],
        ];
        foreach ($menu as $item) {
            MenuItem::query()->create($item + ['is_active' => true, 'target' => '_self']);
        }

        $banners = [
            ['page_key' => 'about', 'label' => 'About', 'title' => 'About Us'],
            ['page_key' => 'services', 'label' => 'Services', 'title' => 'Services'],
            ['page_key' => 'projects', 'label' => 'Projects', 'title' => 'Our Projects'],
            ['page_key' => 'project_detail', 'label' => 'Project Detail', 'title' => 'Project Detail'],
            ['page_key' => 'prices', 'label' => 'Pricing', 'title' => 'Pricing Plans'],
            ['page_key' => 'team', 'label' => 'Team', 'title' => 'Our Team'],
            ['page_key' => 'blog', 'label' => 'Blog', 'title' => 'Our Blog'],
            ['page_key' => 'contact', 'label' => 'Contact', 'title' => 'Contact Us'],
            ['page_key' => 'home', 'label' => 'Home', 'title' => 'Home'],
            ['page_key' => 'default', 'label' => 'Default', 'title' => 'Page'],
        ];
        foreach ($banners as $i => $banner) {
            PageBanner::query()->updateOrCreate(
                ['page_key' => $banner['page_key']],
                [
                    'label' => $banner['label'],
                    'title' => $banner['title'],
                    'background_image' => 'hightech/carousel-1.jpg',
                    'is_active' => true,
                    'sort_order' => $i + 1,
                ]
            );
        }
    }
}
