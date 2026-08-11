@extends('layouts.frontend')

@php
    $seo = page_banner_seo('home', [
        'title' => trim(($settings->site_name ?? '').($settings->brand_accent ?? '')).' - IT Solutions',
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
    @php $hero = $sections->get('hero'); @endphp
    @if(($hero?->is_visible ?? true) && $sliders->isNotEmpty())
        <div class="container-fluid px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($sliders as $i => $slide)
                        <li data-bs-target="#carouselId" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" @if($i===0) aria-current="true" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($sliders as $i => $slide)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <img src="{{ cms_image($slide->image, $i % 2 === 0 ? 'carousel-1.jpg' : 'carousel-2.jpg') }}" class="img-fluid" alt="{{ $slide->title }}">
                            <div class="carousel-caption">
                                <div class="container carousel-content">
                                    @if($slide->subtitle)
                                        <h6 class="text-secondary h4 animated fadeInUp">{{ $slide->subtitle }}</h6>
                                    @endif
                                    <h1 class="text-white display-1 mb-4 animated fadeInRight">{{ $slide->title }}</h1>
                                    @if($slide->description)
                                        <p class="mb-4 text-white fs-5 animated fadeInDown">{{ $slide->description }}</p>
                                    @endif
                                    @if($slide->button_text)
                                        <a href="{{ $slide->button_url ?: route('about') }}" class="me-2">
                                            <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">{{ $slide->button_text }}</button>
                                        </a>
                                    @endif
                                    @if($slide->button_2_text)
                                        <a href="{{ $slide->button_2_url ?: route('contact') }}" class="ms-2">
                                            <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">{{ $slide->button_2_text }}</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    @endif

    @php
        $factsSection = $sections->get('facts');
        $facts = $factsSection?->extra['facts']
            ?? ($sections->get('about')?->extra['facts'] ?? []);
    @endphp
    @if(($factsSection?->is_visible ?? true) && !empty($facts))
        @include('partials.facts-strip', ['facts' => $facts])
    @endif

    @php $about = $sections->get('about'); @endphp
    @if($about?->is_visible)
        <div class="container-fluid py-5 my-5">
            <div class="container pt-5">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img src="{{ cms_image($about->image, 'about-1.jpg') }}" class="img-fluid w-75 rounded" alt="{{ $about->title }}" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="{{ cms_image($about->extra['image_2'] ?? null, 'about-2.jpg') }}" class="img-fluid w-100 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        @if($about->subtitle)<h5 class="text-primary">{{ $about->subtitle }}</h5>@endif
                        <h1 class="mb-4">{{ $about->title }}</h1>
                        <div>{!! cms_html($about->content) !!}</div>
                        @if($about->button_text)
                            <a href="{{ $about->button_url ?: route('about') }}" class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ $about->button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @php $servicesTitle = $sections->get('services_title'); @endphp
    @if($servicesTitle?->is_visible)
        <div class="container-fluid services py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($servicesTitle->subtitle)<h5 class="text-primary">{{ $servicesTitle->subtitle }}</h5>@endif
                    <h1>{{ $servicesTitle->title }}</h1>
                </div>
                @include('partials.services-grid', [
                    'services' => $services,
                    'readMoreText' => $servicesTitle->extra['read_more_text'] ?? 'Read More',
                ])
            </div>
        </div>
    @endif

    @php $blogTitle = $sections->get('blog_title'); @endphp
    @if($blogTitle?->is_visible && $blogs->isNotEmpty())
        <div class="container-fluid blog py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($blogTitle->subtitle)<h5 class="text-primary">{{ $blogTitle->subtitle }}</h5>@endif
                    <h1>{{ $blogTitle->title }}</h1>
                </div>
                @include('partials.blog-carousel', [
                    'blogs' => $blogs->take(3),
                    'readMoreText' => $blogTitle->extra['read_more_text'] ?? 'Read More',
                    'shareLabel' => $blogTitle->extra['share_label'] ?? 'Share',
                ])
            </div>
        </div>
    @endif

    @php $portfolioTitle = $sections->get('portfolio_title'); @endphp
    @if($portfolioTitle?->is_visible && $projects->isNotEmpty())
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($portfolioTitle->subtitle)<h5 class="text-primary">{{ $portfolioTitle->subtitle }}</h5>@endif
                    <h1>{{ $portfolioTitle->title }}</h1>
                </div>
                @include('partials.portfolio-grid', [
                    'projects' => $projects->take(6),
                    'readMoreText' => $portfolioTitle->extra['read_more_text'] ?? 'View Project',
                ])
            </div>
        </div>
    @endif

    @php $pricingTitle = $sections->get('pricing_title'); @endphp
    @if($pricingTitle?->is_visible && $pricingPlans->isNotEmpty())
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($pricingTitle->subtitle)<h5 class="text-primary">{{ $pricingTitle->subtitle }}</h5>@endif
                    <h1>{{ $pricingTitle->title }}</h1>
                </div>
                @include('partials.pricing-grid', ['pricingPlans' => $pricingPlans])
            </div>
        </div>
    @endif

    @php $teamTitle = $sections->get('team_title'); @endphp
    @if($teamTitle?->is_visible && $teams->isNotEmpty())
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($teamTitle->subtitle)<h5 class="text-primary">{{ $teamTitle->subtitle }}</h5>@endif
                    <h1>{{ $teamTitle->title }}</h1>
                </div>
                @include('partials.team-grid', ['teams' => $teams])
            </div>
        </div>
    @endif

    @php $contactSection = $sections->get('contact'); @endphp
    @if($contactSection?->is_visible)
        @include('partials.contact-section', ['section' => $contactSection, 'showTitle' => true])
    @endif
@endsection
