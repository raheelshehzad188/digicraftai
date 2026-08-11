@extends('layouts.frontend')

@php
    $seo = page_banner_seo('blog', [
        'title' => trim(($settings->site_name ?? '').($settings->brand_accent ?? '')).' - Blog',
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
    @include('partials.page-header', ['bannerKey' => 'blog', 'title' => 'Our Blog', 'crumb' => 'Blog'])
    <div class="container-fluid blog py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Blog</h5>
                <h1>Latest Blog & News</h1>
            </div>
            @include('partials.blog-carousel', ['blogs' => $blogs])
        </div>
    </div>
@endsection
