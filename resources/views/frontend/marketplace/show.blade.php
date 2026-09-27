@extends('layouts.frontend')

@push('head')
<style>
.project-zen-image{display:block;width:100%;height:auto;object-fit:cover;border-radius:10px}
.project-details-items .details-image img{width:100%;max-height:520px;object-fit:cover;border-radius:10px}
.project-details-items .thumb img{width:100%;height:300px;object-fit:cover;border-radius:10px}
.preview-item img{width:170px;height:105px;object-fit:cover;border-radius:8px}
.project-catagory .theme-btn{margin-top:18px;display:inline-flex}
.preview-item a{color:inherit}
@media(max-width:767px){.project-details-items .thumb img{height:220px}.preview-item img{width:130px;height:85px}}
</style>
@endpush

@section('content')
@php
    $gallery = collect($product->gallery ?? [])
        ->filter()
        ->map(fn ($image) => $product->mediaUrl($image))
        ->values();
    $heroImage = $product->banner_image
        ? $product->mediaUrl($product->banner_image)
        : $product->imageUrl();
    $shareUrl = url()->current();
    $features = $product->featureList();
@endphp
@include('frontend.partials.breadcrumb', [
    'title' => $product->title,
    'banner_image' => $product->banner_image ?? null,
    'crumbs' => [
        ['label' => 'Marketplace', 'url' => route('marketplace.index')],
    ],
])

<section class="Project-details-section fix section-padding">
    <div class="container">
        <div class="project-details-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-items">
                        <div class="details-image">
                            <img class="project-zen-image" src="{{ $heroImage }}" alt="{{ $product->title }}">
                        </div>
                        <div class="row g-4 justify-content-between">
                            <div class="col-lg-7">
                                <div class="details-content pt-5">
                                    @if($product->category)
                                        <span class="subtitle" style="color:var(--theme);">{{ $product->category->name }}</span>
                                    @endif
                                    <h3>{{ $product->title }}</h3>
                                    @if($product->short_description)
                                        <p>{{ $product->short_description }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="project-catagory">
                                    <h3>Project Info: </h3>
                                    <ul>
                                        @if($product->category)
                                            <li>
                                                Category:
                                                <span>{{ $product->category->name }}</span>
                                            </li>
                                        @endif
                                        @if($product->sku)
                                            <li>
                                                SKU:
                                                <span>{{ $product->sku }}</span>
                                            </li>
                                        @endif
                                        <li>
                                            Price:
                                            <span>
                                                {{ $product->displayPrice() }}
                                                @if($product->price_suffix)
                                                    {{ $product->price_suffix }}
                                                @endif
                                                @if($product->regularPrice())
                                                    <s>{{ $product->regularPrice() }}</s>
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            Share:
                                            <span>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f me-3"></i></a>
                                                @if($settings->instagram)
                                                    <a href="{{ $settings->instagram }}" target="_blank" rel="noopener"><i class="fa-brands fa-instagram me-3"></i></a>
                                                @endif
                                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a>
                                            </span>
                                        </li>
                                    </ul>
                                    <a href="{{ route('quote') }}" class="theme-btn">
                                        Get A Quote <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                    @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
                                </div>
                            </div>
                        </div>

                        @if($product->description)
                            <div class="details-content pt-3">
                                <h3>Product Details</h3>
                                <div class="cms-page-content">{!! $product->description !!}</div>
                            </div>
                        @endif

                        @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'rectangle'])

                        @if(count($features))
                            <div class="row g-4 pt-5">
                                @foreach(collect($features)->chunk(2) as $chunk)
                                    <div class="col-lg-3 col-md-6">
                                        <ul class="list">
                                            @foreach($chunk as $feature)
                                                <li>
                                                    <i class="fa-regular fa-circle-check"></i>
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($gallery->count())
                            <div class="row g-4 pt-5">
                                @foreach($gallery->take(2) as $image)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="thumb">
                                            <img src="{{ $image }}" alt="{{ $product->title }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])

                    @if($previous || $next)
                        <div class="preview-area">
                            @if($previous)
                                <a class="preview-item" href="{{ route('marketplace.show', $previous) }}">
                                    <img src="{{ $previous->imageUrl() }}" alt="{{ $previous->title }}">
                                    <div class="content">
                                        <h3>Preview</h3>
                                        <p>{{ $previous->title }}</p>
                                    </div>
                                </a>
                            @else
                                <div></div>
                            @endif
                            @if($next)
                                <a class="preview-item" href="{{ route('marketplace.show', $next) }}">
                                    <div class="content text-right">
                                        <h3>Next</h3>
                                        <p>{{ $next->title }}</p>
                                    </div>
                                    <img src="{{ $next->imageUrl() }}" alt="{{ $next->title }}">
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
