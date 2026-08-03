<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function project(string $slug): View
    {
        $project = Project::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $related = Project::with('category')
            ->where('is_published', true)
            ->where('id', '!=', $project->id)
            ->when($project->project_category_id, fn ($q) => $q->where('project_category_id', $project->project_category_id))
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('frontend.project-detail', compact('project', 'related'));
    }

    public function service(string $slug): View
    {
        $service = Service::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $related = Service::query()
            ->where('is_published', true)
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('frontend.service-detail', compact('service', 'related'));
    }

    public function team(string $slug): View
    {
        $member = Team::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $related = Team::query()
            ->where('is_published', true)
            ->where('id', '!=', $member->id)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('frontend.team-detail', compact('member', 'related'));
    }
}
