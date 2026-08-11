@extends('layouts.frontend')

@php
    $seo = page_banner_seo('contact', [
        'title' => trim(($settings->site_name ?? '').($settings->brand_accent ?? '')).' - Contact',
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
    @include('partials.page-header', ['bannerKey' => 'contact', 'title' => 'Contact Us', 'crumb' => 'Contact'])
    <div class="mt-5">
        @include('partials.contact-section', ['section' => $section, 'showTitle' => true])
    </div>
@endsection
