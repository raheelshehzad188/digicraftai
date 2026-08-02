@extends('layouts.frontend')

@section('title', $settings->site_name.' - Team')

@section('content')
    @include('partials.page-header', ['title' => 'Team'])

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-4 text-uppercase text-center mb-5">{{ $section?->title ?? 'Meet Our Team' }}</h1>
            @include('partials.team-carousel', ['teams' => $teams])
        </div>
    </div>
    <!-- Team End -->
@endsection
