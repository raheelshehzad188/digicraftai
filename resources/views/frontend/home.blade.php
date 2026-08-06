@extends('layouts.frontend')

@section('title', $settings->site_name.' - Home')

@section('content')
    @php $hero = $sections->get('hero'); @endphp
    @if(($hero?->is_visible ?? true) && $sliders->isNotEmpty())
        <div class="container-fluid carousel px-0 mb-5 pb-5">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($sliders as $i => $slide)
                        <li data-bs-target="#carouselId" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($sliders as $i => $slide)
                        @php $img = cms_image($slide->image, $i % 2 === 0 ? 'carousel-2.jpg' : 'carousel-1.jpg'); @endphp
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <img src="{{ $img }}" class="img-fluid w-100" alt="{{ $slide->title }}">
                            <div class="carousel-caption">
                                <div class="container carousel-content">
                                    @if($slide->subtitle)<h4 class="text-white mb-4 animated slideInDown">{{ $slide->subtitle }}</h4>@endif
                                    <h1 class="text-white display-1 mb-4 animated slideInDown">{{ $slide->title }}</h1>
                                    @if($slide->button_text)
                                        <a href="{{ $slide->button_url ?: route('about') }}" class="me-2">
                                            <button type="button" class="px-5 py-3 btn btn-primary border-2 rounded-pill animated slideInDown">{{ $slide->button_text }}</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev btn btn-primary border border-2 border-start-0 border-primary" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next btn btn-primary border border-2 border-end-0 border-primary" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    @endif

    @php $quote = $sections->get('quote_form'); @endphp
    @if($quote?->is_visible)
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay=".3s">
            <div class="container py-5">
                <div class="bg-light px-4 py-5 rounded">
                    <div class="text-center">
                        <h1 class="display-5 mb-5">{{ $quote->title }}</h1>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif
                    <form class="text-center mb-4" action="{{ route('quote.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-xl-10 col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-xl-3">
                                        <select name="service_type" class="form-select p-3 border-0">
                                            <option value="">Type Of Service</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->full_title }}">{{ $service->full_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <input type="text" name="name" class="form-control p-3 border-0" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <input type="text" name="phone" class="form-control p-3 border-0" placeholder="Phone">
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <input type="email" name="email" class="form-control p-3 border-0" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <input type="submit" class="btn btn-primary w-100 p-3 border-0" value="GET STARTED">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @php $about = $sections->get('about'); @endphp
    @if($about?->is_visible)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-img">
                            <div class="rotate-left bg-dark"></div>
                            <div class="rotate-right bg-dark"></div>
                            <img src="{{ cms_image($about->image, 'about-img.jpg') }}" class="img-fluid h-100" alt="{{ $about->title }}">
                            <div class="bg-white experiences">
                                <h1 class="display-3">{{ $about->extra['years'] ?? '20' }}</h1>
                                <h6 class="fw-bold">Years Of Experiences</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                        <div class="about-item overflow-hidden">
                            @if($about->subtitle)
                                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $about->subtitle }}</h5>
                            @endif
                            <h1 class="display-5 mb-2">{{ $about->title }}</h1>
                            <p class="fs-5" style="text-align: justify;">{!! cms_html($about->content) !!}</p>
                            <a href="{{ $about->button_url ?: route('services') }}" class="btn btn-primary border-0 rounded-pill px-4 py-3 mt-3">{{ $about->button_text ?: 'Find Services' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @php $servicesTitle = $sections->get('services_title'); @endphp
    @if($servicesTitle?->is_visible)
        <div class="container-fluid services py-5">
            <div class="container text-center py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($servicesTitle->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $servicesTitle->subtitle }}</h5>
                    @endif
                    <h1 class="display-5">{{ $servicesTitle->title }}</h1>
                </div>
                @include('partials.services-grid', ['services' => $services])
                <a href="{{ route('services') }}" class="btn btn-primary border-0 rounded-pill px-4 py-3 mt-4 wow fadeInUp">More Services</a>
            </div>
        </div>
    @endif

    @php $portfolioTitle = $sections->get('portfolio_title'); @endphp
    @if($portfolioTitle?->is_visible)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($portfolioTitle->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $portfolioTitle->subtitle }}</h5>
                    @endif
                    <h1 class="display-5">{{ $portfolioTitle->title }}</h1>
                </div>
                @include('partials.portfolio-grid', ['projects' => $projects->take(6)])
            </div>
        </div>
    @endif

    @php $blogTitle = $sections->get('blog_title'); @endphp
    @if($blogTitle?->is_visible && $blogs->isNotEmpty())
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($blogTitle->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $blogTitle->subtitle }}</h5>
                    @endif
                    <h1 class="display-5">{{ $blogTitle->title }}</h1>
                </div>
                @include('partials.blog-carousel', ['blogs' => $blogs])
            </div>
        </div>
    @endif

    @php $cta = $sections->get('cta'); @endphp
    @if($cta?->is_visible)
        <div class="container-fluid py-5 call-to-action wow fadeInUp" data-wow-delay=".3s" style="margin: 6rem 0;">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <img src="{{ cms_image($cta->image, 'action.jpg') }}" class="img-fluid w-100 rounded-circle p-5" alt="">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="text-start mt-4">
                            <h1 class="pb-4 text-white">{{ $cta->title }}</h1>
                        </div>
                        <form method="post" action="{{ route('newsletter.store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="d-flex call-btn">
                                    <input type="email" class="form-control py-3 px-4 w-100 border-0 rounded-0 rounded-end rounded-pill" name="email" placeholder="Enter Your Email Address" required>
                                    <button type="submit" class="btn btn-primary border-0 rounded-pill rounded rounded-start px-5">{{ $cta->button_text ?: 'Subscribe' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @php $pricingTitle = $sections->get('pricing_title'); @endphp
    @if($pricingTitle?->is_visible)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($pricingTitle->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $pricingTitle->subtitle }}</h5>
                    @endif
                    <h1 class="display-5 w-50 mx-auto">{{ $pricingTitle->title }}</h1>
                </div>
                @include('partials.pricing-grid', ['pricingPlans' => $pricingPlans])
            </div>
        </div>
    @endif

    @php $teamTitle = $sections->get('team_title'); @endphp
    @if($teamTitle?->is_visible)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($teamTitle->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $teamTitle->subtitle }}</h5>
                    @endif
                    <h1 class="display-5 w-50 mx-auto">{{ $teamTitle->title }}</h1>
                </div>
                @include('partials.team-grid', ['teams' => $teams])
            </div>
        </div>
    @endif

    @php $testimonialTitle = $sections->get('testimonial_title'); @endphp
    @if($testimonialTitle?->is_visible)
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($testimonialTitle->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $testimonialTitle->subtitle }}</h5>
                    @endif
                    <h1 class="display-5 w-50 mx-auto">{{ $testimonialTitle->title }}</h1>
                </div>
                @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
            </div>
        </div>
    @endif
@endsection
