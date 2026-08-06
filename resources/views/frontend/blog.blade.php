@extends('layouts.frontend')
@section('title', $settings->site_name.' - Blog')
@section('content')
    @include('partials.page-header', ['title' => 'Blog'])
    <div class="container-fluid py-5">
        <div class="container py-5">
            @include('partials.blog-carousel', ['blogs' => $blogs])
        </div>
    </div>
@endsection
