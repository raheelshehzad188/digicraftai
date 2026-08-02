@extends('layouts.frontend')

@section('title', $settings->site_name.' - Home')

@section('content')
    @php $hero = $sections->get('hero'); @endphp
    @if($hero?->is_visible)
        <!-- Header Start -->
        <div class="container-fluid bg-primary py-5 px-0" style="margin-bottom: 90px;">
            <div class="row mx-0 align-items-center">
                <div class="col-lg-6 px-md-5 text-center text-lg-left">
                    <h1 class="display-2 text-uppercase mb-3">{{ $hero->title }}</h1>
                    <p class="text-dark mb-4">{{ $hero->content }}</p>
                    @if($hero->button_text)
                        <a href="{{ $hero->button_url ?: route('about') }}" class="btn btn-dark text-uppercase mt-1 py-3 px-5">{{ $hero->button_text }}</a>
                    @endif
                </div>
                <div class="col-lg-6 px-0 text-right">
                    <img class="img-fluid mt-5 mt-lg-0" src="{{ cms_image($hero->image, 'header.png') }}" alt="{{ $hero->title }}">
                </div>
            </div>
        </div>
        <!-- Header End -->
    @endif

    @php $about = $sections->get('about'); @endphp
    @if($about?->is_visible)
        <!-- About Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid mb-4 mb-lg-0" src="{{ cms_image($about->image, 'about.jpg') }}" alt="{{ $about->title }}">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-4 text-uppercase mb-4">{{ $about->title }}</h1>
                        @if($about->subtitle)
                            <h5 class="text-uppercase text-primary mb-3">{{ $about->subtitle }}</h5>
                        @endif
                        <p class="mb-4">{!! nl2br(e($about->content)) !!}</p>
                        @if($about->button_text)
                            <a href="{{ $about->button_url ?: route('about') }}" class="btn btn-primary text-uppercase py-3 px-5">{{ $about->button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endif

    @php $servicesTitle = $sections->get('services_title'); @endphp
    @if($servicesTitle?->is_visible)
        <!-- Services Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <h1 class="display-4 text-uppercase text-center mb-5">{{ $servicesTitle->title }}</h1>
                @include('partials.services-grid', ['services' => $services])
            </div>
        </div>
        <!-- Services End -->
    @endif

    @php $portfolioTitle = $sections->get('portfolio_title'); @endphp
    @if($portfolioTitle?->is_visible)
        <!-- Portfolio Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <h1 class="display-4 text-uppercase text-center mb-5">{{ $portfolioTitle->title }}</h1>
                @include('partials.portfolio-grid', ['projects' => $projects, 'categories' => $categories])
            </div>
        </div>
        <!-- Portfolio End -->
    @endif

    @php $pricingTitle = $sections->get('pricing_title'); @endphp
    @if($pricingTitle?->is_visible)
        <!-- Pricing Plan Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <h1 class="display-4 text-uppercase text-center mb-5">{{ $pricingTitle->title }}</h1>
                @include('partials.pricing-grid', ['pricingPlans' => $pricingPlans])
            </div>
        </div>
        <!-- Pricing Plan End -->
    @endif

    @php $teamTitle = $sections->get('team_title'); @endphp
    @if($teamTitle?->is_visible)
        <!-- Team Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="display-4 text-uppercase text-center mb-5">{{ $teamTitle->title }}</h1>
                @include('partials.team-carousel', ['teams' => $teams])
            </div>
        </div>
        <!-- Team End -->
    @endif

    @php $testimonialTitle = $sections->get('testimonial_title'); @endphp
    @if($testimonialTitle?->is_visible)
        <!-- Testimonial Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="display-4 text-uppercase text-center mb-5">{{ $testimonialTitle->title }}</h1>
                @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
            </div>
        </div>
        <!-- Testimonial End -->
    @endif

    @php $contact = $sections->get('contact'); @endphp
    @if($contact?->is_visible)
        <!-- Contact Start -->
        @include('partials.contact-section', ['section' => $contact, 'showTitle' => false])
        <!-- Contact End -->
    @endif
@endsection
