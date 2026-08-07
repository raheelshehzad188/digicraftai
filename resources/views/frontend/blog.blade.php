@extends('layouts.frontend')

@php
    $seo = page_banner_seo('blog', [
        'title' => $settings->site_name.' - Blog',
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
    @include('partials.page-header', ['bannerKey' => 'blog', 'title' => 'Blog Posts'])
    <div class="container-fluid blog py-5 mb-5">
        <div class="container">
            @include('partials.blog-carousel', ['blogs' => $blogs])
        </div>
    </div>
@endsection
