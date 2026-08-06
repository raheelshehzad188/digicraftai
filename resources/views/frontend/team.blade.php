@extends('layouts.frontend')
@section('title', $settings->site_name.' - Team')
@section('content')
    @include('partials.page-header', ['title' => $section?->title ?: 'Team'])
    <div class="container-fluid py-5">
        <div class="container py-5">
            @include('partials.team-grid', ['teams' => $teams])
        </div>
    </div>
@endsection
