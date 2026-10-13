@extends('layouts.frontend')

@section('content')
@php
    $gallery = collect($product->gallery ?? [])
        ->filter()
        ->map(fn ($image) => $product->mediaUrl($image))
        ->values();
    $heroImage = $product->banner_image
        ? $product->mediaUrl($product->banner_image)
        : $product->imageUrl();
    $thumbs = collect([$heroImage])->merge($gallery)->filter()->unique()->values();
    $shareUrl = url()->current();
    $features = $product->featureList();
    $regular = $product->regularPrice();
    $discount = null;
    if ($regular && (float) $product->price > 0 && (float) $product->sale_price > 0) {
        $discount = (int) round((((float) $product->price - (float) $product->sale_price) / (float) $product->price) * 100);
    }
    $hasDescription = filled(trim(strip_tags((string) $product->description)));
@endphp
<main class="software-details-page marketplace-detail-page">
    <div class="zv-detail-top">
        <nav class="zv-breadcrumb" aria-label="Breadcrumb">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('marketplace.index') }}">Marketplace</a></li>
                    @if($product->category)
                        <li>
                            <a href="{{ route('marketplace.index', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                        </li>
                    @endif
                    <li><span aria-current="page">{{ $product->title }}</span></li>
                </ol>
            </div>
        </nav>

        <section class="container" aria-labelledby="zv-product-title">
            <div class="zv-overview">
                <div class="zv-gallery {{ $thumbs->count() > 1 ? '' : 'is-single' }}" data-zv-gallery>
                    @if($thumbs->count() > 1)
                        <ul class="zv-thumbs" aria-label="Product images">
                            @foreach($thumbs->take(6) as $i => $thumb)
                                <li>
                                    <button
                                        type="button"
                                        class="zv-thumb {{ $i === 0 ? 'is-active' : '' }}"
                                        data-image="{{ $thumb }}"
                                        data-alt="{{ $product->title }}"
                                        aria-label="Show image {{ $i + 1 }}"
                                        aria-pressed="{{ $i === 0 ? 'true' : 'false' }}"
                                    >
                                        <img src="{{ $thumb }}" alt="">
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="zv-main-image">
                        <img id="zv-main-image" src="{{ $heroImage }}" alt="{{ $product->title }}" width="480" height="600">
                    </div>
                </div>

                <div class="zv-product-info">
                    @if($product->is_featured)
                        <span class="zv-badge">Featured</span>
                    @elseif($product->category)
                        <span class="zv-badge">{{ $product->category->name }}</span>
                    @endif
                    <h1 id="zv-product-title">{{ $product->title }}</h1>
                    @if($product->short_description)
                        <p class="zv-subtitle">{{ $product->short_description }}</p>
                    @endif
                    <div class="zv-tag-rows">
                        <div class="zv-tags">
                            @if($product->category)
                                <span class="zv-tag">{{ $product->category->name }}</span>
                            @endif
                            @if($product->sku)
                                <span class="zv-tag">SKU: {{ $product->sku }}</span>
                            @endif
                        </div>
                    </div>
                    @if($product->short_description === null && $hasDescription)
                        <p class="zv-desc">{!! \Illuminate\Support\Str::limit(strip_tags($product->description), 220) !!}</p>
                    @endif
                </div>

                <aside class="zv-buy" aria-label="Purchase options">
                    <div class="zv-buy-main">
                        <div class="zv-price-row">
                            <span class="zv-price">{{ $product->displayPrice() }}</span>
                            @if($product->price_suffix)
                                <span style="font-size:14px;color:var(--zv-muted);font-weight:600;">{{ $product->price_suffix }}</span>
                            @endif
                            @if($regular)
                                <s class="zv-price-old"><span class="zv-sr-only">Original price </span>{{ $regular }}</s>
                            @endif
                            @if($discount)
                                <span class="zv-off">{{ $discount }}% OFF</span>
                            @endif
                        </div>

                        <ul class="zv-meta-list">
                            @if($product->category)
                                <li><span>Category</span><b>{{ $product->category->name }}</b></li>
                            @endif
                            @if($product->sku)
                                <li><span>SKU</span><b>{{ $product->sku }}</b></li>
                            @endif
                        </ul>

                        <a href="{{ route('quote') }}" class="zv-btn zv-btn-primary">
                            Get A Quote <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('marketplace.index') }}" class="zv-btn zv-btn-ghost">
                            <i class="fas fa-store"></i> Browse Marketplace
                        </a>

                        <div class="zv-share-row">
                            <span>Share:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                            @if($settings->instagram)
                                <a href="{{ $settings->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            @endif
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <ul class="zv-benefits">
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-comments"></i></span>
                            <div><strong>Free Consultation</strong><span>Talk with our team first</span></div>
                        </li>
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-shield-alt"></i></span>
                            <div><strong>Secure Process</strong><span>Your project stays protected</span></div>
                        </li>
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-headset"></i></span>
                            <div><strong>Dedicated Support</strong><span>Help when you need it</span></div>
                        </li>
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-redo"></i></span>
                            <div><strong>Custom Delivery</strong><span>Built around your goals</span></div>
                        </li>
                    </ul>
                    @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
                </aside>
            </div>
        </section>
    </div>

    <div class="zv-tabs-bar">
        <div class="container">
            <div class="zv-tabs" role="tablist" aria-label="Product information">
                <button type="button" class="zv-tab is-active" role="tab" id="tab-overview" aria-controls="panel-overview" aria-selected="true">Overview</button>
                @if(count($features))
                    <button type="button" class="zv-tab" role="tab" id="tab-features" aria-controls="panel-features" aria-selected="false" tabindex="-1">Features</button>
                @endif
                @if($gallery->count())
                    <button type="button" class="zv-tab" role="tab" id="tab-screenshots" aria-controls="panel-screenshots" aria-selected="false" tabindex="-1">Gallery</button>
                @endif
            </div>
        </div>
    </div>

    <div class="container zv-panels">
        <section class="zv-panel" role="tabpanel" id="panel-overview" aria-labelledby="tab-overview" tabindex="0">
            <div class="zv-overview-panel">
                <div>
                    <div class="zv-copy">
                        <h2 class="zv-section-title">Product Details</h2>
                        @if($hasDescription)
                            <div class="cms-page-content">{!! $product->description !!}</div>
                        @elseif($product->short_description)
                            <p>{{ $product->short_description }}</p>
                        @else
                            <p>Contact us for a custom quote on {{ $product->title }}.</p>
                        @endif
                    </div>
                    @if(count($features))
                        <div class="zv-key-features">
                            <h2 class="zv-section-title">Key Features</h2>
                            <ul class="zv-features">
                                @foreach(collect($features)->take(6) as $feature)
                                    <li>
                                        <span class="zv-feature-icon"><i class="fas fa-check"></i></span>
                                        <div><strong>{{ $feature }}</strong><span>Included with this package</span></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <aside class="zv-info-card" aria-label="Project info">
                    <h3>Project Info</h3>
                    <dl>
                        @if($product->category)
                            <dt>Category</dt><dd>{{ $product->category->name }}</dd>
                        @endif
                        @if($product->sku)
                            <dt>SKU</dt><dd>{{ $product->sku }}</dd>
                        @endif
                        <dt>Price</dt>
                        <dd>
                            {{ $product->displayPrice() }}
                            @if($product->price_suffix) {{ $product->price_suffix }} @endif
                            @if($regular) <s>{{ $regular }}</s> @endif
                        </dd>
                    </dl>
                </aside>
            </div>
            @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'rectangle'])
        </section>

        @if(count($features))
            <section class="zv-panel" role="tabpanel" id="panel-features" aria-labelledby="tab-features" tabindex="0" hidden>
                <h2 class="zv-section-title">Everything included</h2>
                <ul class="zv-feature-list">
                    @foreach($features as $feature)
                        <li><i class="fas fa-check-circle"></i><span>{{ $feature }}</span></li>
                    @endforeach
                </ul>
            </section>
        @endif

        @if($gallery->count())
            <section class="zv-panel" role="tabpanel" id="panel-screenshots" aria-labelledby="tab-screenshots" tabindex="0" hidden>
                <div class="zv-shot-grid-lg">
                    @foreach($gallery as $image)
                        <figure>
                            <img src="{{ $image }}" alt="{{ $product->title }}" loading="lazy">
                        </figure>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

    @if($gallery->count())
        <section class="zv-block" aria-labelledby="zv-shots-title">
            <div class="container">
                <div class="zv-block-head">
                    <h2 id="zv-shots-title">Gallery</h2>
                    <button type="button" class="zv-link" data-open-tab="screenshots" style="background:none;border:0;padding:0;cursor:pointer;">
                        View All <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <div class="zv-shots">
                    @foreach($gallery->take(4) as $image)
                        <a class="zv-shot popup-image" href="{{ $image }}" title="{{ $product->title }}">
                            <img src="{{ $image }}" alt="{{ $product->title }}" loading="lazy">
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(isset($related) && $related->isNotEmpty())
        <section class="zv-block zv-related-wrap" aria-labelledby="zv-related-title">
            <div class="container">
                <div class="zv-block-head">
                    <h2 id="zv-related-title">You May Also Like</h2>
                    <a href="{{ route('marketplace.index') }}" class="zv-link">View All Products <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="zv-related">
                    @foreach($related as $rel)
                        @php
                            $relRegular = $rel->regularPrice();
                            $relOff = null;
                            if ($relRegular && (float) $rel->price > 0 && (float) $rel->sale_price > 0) {
                                $relOff = (int) round((((float) $rel->price - (float) $rel->sale_price) / (float) $rel->price) * 100);
                            }
                        @endphp
                        <a href="{{ route('marketplace.show', $rel) }}" class="zv-rel">
                            <div class="zv-rel-head">
                                <img src="{{ $rel->imageUrl() }}" alt="" width="48" height="48">
                                <div>
                                    <strong>{{ $rel->title }}</strong>
                                    <small>{{ $rel->category?->name ?? 'Marketplace' }}</small>
                                </div>
                            </div>
                            <div class="zv-rel-price">
                                <b>{{ $rel->displayPrice() }}</b>
                                @if($relRegular)<s>{{ $relRegular }}</s>@endif
                                @if($relOff)<span class="zv-off">{{ $relOff }}% OFF</span>@endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])

    @if($previous || $next)
        <div class="container">
            <div class="zv-nav-prevnext">
                @if($previous)
                    <a class="zv-nav-item" href="{{ route('marketplace.show', $previous) }}">
                        <img src="{{ $previous->imageUrl() }}" alt="{{ $previous->title }}">
                        <div>
                            <strong>Previous</strong>
                            <span>{{ $previous->title }}</span>
                        </div>
                    </a>
                @else
                    <div></div>
                @endif
                @if($next)
                    <a class="zv-nav-item is-next" href="{{ route('marketplace.show', $next) }}">
                        <div>
                            <strong>Next</strong>
                            <span>{{ $next->title }}</span>
                        </div>
                        <img src="{{ $next->imageUrl() }}" alt="{{ $next->title }}">
                    </a>
                @endif
            </div>
        </div>
    @endif
</main>
@endsection

@push('scripts')
<script>
(function () {
    var gallery = document.querySelector('[data-zv-gallery]');
    if (gallery) {
        var main = document.getElementById('zv-main-image');
        gallery.querySelectorAll('.zv-thumb[data-image]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                if (!main) return;
                main.src = btn.getAttribute('data-image');
                main.alt = btn.getAttribute('data-alt') || main.alt;
                gallery.querySelectorAll('.zv-thumb').forEach(function (el) {
                    el.classList.toggle('is-active', el === btn);
                    el.setAttribute('aria-pressed', el === btn ? 'true' : 'false');
                });
            });
        });
    }

    var tabs = Array.prototype.slice.call(document.querySelectorAll('.software-details-page .zv-tab[role="tab"]'));
    var panels = Array.prototype.slice.call(document.querySelectorAll('.software-details-page .zv-panel[role="tabpanel"]'));
    function activate(id) {
        tabs.forEach(function (tab) {
            var on = tab.getAttribute('aria-controls') === id;
            tab.setAttribute('aria-selected', on ? 'true' : 'false');
            tab.tabIndex = on ? 0 : -1;
            tab.classList.toggle('is-active', on);
        });
        panels.forEach(function (panel) {
            panel.hidden = panel.id !== id;
        });
    }
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            activate(tab.getAttribute('aria-controls'));
        });
    });
    document.querySelectorAll('[data-open-tab]').forEach(function (el) {
        el.addEventListener('click', function () {
            var key = el.getAttribute('data-open-tab');
            var panel = document.getElementById('panel-' + key);
            if (panel) {
                activate(panel.id);
                panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
})();
</script>
@endpush
