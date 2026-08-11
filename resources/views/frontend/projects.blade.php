@extends('layouts.frontend')

@php
    $seo = page_banner_seo('projects', [
        'title' => trim(($settings->site_name ?? '').($settings->brand_accent ?? '')).' - Projects',
        'description' => $settings->tagline,
        'keywords' => $settings->tagline,
    ]);
@endphp
@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', $seo['keywords'])
@section('og_title', $seo['og_title'])
@section('og_description', $seo['og_description'])

@section('content')
    @include('partials.page-header', [
        'bannerKey' => 'projects',
        'title' => $section?->extra['banner_title'] ?? 'Our Projects',
        'crumb' => 'Projects',
    ])
    <div class="container-fluid py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                @if($section?->subtitle)<h5 class="text-primary">{{ $section->subtitle }}</h5>@endif
                <h1>{{ $section?->title ?: 'Recently Completed Projects' }}</h1>
            </div>
            @include('partials.portfolio-grid', [
                'projects' => $projects,
                'readMoreText' => $section?->extra['read_more_text'] ?? 'View Project',
            ])
        </div>
    </div>
@endsection
