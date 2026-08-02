@extends('layouts.frontend')

@section('title', $page->meta_title ?: ($settings->site_name.' - '.$page->title))
@section('meta_description', $page->meta_description)

@section('content')
    @include('partials.page-header', ['title' => $page->banner_title ?: $page->title])

    @if($page->content)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($page->sections as $section)
        <div class="container-fluid py-5">
            <div class="container py-5">
                @if($section->title)
                    <h2 class="display-4 text-uppercase text-center mb-5">{{ $section->title }}</h2>
                @endif
                <div class="row align-items-center">
                    @if($section->image)
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img class="img-fluid" src="{{ cms_image($section->image, 'about.jpg') }}" alt="{{ $section->title }}">
                        </div>
                        <div class="col-lg-6">
                            {!! $section->content !!}
                        </div>
                    @else
                        <div class="col-12">
                            {!! $section->content !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection
