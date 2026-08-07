@extends('layouts.frontend')

@php
    $seo = page_banner_seo('home', [
        'title' => $settings->site_name.' - Home',
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
                        @php $img = cms_image($slide->image, $i % 2 === 0 ? 'carousel-1.jpg' : 'carousel-2.jpg'); @endphp
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <img src="{{ $img }}" class="img-fluid" alt="{{ $slide->title }}">
                            <div class="carousel-caption">
                                <div class="container carousel-content">
                                    @if($slide->subtitle)
                                        <h6 class="text-secondary h4 animated fadeInUp">{{ $slide->subtitle }}</h6>
                                    @endif
                                    <h1 class="text-white display-1 mb-4 animated fadeInRight">{{ $slide->title }}</h1>
                                    @if($slide->button_text)
                                        <a href="{{ $slide->button_url ?: route('about') }}" class="me-2">
                                            <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">{{ $slide->button_text }}</button>
                                        </a>
                                    @endif
                                    <a href="{{ route('contact') }}" class="ms-2">
                                        <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact Us</button>
                                    </a>
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
        $about = $sections->get('about');
        $facts = $about?->extra['facts'] ?? [
            ['value' => $about?->extra['years'] ?? 99, 'label' => $about?->extra['years_label'] ?? 'Success in getting happy customer'],
            ['value' => max(1, $services->count() * 4), 'label' => 'Thousands of successful business'],
            ['value' => max($projects->count(), 10), 'label' => 'Total clients who love '.$settings->site_name],
            ['value' => 5, 'label' => 'Stars reviews given by satisfied clients'],
        ];
    @endphp
    @if($about?->is_visible)
        <div class="container-fluid bg-secondary py-5">
            <div class="container">
                <div class="row">
                    @foreach($facts as $fi => $fact)
                        <div class="col-lg-3 wow fadeIn" data-wow-delay=".{{ 1 + $fi * 2 }}s">
                            <div class="d-flex counter">
                                <h1 class="me-3 text-primary counter-value">{{ (int) ($fact['value'] ?? 0) }}</h1>
                                <h5 class="text-white mt-1">{{ $fact['label'] ?? '' }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @php $quote = $sections->get('quote_form'); @endphp
    @if($quote?->is_visible)
        <div class="container-fluid py-5 wow fadeIn" data-wow-delay=".3s">
            <div class="container">
                <div class="bg-light px-4 py-5 rounded">
                    <div class="text-center mb-4">
                        <h1 class="mb-0">{{ $quote->title }}</h1>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('quote.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6 col-xl-3">
                                <select name="service_type" class="form-select border-0 py-3">
                                    <option value="">Type Of Service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->full_title }}">{{ $service->full_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <input type="text" name="name" class="form-control border-0 py-3" placeholder="Name" required>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <input type="text" name="phone" class="form-control border-0 py-3" placeholder="Phone">
                            </div>
                            <div class="col-md-6 col-xl-2">
                                <input type="email" name="email" class="form-control border-0 py-3" placeholder="Email" required>
                            </div>
                            <div class="col-xl-1">
                                <button type="submit" class="btn btn-secondary w-100 py-3">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

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
                        @if($about->subtitle)
                            <h5 class="text-primary">{{ $about->subtitle }}</h5>
                        @endif
                        <h1 class="mb-4">{{ $about->title }}</h1>
                        <div class="mb-4">{!! cms_html($about->content) !!}</div>
                        <a href="{{ $about->button_url ?: route('about') }}" class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ $about->button_text ?: 'More Details' }}</a>
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
                @include('partials.services-grid', ['services' => $services->take(6)])
                <div class="text-center mt-5">
                    <a href="{{ route('services') }}" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Services</a>
                </div>
            </div>
        </div>
    @endif

    @php $portfolioTitle = $sections->get('portfolio_title'); @endphp
    @if($portfolioTitle?->is_visible)
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($portfolioTitle->subtitle)<h5 class="text-primary">{{ $portfolioTitle->subtitle }}</h5>@endif
                    <h1>{{ $portfolioTitle->title }}</h1>
                </div>
                @include('partials.portfolio-grid', ['projects' => $projects->take(6)])
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
                @include('partials.blog-carousel', ['blogs' => $blogs->take(3)])
            </div>
        </div>
    @endif

    @php $cta = $sections->get('cta'); @endphp
    @if($cta?->is_visible)
        @include('partials.newsletter-cta', ['cta' => $cta])
    @endif

    @php $pricingTitle = $sections->get('pricing_title'); @endphp
    @if($pricingTitle?->is_visible)
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
    @if($teamTitle?->is_visible)
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

    @php $testimonialTitle = $sections->get('testimonial_title'); @endphp
    @if($testimonialTitle?->is_visible)
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    @if($testimonialTitle->subtitle)<h5 class="text-primary">{{ $testimonialTitle->subtitle }}</h5>@endif
                    <h1>{{ $testimonialTitle->title }}</h1>
                </div>
                @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
            </div>
        </div>
    @endif

    @php $contactSection = $sections->get('contact'); @endphp
    @if($contactSection?->is_visible)
        @include('partials.contact-section', ['section' => $contactSection, 'showTitle' => true])
    @endif
@endsection
