@extends('layouts.frontend')

@php
    $seo = page_banner_seo('service_detail', [
        'title' => $service->full_title.' - '.$settings->site_name,
        'description' => \Illuminate\Support\Str::limit(strip_tags($service->description ?? ''), 160) ?: $settings->tagline,
        'keywords' => $service->full_title.', '.$settings->tagline,
    ]);
@endphp
@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', $seo['keywords'])
@section('og_title', $seo['og_title'])
@section('og_description', $seo['og_description'])

@section('content')
    @include('partials.page-header', ['bannerKey' => 'service_detail', 'title' => $service->full_title, 'parent' => ['label' => 'Services', 'route' => 'services']])
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    @if($service->image)
                        <img class="img-fluid rounded w-100" src="{{ cms_image($service->image, 'about-img.jpg') }}" alt="">
                    @else
                        <div class="bg-light rounded p-5 text-center">
                            <i class="fa {{ $service->icon ?: 'fa-spider' }} fa-5x text-primary mb-3"></i>
                            <h3>{{ $service->full_title }}</h3>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7">
                    <h1 class="display-5 mb-3">{{ $service->full_title }}</h1>
                    <p class="fs-5 text-primary">{{ $service->description }}</p>
                    <div class="mb-4">{!! $service->content ?: '<p>'.e($service->description).'</p>' !!}</div>
                    <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill px-4 py-3">Get A Quote</a>
                    <a href="{{ route('services') }}" class="btn btn-dark rounded-pill px-4 py-3 ms-2">All Services</a>
                </div>
            </div>
            @if($related->isNotEmpty())
                <div class="mt-5">
                    <h2 class="display-6 text-center mb-5">More Services</h2>
                    @include('partials.services-grid', ['services' => $related])
                </div>
            @endif
        </div>
    </div>
@endsection
