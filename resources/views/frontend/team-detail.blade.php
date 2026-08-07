@extends('layouts.frontend')

@php
    $seo = page_banner_seo('team_detail', [
        'title' => $member->name.' - '.$settings->site_name,
        'description' => \Illuminate\Support\Str::limit(strip_tags($member->bio ?? $member->designation ?? ''), 160) ?: $settings->tagline,
        'keywords' => $member->name.', '.($member->designation ?? '').', '.$settings->tagline,
    ]);
@endphp
@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('meta_keywords', $seo['keywords'])
@section('og_title', $seo['og_title'])
@section('og_description', $seo['og_description'])

@section('content')
    @include('partials.page-header', ['bannerKey' => 'team_detail', 'title' => $member->name, 'parent' => ['label' => 'Team', 'route' => 'team']])
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded w-100" src="{{ cms_image($member->image, 'team-1.jpg') }}" alt="{{ $member->name }}">
                </div>
                <div class="col-lg-7">
                    <h1 class="display-5 mb-2">{{ $member->name }}</h1>
                    <h4 class="text-primary mb-4">{{ $member->designation }}</h4>
                    <p class="fs-5">{{ $member->bio }}</p>
                    <div class="mb-4">{!! $member->content !!}</div>
                    <div class="mb-4">
                        @if($member->facebook)<a class="btn btn-primary btn-square me-2" href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                        @if($member->twitter)<a class="btn btn-primary btn-square me-2" href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                        @if($member->linkedin)<a class="btn btn-primary btn-square me-2" href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                        @if($member->instagram)<a class="btn btn-primary btn-square" href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                    </div>
                    <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill px-4 py-3">Contact Us</a>
                    <a href="{{ route('team') }}" class="btn btn-dark rounded-pill px-4 py-3 ms-2">All Team</a>
                </div>
            </div>
            @if($related->isNotEmpty())
                <div class="mt-5">
                    <h2 class="display-6 text-center mb-5">Other Members</h2>
                    @include('partials.team-grid', ['teams' => $related])
                </div>
            @endif
        </div>
    </div>
@endsection
