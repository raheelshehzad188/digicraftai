@extends('layouts.frontend')
@section('title', $settings->site_name.' - Services')
@section('content')
    @include('partials.page-header', ['title' => $section?->title ?: 'Services'])
    <div class="container-fluid services py-5">
        <div class="container text-center py-5">
            @include('partials.services-grid', ['services' => $services])
        </div>
    </div>
@endsection
