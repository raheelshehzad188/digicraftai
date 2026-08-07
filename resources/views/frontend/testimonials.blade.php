@extends('layouts.frontend')

@php
    $seo = page_banner_seo('testimonials', [
        'title' => $settings->site_name.' - Testimonials',
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
    @include('partials.page-header', ['bannerKey' => 'testimonials', 'title' => $section?->title ?: 'Testimonials'])
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
        </div>
    </div>
@endsection
