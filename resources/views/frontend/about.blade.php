@extends('layouts.frontend')

@section('title', $settings->site_name.' - About')

@section('content')
    @include('partials.page-header', ['title' => 'About'])

    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid mb-4 mb-lg-0" src="{{ cms_image($section?->image, 'about.jpg') }}" alt="{{ $section?->title ?? 'About' }}">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-4 text-uppercase mb-4">{{ $section?->title ?? 'Best digital agency in downtown' }}</h1>
                    @if($section?->subtitle)
                        <h5 class="text-uppercase text-primary mb-3">{{ $section->subtitle }}</h5>
                    @endif
                    <p class="mb-4">{!! nl2br(e($section?->content)) !!}</p>
                    @if($section?->button_text)
                        <a href="{{ $section->button_url ?: route('contact') }}" class="btn btn-primary text-uppercase py-3 px-5">{{ $section->button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- About Info Start -->
    <div class="container-fluid py-5">
        <div class="container pb-3">
            <div class="row">
                @if($settings->address)
                    <div class="col-lg-4 mb-2">
                        <div class="d-flex align-items-center bg-light rounded mb-4 px-5" style="height: 150px;">
                            <i class="fa fa-3x fa-map-marker-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h5 class="text-uppercase">Our Office</h5>
                                <p class="m-0">{{ $settings->address }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($settings->email)
                    <div class="col-lg-4 mb-2">
                        <div class="d-flex align-items-center bg-light rounded mb-4 px-5" style="height: 150px;">
                            <i class="fa fa-3x fa-envelope-open text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h5 class="text-uppercase">Email Us</h5>
                                <p class="m-0">{{ $settings->email }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($settings->phone)
                    <div class="col-lg-4 mb-2">
                        <div class="d-flex align-items-center bg-light rounded mb-4 px-5" style="height: 150px;">
                            <i class="fas fa-3x fa-phone-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h5 class="text-uppercase">Call Us</h5>
                                <p class="m-0">{{ $settings->phone }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- About Info End -->
@endsection
