@extends('layouts.frontend')

@section('title', $service->full_title.' - '.$settings->site_name)

@section('content')
    @include('partials.page-header', [
        'title' => $service->full_title,
        'parent' => ['label' => 'Services', 'route' => 'services'],
    ])

    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row align-items-start">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    @if($service->image)
                        <img class="img-fluid w-100 rounded mb-4" src="{{ cms_image($service->image, 'about.jpg') }}" alt="{{ $service->full_title }}">
                    @else
                        <div class="service-item rounded p-5 text-center">
                            @if($service->icon)
                                <i class="fa fa-5x {{ $service->icon }} text-primary mb-4"></i>
                            @endif
                            <h3 class="text-uppercase mb-0">{{ $service->full_title }}</h3>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7">
                    <h1 class="display-4 text-uppercase mb-3">
                        {{ $service->title }}
                        @if($service->title_line2)
                            <span class="d-block text-primary">{{ $service->title_line2 }}</span>
                        @endif
                    </h1>
                    @if($service->description)
                        <h5 class="text-uppercase text-primary mb-3">{{ $service->description }}</h5>
                    @endif
                    @if($service->content)
                        <div class="mb-4">{!! $service->content !!}</div>
                    @else
                        <p class="mb-4">{{ $service->description }}</p>
                    @endif
                    <a href="{{ route('contact') }}" class="btn btn-primary text-uppercase py-3 px-5">Get A Quote</a>
                    <a href="{{ route('services') }}" class="btn btn-dark text-uppercase py-3 px-5 ml-2">All Services</a>
                </div>
            </div>
        </div>
    </div>

    @if($related->isNotEmpty())
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <h2 class="display-4 text-uppercase text-center mb-5">More Services</h2>
                @include('partials.services-grid', ['services' => $related])
            </div>
        </div>
    @endif
@endsection
