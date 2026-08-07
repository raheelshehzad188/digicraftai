@extends('layouts.frontend')

@php
    $seo = page_banner_seo('projects', [
        'title' => $settings->site_name.' - Projects',
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
    @include('partials.page-header', ['bannerKey' => 'projects', 'title' => $section?->title ?: 'Projects'])
    <div class="container-fluid py-5">
        <div class="container py-5">
            @include('partials.portfolio-grid', ['projects' => $projects])
        </div>
    </div>
@endsection
