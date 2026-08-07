@extends('layouts.frontend')

@php
    $seo = page_banner_seo('services', [
        'title' => $settings->site_name.' - Services',
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
    @include('partials.page-header', ['bannerKey' => 'services', 'title' => $section?->title ?: 'Services'])
    <div class="container-fluid services py-5">
        <div class="container text-center py-5">
            @include('partials.services-grid', ['services' => $services])
        </div>
    </div>
@endsection
