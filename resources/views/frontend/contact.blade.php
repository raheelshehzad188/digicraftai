@extends('layouts.frontend')

@section('title', $settings->site_name.' - Contact')

@section('content')
    @include('partials.page-header', ['title' => 'Contact'])

    <!-- Contact Start -->
    @include('partials.contact-section', ['section' => $section, 'showTitle' => true])
    <!-- Contact End -->
@endsection
