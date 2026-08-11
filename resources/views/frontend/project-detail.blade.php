@extends('layouts.frontend')

@php
    $seo = entity_seo($project, 'project_detail', [
        'title' => $project->title.' - '.trim(($settings->site_name ?? '').($settings->brand_accent ?? '')),
        'description' => \Illuminate\Support\Str::limit(strip_tags($project->description ?? ''), 160) ?: $settings->tagline,
        'keywords' => $project->title.', '.$settings->tagline,
    ]);
@endphp
@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', $seo['keywords'])
@section('og_title', $seo['og_title'])
@section('og_description', $seo['og_description'])

@section('content')
    @include('partials.page-header', [
        'bannerKey' => 'project_detail',
        'title' => $project->title,
        'crumb' => $project->title,
        'parent' => ['label' => 'Projects', 'route' => 'projects'],
    ])
    <div class="container-fluid py-5 my-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <img class="img-fluid rounded w-100" src="{{ cms_image($project->image, 'project-1.jpg') }}" alt="{{ $project->title }}">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    @if($project->category)
                        <h5 class="text-primary">{{ $project->category->name }}</h5>
                    @endif
                    <h1 class="mb-3">{{ $project->title }}</h1>
                    @if($project->client)
                        <p class="text-secondary mb-3"><strong>Client:</strong> {{ $project->client }}</p>
                    @endif
                    <p class="mb-4">{{ $project->description }}</p>
                    <div class="mb-4">{!! cms_html($project->content) !!}</div>
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-secondary rounded-pill px-5 py-3 text-white">View Live</a>
                    @endif
                    <a href="{{ route('projects') }}" class="btn btn-primary rounded-pill px-5 py-3 text-white ms-2">All Projects</a>
                </div>
            </div>

            @if($related->isNotEmpty())
                <div class="mt-5 pt-5">
                    <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                        <h5 class="text-primary">Our Projects</h5>
                        <h1>Related Projects</h1>
                    </div>
                    @include('partials.portfolio-grid', ['projects' => $related, 'readMoreText' => 'View Project'])
                </div>
            @endif
        </div>
    </div>
@endsection
