@extends('layouts.frontend')

@section('title', $settings->site_name.' - Prices')

@section('content')
    @include('partials.page-header', ['title' => 'Prices'])

    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">{{ $section?->title ?? 'Competitive Pricing' }}</h1>
            @include('partials.pricing-grid', ['pricingPlans' => $pricingPlans])
        </div>
    </div>
    <!-- Pricing Plan End -->
@endsection
