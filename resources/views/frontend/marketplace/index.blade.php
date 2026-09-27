@extends('layouts.frontend')

@push('head')
<style>
.marketplace-page{background:#fff;color:#17233b}
.marketplace-page .mp-breadcrumb{padding:16px 0;font-size:13px;color:#7b8497}
.marketplace-page .mp-breadcrumb a{color:#7b8497}
.marketplace-page .mp-breadcrumb span{margin:0 8px;color:#b7bfce}
.marketplace-hero{position:relative;overflow:hidden;background:linear-gradient(110deg,#eef6ff 0%,#f7fbff 55%,#e7f2ff 100%);border-radius:0 0 18px 18px;padding:54px 0 58px}
.marketplace-hero:after{content:"";position:absolute;width:430px;height:430px;right:-120px;top:-170px;border-radius:50%;background:color-mix(in srgb, var(--theme) 8%, transparent)}
.mp-kicker{display:inline-block;color:var(--theme);font-size:13px;font-weight:800;letter-spacing:.6px;text-transform:uppercase;margin-bottom:12px}
.mp-title{font-size:52px;line-height:1.08;font-weight:800;max-width:560px;margin:0 0 16px;color:#12213d}
.mp-description{font-size:16px;line-height:1.75;color:#657086;max-width:590px;margin-bottom:24px}
.mp-search{display:flex;max-width:560px;background:#fff;border:1px solid #e1e7f0;border-radius:9px;box-shadow:0 10px 35px rgba(30,63,110,.08);overflow:hidden}
.mp-search input{flex:1;border:0;outline:0;padding:15px 17px;font-size:14px;color:#17233b;background:#fff}
.mp-search button{width:54px;border:0;background:var(--theme);color:#fff;font-size:16px}
.mp-hero-image{position:relative;z-index:1;min-height:360px;border-radius:14px;overflow:hidden;background:#f3f5f7;box-shadow:0 20px 45px rgba(36,75,140,.13);display:flex;align-items:center;justify-content:center}
.mp-real-hero{width:100%;height:360px;object-fit:cover;display:block}
.mp-trust{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:20px}
.mp-trust-item{font-size:14px;color:#667188;display:flex;align-items:center;gap:8px}
.mp-trust-item i{width:29px;height:29px;border-radius:50%;background:#fff;display:grid;place-items:center;color:var(--theme);box-shadow:0 4px 14px rgba(20,65,130,.08);flex:0 0 29px}
.mp-section{padding:62px 0 0}
.mp-section-head{display:flex;justify-content:space-between;align-items:end;margin-bottom:22px;gap:16px}
.mp-section-head h2{font-size:26px;line-height:1.2;margin:0;color:#17233b;font-weight:800}
.mp-section-head p{margin:6px 0 0;color:#7b8497;font-size:13px}
.mp-section-head a{font-size:15px;font-weight:700;color:var(--theme);white-space:nowrap}
.mp-category-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:12px}
.mp-category{border:1px solid #e8edf4;background:#fbfcfe;border-radius:8px;padding:18px 9px;text-align:center;transition:.25s ease}
.mp-category:hover{transform:translateY(-2px);box-shadow:0 12px 25px rgba(34,65,110,.08);background:#fff}
.mp-category .mp-cat-icon{height:58px;width:58px;padding:0;overflow:hidden;border-radius:8px;margin:0 auto 10px;display:grid;place-items:center;font-size:20px;background:#f2f3f5;color:var(--theme)}
.mp-category .mp-cat-icon img{width:100%;height:100%;object-fit:cover;display:block}
.mp-category h4{font-size:16px;margin:0 0 4px;font-weight:700;color:#27344e}
.mp-category small{font-size:13px;color:#8992a4}
.mp-products{display:grid;grid-template-columns:repeat(5,1fr);gap:14px}
.mp-product{border:1px solid #e4e9f1;border-radius:8px;overflow:hidden;background:#fff;transition:.25s ease;position:relative;box-shadow:0 2px 12px rgba(20,35,55,.05)}
.mp-product:hover{transform:translateY(-2px);box-shadow:0 14px 32px rgba(28,60,110,.1)}
.mp-product-img{height:175px;background:#f3f4f6;overflow:hidden;display:flex;align-items:center;justify-content:center}
.mp-product-img img,.mp-real-product{width:100%;height:100%;object-fit:cover;display:block}
.mp-product-body{padding:12px 12px 11px}
.mp-product-cat{font-size:14px;color:#8892a5;margin-bottom:5px}
.mp-product h3{font-size:13px;line-height:1.35;margin:0 0 8px;font-weight:700;color:#1d2b45;min-height:35px}
.mp-product h3 a,.mp-product-link,.mp-price-row .mp-price{color:inherit;text-decoration:none}
.mp-product-meta{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;font-size:14px;color:#7b8497}
.mp-price-row{border-top:1px solid #edf0f5;padding-top:10px;display:flex;justify-content:space-between;align-items:center}
.mp-price{font-size:17px;font-weight:800;color:#182642}
.mp-price s{font-size:12px;color:#9aa3b5;font-weight:600;margin-left:6px}
.mp-actions{display:flex;gap:6px}
.mp-icon-btn{width:29px;height:29px;border:1px solid #e0e6ef;background:#fff;border-radius:6px;color:#7e8799;display:grid;place-items:center}
.mp-icon-btn.cart{background:var(--theme);border-color:var(--theme);color:#fff}
.mp-seller{margin-top:62px;background:linear-gradient(100deg,#eaf4ff,#d9eaff);border-radius:10px;overflow:hidden;position:relative}
.mp-seller .row{align-items:center}
.mp-seller-copy{padding:35px 45px}
.mp-seller h2{font-size:28px;line-height:1.2;font-weight:800;margin:0 0 10px;color:#18315c}
.mp-seller p{font-size:16px;line-height:1.65;color:#66748c;max-width:520px;margin:0}
.mp-seller-actions{margin-top:18px;display:flex;gap:10px;flex-wrap:wrap}
.mp-btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;border-radius:6px;padding:11px 18px;font-size:15px;font-weight:700}
.mp-btn-primary{background:var(--theme);color:#fff}
.mp-btn-light{background:#fff;color:var(--theme);border:1px solid #d9e4fa}
.mp-seller-art{min-height:230px;padding:20px;display:flex;align-items:center;justify-content:center}
.mp-real-seller{width:100%;height:210px;object-fit:cover;border-radius:10px;display:block}
.mp-benefits{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;padding-bottom:62px}
.mp-benefit{display:flex;gap:12px;align-items:flex-start}
.mp-benefit-icon{flex:0 0 43px;width:43px;height:43px;border-radius:50%;display:grid;place-items:center;background:#edf4ff;color:var(--theme);font-size:18px}
.mp-benefit h4{font-size:18px;margin:0 0 4px;color:#27344e}
.mp-benefit p{font-size:14px;line-height:1.5;color:#8790a0;margin:0}
.mp-cta{background:linear-gradient(100deg,#172d82,#174bd2);color:#fff;padding:28px 0;margin-top:0}
.mp-cta-inner{display:flex;justify-content:space-between;align-items:center;gap:20px}
.mp-cta h2{font-size:24px;margin:0 0 4px;color:#fff}
.mp-cta p{font-size:16px;margin:0;color:#dce6ff}
.mp-cta-actions{display:flex;gap:10px;flex-wrap:wrap}
.mp-cta .mp-btn-primary{background:#fff;color:#174bd2}
.mp-cta .mp-btn-light{border-color:rgba(255,255,255,.45);background:transparent;color:#fff}
.mp-empty{grid-column:1/-1;padding:28px;text-align:center;color:#7b8497;border:1px dashed #dbe3ef;border-radius:10px}
.mp-pagination{padding:28px 0 10px}
@media(max-width:1199px){.mp-category-grid{grid-template-columns:repeat(4,1fr)}.mp-products{grid-template-columns:repeat(3,1fr)}.mp-title{font-size:44px}}
@media(max-width:767px){.marketplace-hero{padding:35px 0}.mp-title{font-size:35px}.mp-trust{grid-template-columns:1fr}.mp-section{padding-top:45px}.mp-section-head{align-items:flex-start}.mp-category-grid{grid-template-columns:repeat(2,1fr)}.mp-products{grid-template-columns:1fr 1fr}.mp-benefits{grid-template-columns:1fr 1fr}.mp-seller-copy{padding:28px}.mp-cta-inner{display:block}.mp-cta-actions{margin-top:18px}.mp-hero-image{margin-top:30px;min-height:280px}.mp-real-hero{height:280px}.mp-real-seller{height:190px}}
@media(max-width:480px){.mp-products{grid-template-columns:1fr}.mp-benefits{grid-template-columns:1fr}.mp-section-head h2{font-size:21px}}
</style>
@endpush

@section('content')
@php
    $categoryFallbacks = [
        'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=300&q=85',
        'https://images.unsplash.com/photo-1545231027-637d2f6210f8?auto=format&fit=crop&w=300&q=85',
        'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=300&q=85',
        'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=300&q=85',
        'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&w=300&q=85',
        'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=300&q=85',
        'https://images.unsplash.com/photo-1454165205744-3b78555e5572?auto=format&fit=crop&w=300&q=85',
    ];
    $trustItems = $seo->section('trust', [
        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Secure Payments', 'text' => '100% Safe & Secure'],
        ['icon' => 'fa-solid fa-download', 'title' => 'Instant Download', 'text' => 'Get Files Immediately'],
        ['icon' => 'fa-solid fa-headset', 'title' => 'Support Creators', 'text' => 'Help Independent Sellers'],
    ]);
    $benefits = $seo->section('benefits', [
        ['icon' => 'fa-solid fa-globe', 'title' => 'Wide Variety', 'text' => 'Thousands of high-quality digital products'],
        ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Trusted Sellers', 'text' => 'Verified creators and quality products'],
        ['icon' => 'fa-solid fa-bolt', 'title' => 'Instant Access', 'text' => 'Download your purchases immediately'],
        ['icon' => 'fa-solid fa-headset', 'title' => '24/7 Support', 'text' => 'We’re here to help anytime'],
    ]);
@endphp
<main class="marketplace-page">
    <section class="marketplace-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="mp-kicker">{{ $seo->section('hero_kicker', 'Digital Marketplace') }}</span>
                    <h1 class="mp-title">{!! nl2br(e($seo->section('hero_title', 'Buy & Sell Digital Products'))) !!}</h1>
                    <p class="mp-description">{{ $seo->section('hero_description', $seo->subtitle ?: $seo->meta_description ?: 'Discover high-quality digital products from talented creators around the world. Templates, courses, plugins, graphics, and more — all in one place.') }}</p>
                    <form class="mp-search" method="GET" action="{{ route('marketplace.index') }}">
                        @if($activeCategory)
                            <input type="hidden" name="category" value="{{ $activeCategory->slug }}">
                        @endif
                        <input name="q" value="{{ $search }}" placeholder="{{ $seo->section('search_placeholder', 'Search for products, creators, or categories...') }}" type="search">
                        <button aria-label="Search" type="submit"><i class="fal fa-search"></i></button>
                    </form>
                    <div class="mp-trust">
                        @foreach($trustItems as $trust)
                            <div class="mp-trust-item">
                                <i class="{{ $trust['icon'] ?? 'fa-solid fa-check' }}"></i>
                                <span><strong>{{ $trust['title'] ?? '' }}</strong><br>{{ $trust['text'] ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mp-hero-image">
                        <img class="mp-real-hero" src="{{ $seo->sectionMedia('hero_image', $seo->banner_image ? $settings->resolveBanner($seo->banner_image) : 'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1400&q=90') }}" alt="{{ $seo->section('hero_title', 'Digital marketplace workspace') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mp-section">
        <div class="container">
            <div class="mp-section-head">
                <div>
                    <h2>{{ $seo->section('categories_title', 'Shop by Category') }}</h2>
                    <p>{{ $seo->section('categories_subtitle', 'Find exactly what you’re looking for') }}</p>
                </div>
                <a href="{{ route('marketplace.index') }}">View All Categories <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="mp-category-grid">
                @forelse($categories as $index => $category)
                    <a class="mp-category" href="{{ route('marketplace.index', ['category' => $category->slug]) }}">
                        <div class="mp-cat-icon mp-cat-photo">
                            <img src="{{ $category->imageUrl($categoryFallbacks[$index % count($categoryFallbacks)]) }}" alt="{{ $category->name }}">
                        </div>
                        <h4>{{ $category->name }}</h4>
                        <small>({{ $category->products_count }} {{ Str::plural('item', $category->products_count) }})</small>
                    </a>
                @empty
                    <div class="mp-empty">No categories yet.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="mp-section" id="featured">
        <div class="container">
            <div class="mp-section-head">
                <div>
                    <h2>{{ $seo->section('featured_title', 'Featured Digital Products') }}</h2>
                    <p>{{ $seo->section('featured_subtitle', 'Handpicked products from top creators') }}</p>
                </div>
                <a href="{{ route('marketplace.index') }}#latest">View All Products <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="mp-products">
                @forelse($featured as $product)
                    @include('frontend.marketplace.partials.product-card', ['product' => $product])
                @empty
                    <div class="mp-empty">No featured products yet.</div>
                @endforelse
            </div>
            @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'leaderboard'])
        </div>
    </section>

    <section class="mp-seller">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mp-seller-copy">
                    <h2>{!! nl2br(e($seo->section('seller_title', 'Are you a creator? Turn your skills into income'))) !!}</h2>
                    <p>{{ $seo->section('seller_text', 'Join thousands of creators selling digital products. It’s free and easy to get started.') }}</p>
                    <div class="mp-seller-actions">
                        <a class="theme-btn mp-btn mp-btn-primary" href="{{ route('contact') }}">Become a Seller <i class="fa-solid fa-arrow-right"></i></a>
                        <a class="mp-btn mp-btn-light" href="{{ route('about') }}">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 mp-seller-art">
                    <img class="mp-real-seller" src="{{ $seo->sectionMedia('seller_image', 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1000&q=90') }}" alt="{{ $seo->section('seller_title', 'Creator working on digital products') }}">
                </div>
            </div>
        </div>
    </section>

    <section class="mp-section">
        <div class="container">
            <div class="mp-section-head">
                <div>
                    <h2>{{ $seo->section('why_title', 'Why Choose '.$settings->site_name.'?') }}</h2>
                    <p>{{ $seo->section('why_subtitle', 'Everything you need for a seamless digital marketplace experience') }}</p>
                </div>
            </div>
            @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
            <div class="mp-benefits">
                @foreach($benefits as $benefit)
                    <div class="mp-benefit">
                        <div class="mp-benefit-icon"><i class="{{ $benefit['icon'] ?? 'fa-solid fa-check' }}"></i></div>
                        <div>
                            <h4>{{ $benefit['title'] ?? '' }}</h4>
                            <p>{{ $benefit['text'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mp-section" id="latest">
        <div class="container">
            <div class="mp-section-head">
                <div>
                    <h2>{{ $activeCategory ? $activeCategory->name : $seo->section('latest_title', 'Latest Digital Products') }}</h2>
                    <p>
                        @if($search)
                            Results for “{{ $search }}”
                        @else
                            {{ $seo->section('latest_subtitle', 'Fresh digital products from our creator community') }}
                        @endif
                    </p>
                </div>
                <a href="{{ route('marketplace.index') }}">View All Products <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="mp-products">
                @forelse($products as $product)
                    @include('frontend.marketplace.partials.product-card', ['product' => $product])
                @empty
                    <div class="mp-empty">No products match your filters.</div>
                @endforelse
            </div>
            @if($products->hasPages())
                <div class="mp-pagination">
                    {{ $products->links() }}
                </div>
            @endif
            @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])
        </div>
    </section>

    <section class="mp-cta">
        <div class="container">
            <div class="mp-cta-inner">
                <div>
                    <h2>{{ $seo->section('cta_title', 'Start Buying or Selling Digital Products') }}</h2>
                    <p>{{ $seo->section('cta_text', 'Be part of a growing community of creators and entrepreneurs.') }}</p>
                </div>
                <div class="mp-cta-actions">
                    <a class="theme-btn mp-btn mp-btn-primary" href="{{ route('marketplace.index') }}#latest">{{ $seo->section('cta_primary_text', 'Browse Products') }}</a>
                    <a class="mp-btn mp-btn-light" href="{{ route('contact') }}">{{ $seo->section('cta_secondary_text', 'Become a Seller') }}</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
