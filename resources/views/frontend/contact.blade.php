@extends('layouts.frontend')

@php
    $seo = page_banner_seo('contact', [
        'title' => $settings->site_name.' - Contact',
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
    @include('partials.page-header', ['bannerKey' => 'contact', 'title' => 'Contact'])
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Get In Touch</h5>
                <h1 class="display-5 w-50 mx-auto">{{ $section?->title ?: 'Contact for any query' }}</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="h-100">
                        <iframe src="{{ $settings->map_embed_url }}" class="border-0 rounded w-100 h-100" style="min-height:450px" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="rounded contact-form">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control p-3" placeholder="Your Name" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control p-3" placeholder="Your Email" required>
                        </div>
                        <div class="mb-4">
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control p-3" placeholder="Subject" required>
                        </div>
                        <div class="mb-4">
                            <textarea name="message" class="w-100 form-control p-3" rows="6" placeholder="Message" required>{{ old('message') }}</textarea>
                        </div>
                        <button class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay=".3s">
                @if($settings->address)
                    <div class="col-lg-4">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3" style="width:64px;height:64px">
                                <i class="fas fa-map-marker-alt text-dark"></i>
                            </div>
                            <div class="ms-3"><h4>Address</h4><p class="mb-0">{{ $settings->address }}</p></div>
                        </div>
                    </div>
                @endif
                @if($settings->phone)
                    <div class="col-lg-4">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3" style="width:64px;height:64px">
                                <i class="fa fa-phone text-dark"></i>
                            </div>
                            <div class="ms-3"><h4>Call Us</h4><a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></div>
                        </div>
                    </div>
                @endif
                @if($settings->email)
                    <div class="col-lg-4">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3" style="width:64px;height:64px">
                                <i class="fa fa-envelope text-dark"></i>
                            </div>
                            <div class="ms-3"><h4>Email Us</h4><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
