@extends('layouts.frontend')

@php
    $seo = page_banner_seo('contact', [
        'title' => $settings->site_name.' - Contact',
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
    @include('partials.page-header', ['bannerKey' => 'contact', 'title' => 'Contact'])
    @include('partials.contact-section', ['section' => $section, 'showTitle' => true])
@endsection
