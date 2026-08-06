@extends('layouts.frontend')

@section('title', $settings->site_name.' - '.($bannerTitle ?? 'About'))

@section('content')
    @include('partials.page-header', ['title' => $bannerTitle ?? 'About'])

    {{-- About main section --}}
    @if($section?->is_visible ?? true)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-img">
                            <div class="rotate-left bg-dark"></div>
                            <div class="rotate-right bg-dark"></div>
                            <img src="{{ cms_image($section?->image, 'about-img.jpg') }}" class="img-fluid h-100" alt="{{ $section?->title }}">
                            <div class="bg-white experiences">
                                <h1 class="display-3">{{ $section?->extra['years'] ?? '20' }}</h1>
                                <h6 class="fw-bold">{{ $section?->extra['years_label'] ?? 'Years Of Experiences' }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                        <div class="about-item overflow-hidden">
                            @if($section?->subtitle)
                                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $section->subtitle }}</h5>
                            @endif
                            @if($section?->title)
                                <h1 class="display-5 mb-2">{{ $section->title }}</h1>
                            @endif
                            <div class="fs-5 cms-html" style="text-align: justify;">
                                {!! cms_html($section?->content) !!}
                            </div>

                            @php $features = $section?->extra['features'] ?? []; @endphp
                            @if(!empty($features))
                                <div class="row mt-4">
                                    @foreach($features as $feature)
                                        <div class="col-6 col-md-3">
                                            <div class="text-center">
                                                <div class="p-4 bg-dark rounded d-flex" style="align-items: center; justify-content: center;">
                                                    <i class="fas {{ $feature['icon'] ?? 'fa-city' }} fa-4x text-primary"></i>
                                                </div>
                                                <div class="my-2">
                                                    @if(!empty($feature['line1']))<h5>{{ $feature['line1'] }}</h5>@endif
                                                    @if(!empty($feature['line2']))<h5>{{ $feature['line2'] }}</h5>@endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if($section?->button_text)
                                <a href="{{ $section->button_url ?: route('services') }}" class="btn btn-primary border-0 rounded-pill px-4 py-3 mt-5">{{ $section->button_text }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- CTA / Newsletter --}}
    @if(($section?->extra['show_cta'] ?? true) && $cta)
        <div class="container-fluid py-5 call-to-action wow fadeInUp" data-wow-delay=".3s" style="margin: 6rem 0;">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <img src="{{ cms_image($cta->image, 'action.jpg') }}" class="img-fluid w-100 rounded-circle p-5" alt="">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="text-start mt-4">
                            <h1 class="pb-4 text-white">{{ $cta->title }}</h1>
                            @if($cta->content)
                                <div class="text-white mb-3">{!! cms_html($cta->content) !!}</div>
                            @endif
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

    {{-- Team --}}
    @if(($section?->extra['show_team'] ?? true) && $teams->isNotEmpty())
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($teamSection?->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $teamSection->subtitle }}</h5>
                    @endif
                    <h1 class="display-5 w-50 mx-auto">{{ $teamSection?->title ?? 'Our Team Members' }}</h1>
                </div>
                @include('partials.team-grid', ['teams' => $teams])
            </div>
        </div>
    @endif

    {{-- Testimonials --}}
    @if(($section?->extra['show_testimonials'] ?? true) && $testimonials->isNotEmpty())
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    @if($testimonialSection?->subtitle)
                        <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">{{ $testimonialSection->subtitle }}</h5>
                    @endif
                    <h1 class="display-5 w-50 mx-auto">{{ $testimonialSection?->title ?? 'What Clients Say' }}</h1>
                </div>
                @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
            </div>
        </div>
    @endif
@endsection
