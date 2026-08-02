<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use App\Models\Page;
use App\Models\PricingPlan;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('frontend.about', [
            'section' => HomeSection::byKey('about'),
        ]);
    }

    public function services(): View
    {
        return view('frontend.services', [
            'services' => Service::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'section' => HomeSection::byKey('services_title'),
        ]);
    }

    public function prices(): View
    {
        return view('frontend.prices', [
            'pricingPlans' => PricingPlan::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'section' => HomeSection::byKey('pricing_title'),
        ]);
    }

    public function projects(): View
    {
        return view('frontend.projects', [
            'projects' => Project::with('category')->where('is_published', true)->orderBy('sort_order')->get(),
            'categories' => ProjectCategory::query()->orderBy('sort_order')->get(),
            'section' => HomeSection::byKey('portfolio_title'),
        ]);
    }

    public function team(): View
    {
        return view('frontend.team', [
            'teams' => Team::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'section' => HomeSection::byKey('team_title'),
        ]);
    }

    public function testimonials(): View
    {
        return view('frontend.testimonials', [
            'testimonials' => Testimonial::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'section' => HomeSection::byKey('testimonial_title'),
        ]);
    }

    public function contact(): View
    {
        return view('frontend.contact', [
            'section' => HomeSection::byKey('contact'),
        ]);
    }

    public function show(string $slug): View
    {
        $page = Page::with('sections')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('frontend.page', compact('page'));
    }
}
