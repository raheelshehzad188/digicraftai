@extends('layouts.frontend')

@php
    $seo = page_banner_seo('project_detail', [
        'title' => $project->title.' - '.$settings->site_name,
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
    @include('partials.page-header', ['bannerKey' => 'project_detail', 'title' => $project->title, 'parent' => ['label' => 'Projects', 'route' => 'projects']])
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <img class="img-fluid rounded w-100" src="{{ cms_image($project->image, 'project-1.jpg') }}" alt="{{ $project->title }}">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 mb-3">{{ $project->title }}</h1>
                    @if($project->category)<p class="text-primary">Category: {{ $project->category->name }}</p>@endif
                    @if($project->client)<p>Client: {{ $project->client }}</p>@endif
                    <p class="fs-5">{{ $project->description }}</p>
                    <div class="mb-4">{!! $project->content !!}</div>
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-primary rounded-pill px-4 py-3">View Live</a>
                    @endif
                    <a href="{{ route('projects') }}" class="btn btn-dark rounded-pill px-4 py-3 ms-2">All Projects</a>
                </div>
            </div>
            @if($related->isNotEmpty())
                <div class="mt-5">
                    <h2 class="display-6 text-center mb-5">Related Projects</h2>
                    @include('partials.portfolio-grid', ['projects' => $related])
                </div>
            @endif
        </div>
    </div>
@endsection
