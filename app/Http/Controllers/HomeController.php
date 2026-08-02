<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use App\Models\PricingPlan;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sections = HomeSection::query()->orderBy('sort_order')->get()->keyBy('key');

        return view('frontend.home', [
            'sections' => $sections,
            'services' => Service::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'projects' => Project::with('category')->where('is_published', true)->orderBy('sort_order')->get(),
            'categories' => ProjectCategory::query()->orderBy('sort_order')->get(),
            'pricingPlans' => PricingPlan::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'teams' => Team::query()->where('is_published', true)->orderBy('sort_order')->get(),
            'testimonials' => Testimonial::query()->where('is_published', true)->orderBy('sort_order')->get(),
        ]);
    }
}
