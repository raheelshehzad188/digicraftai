@extends('layouts.frontend')

@section('title', $project->title.' - '.$settings->site_name)

@section('content')
    @include('partials.page-header', [
        'title' => $project->title,
        'parent' => ['label' => 'Projects', 'route' => 'projects'],
    ])

    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row align-items-start">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    @php
                        $imageUrl = cms_image($project->image, 'portfolio-1.jpg');
                    @endphp
                    <img class="img-fluid w-100 rounded" src="{{ $imageUrl }}" alt="{{ $project->title }}">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-4 text-uppercase mb-3">{{ $project->title }}</h1>
                    @if($project->category)
                        <h5 class="text-uppercase text-primary mb-3">{{ $project->category->name }}</h5>
                    @endif
                    @if($project->client)
                        <p class="mb-2"><strong>Client:</strong> {{ $project->client }}</p>
                    @endif
                    @if($project->description)
                        <p class="mb-4">{{ $project->description }}</p>
                    @endif
                    @if($project->content)
                        <div class="mb-4">{!! $project->content !!}</div>
                    @endif
                    <div class="d-flex flex-wrap" style="gap: 10px;">
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="btn btn-primary text-uppercase py-3 px-5">View Live</a>
                        @endif
                        <a href="{{ route('projects') }}" class="btn btn-dark text-uppercase py-3 px-5">All Projects</a>
                        <a href="{{ $imageUrl }}" data-lightbox="project-detail" class="btn btn-outline-dark text-uppercase py-3 px-5">Zoom Image</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($related->isNotEmpty())
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <h2 class="display-4 text-uppercase text-center mb-5">Related Projects</h2>
                @include('partials.portfolio-grid', [
                    'projects' => $related,
                    'categories' => collect(),
                    'hideFilters' => true,
                ])
            </div>
        </div>
    @endif
@endsection
