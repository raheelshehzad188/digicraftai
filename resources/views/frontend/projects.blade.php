@extends('layouts.frontend')
@section('title', $settings->site_name.' - Projects')
@section('content')
    @include('partials.page-header', ['title' => $section?->title ?: 'Projects'])
    <div class="container-fluid py-5">
        <div class="container py-5">
            @include('partials.portfolio-grid', ['projects' => $projects])
        </div>
    </div>
@endsection
