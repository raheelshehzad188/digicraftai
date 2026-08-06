@extends('layouts.frontend')
@section('title', $settings->site_name.' - Pricing')
@section('content')
    @include('partials.page-header', ['title' => $section?->title ?: 'Pricing'])
    <div class="container-fluid py-5">
        <div class="container py-5">
            @include('partials.pricing-grid', ['pricingPlans' => $pricingPlans])
        </div>
    </div>
@endsection
