@extends('layouts.frontend')

@php
    $seo = page_banner_seo('about', [
        'title' => $settings->site_name.' - '.($bannerTitle ?? 'About'),
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
    @include('partials.page-header', ['bannerKey' => 'about', 'title' => $bannerTitle ?? 'About Us'])

    @if($section?->is_visible ?? true)
        <div class="container-fluid py-5 my-5">
            <div class="container pt-5">
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
                        @if($section?->subtitle)
                            <h5 class="text-primary">{{ $section->subtitle }}</h5>
                        @endif
                        @if($section?->title)
                            <h1 class="mb-4">{{ $section->title }}</h1>
                        @endif
                        <div class="mb-4">{!! cms_html($section?->content) !!}</div>

                        @php $features = $section?->extra['features'] ?? []; @endphp
                        @if(!empty($features))
                            <div class="row g-3 mb-4">
                                @foreach($features as $feature)
                                    <div class="col-6 col-md-3">
                                        <div class="text-center p-3 bg-light rounded">
                                            <i class="fas {{ $feature['icon'] ?? 'fa-check' }} fa-2x text-secondary mb-2"></i>
                                            @if(!empty($feature['line1']))<h6 class="mb-0">{{ $feature['line1'] }}</h6>@endif
                                            @if(!empty($feature['line2']))<small>{{ $feature['line2'] }}</small>@endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($section?->button_text)
                            <a href="{{ $section->button_url ?: route('services') }}" class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ $section->button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(($section?->extra['show_cta'] ?? true) && $cta)
        @include('partials.newsletter-cta', ['cta' => $cta])
    @endif

    @if(($section?->extra['show_team'] ?? true) && $teams->isNotEmpty())
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($teamSection?->subtitle)<h5 class="text-primary">{{ $teamSection->subtitle }}</h5>@endif
                    <h1>{{ $teamSection?->title ?? 'Our Team Members' }}</h1>
                </div>
                @include('partials.team-grid', ['teams' => $teams])
            </div>
        </div>
    @endif

    @if(($section?->extra['show_testimonials'] ?? true) && $testimonials->isNotEmpty())
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($testimonialSection?->subtitle)<h5 class="text-primary">{{ $testimonialSection->subtitle }}</h5>@endif
                    <h1>{{ $testimonialSection?->title ?? 'What Clients Say' }}</h1>
                </div>
                @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
            </div>
        </div>
    @endif
@endsection
