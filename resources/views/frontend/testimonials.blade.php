@extends('layouts.frontend')
@section('title', $settings->site_name.' - Testimonials')
@section('content')
    @include('partials.page-header', ['title' => $section?->title ?: 'Testimonials'])
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
        </div>
    </div>
@endsection
