@extends('layouts.frontend')

@section('title', $settings->site_name.' - Testimonials')

@section('content')
    @include('partials.page-header', ['title' => 'Testimonial'])

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-4 text-uppercase text-center mb-5">{{ $section?->title ?? "Our Client's Say" }}</h1>
            @include('partials.testimonial-carousel', ['testimonials' => $testimonials])
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
