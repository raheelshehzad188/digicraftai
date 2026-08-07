@extends('layouts.frontend')

@php
    $seo = page_banner_seo('services', [
        'title' => $settings->site_name.' - Services',
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
    @include('partials.page-header', ['bannerKey' => 'services', 'title' => $section?->extra['banner_title'] ?? 'Services'])
    <div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                @if($section?->subtitle)<h5 class="text-primary">{{ $section->subtitle }}</h5>@endif
                <h1>{{ $section?->title ?: 'Our Services' }}</h1>
            </div>
            @include('partials.services-grid', ['services' => $services])
        </div>
    </div>
@endsection
