@extends('layouts.frontend')

@php
    $seo = page_banner_seo('about', [
        'title' => trim(($settings->site_name ?? '').($settings->brand_accent ?? '')).' - About',
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
        'bannerKey' => 'about',
        'title' => $bannerTitle ?? ($section?->extra['banner_title'] ?? 'About Us'),
        'crumb' => 'About',
    ])

    @if($section?->is_visible ?? true)
        <div class="container-fluid py-5 my-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img src="{{ cms_image($section?->image, 'about-1.jpg') }}" class="img-fluid w-75 rounded" alt="{{ $section?->title }}" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="{{ cms_image($section?->extra['image_2'] ?? null, 'about-2.jpg') }}" class="img-fluid w-100 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        @if($section?->subtitle)<h5 class="text-primary">{{ $section->subtitle }}</h5>@endif
                        @if($section?->title)<h1 class="mb-4">{{ $section->title }}</h1>@endif
                        <div>{!! cms_html($section?->content) !!}</div>
                        @if($section?->button_text)
                            <a href="{{ $section->button_url ?: route('services') }}" class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ $section->button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
