@extends('layouts.frontend')

@section('title', $settings->site_name.' - Projects')

@section('content')
    @include('partials.page-header', ['title' => 'Projects'])

    <!-- Portfolio Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">{{ $section?->title ?? 'Visit Our Projects' }}</h1>
            @include('partials.portfolio-grid', ['projects' => $projects, 'categories' => $categories])
        </div>
    </div>
    <!-- Portfolio End -->
@endsection
