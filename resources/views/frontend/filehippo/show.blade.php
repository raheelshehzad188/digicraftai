@extends('layouts.frontend')

@section('content')
@php
    $licenseClass = match ($item->license) {
        'paid' => 'is-paid',
        'freemium' => 'is-freemium',
        default => 'is-free',
    };
    $licenseLabel = $item->licenseLabel();
    $category = $item->categories->first();
    $categorySlug = $category?->slug ?? 'windows';
    $categoryLabel = $category?->name ?? 'Software';
    $platforms = $item->platformList();
    $platform = $platforms[0] ?? 'Windows';
    $overview = $item->overviewParagraphs();
    $features = $item->key_features ?: [];
    $versions = $item->versions ?: [];
    $faqs = $item->faqs ?: [];
    $tags = $item->tagList();
    $designLogo = \App\Support\SoftwareDesignAssets::logoFor($item);
    $mockShots = $item->show_mock_screenshots ? \App\Support\SoftwareDesignAssets::mockScreenshots() : [];
    $heroImage = $item->image
        ? $item->imageUrl()
        : ($designLogo ?: ($item->show_mock_screenshots ? \App\Support\SoftwareDesignAssets::url('photoshop-cover.svg') : null));
    $galleryThumbs = collect();
    if ($heroImage) {
        $galleryThumbs->push(['src' => $heroImage, 'alt' => $item->name]);
    }
    foreach (array_slice($mockShots, 0, 4) as $shot) {
        if ($heroImage && $shot['src'] === $heroImage) {
            continue;
        }
        $galleryThumbs->push(['src' => $shot['src'], 'alt' => $shot['alt']]);
    }
    $galleryThumbs = $galleryThumbs->unique('src')->take(5)->values();
    $downloadUrl = $item->downloadUrl();
@endphp
<main class="software-details-page software-detail-page">
    <div class="zv-detail-top">
        <nav class="zv-breadcrumb" aria-label="Breadcrumb">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('filehippo.index') }}">Software</a></li>
                    <li><a href="{{ route('filehippo.index', ['category' => $categorySlug]) }}">{{ $categoryLabel }}</a></li>
                    <li><span aria-current="page">{{ $item->name }}</span></li>
                </ol>
            </div>
        </nav>

        <section class="container" aria-labelledby="zv-product-title">
            <div class="zv-overview">
                <div class="zv-gallery {{ $galleryThumbs->count() > 1 ? '' : 'is-single' }}" @if($galleryThumbs->count() > 1) data-zv-gallery @endif>
                    @if($galleryThumbs->count() > 1)
                        <ul class="zv-thumbs" aria-label="Product images">
                            @foreach($galleryThumbs as $i => $thumb)
                                <li>
                                    <button
                                        type="button"
                                        class="zv-thumb {{ $i === 0 ? 'is-active' : '' }}"
                                        data-image="{{ $thumb['src'] }}"
                                        data-alt="{{ $thumb['alt'] }}"
                                        aria-label="Show image {{ $i + 1 }}"
                                        aria-pressed="{{ $i === 0 ? 'true' : 'false' }}"
                                    >
                                        <img src="{{ $thumb['src'] }}" alt="">
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="zv-main-image">
                        @if($heroImage)
                            <img id="zv-main-image" src="{{ $heroImage }}" alt="{{ $item->name }}" width="480" height="600">
                        @else
                            <div class="zv-app-fallback {{ $item->icon_class }}" aria-label="{{ $item->name }} logo">
                                @if($item->icon)
                                    <i class="{{ $item->icon }}"></i>
                                @else
                                    {{ $item->icon_text }}
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="zv-product-info">
                    <span class="zv-badge">{{ $licenseLabel }}</span>
                    <h1 id="zv-product-title">{{ $item->name }}</h1>
                    @if($item->version)
                        <p class="zv-subtitle">{{ $item->version }} <span style="color:var(--zv-muted);">(Latest Version)</span></p>
                    @endif
                    <div class="zv-rating-row">
                        <span class="zv-stars" aria-hidden="true">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </span>
                        <span><b>{{ $item->rating }}</b> ({{ $item->votes }} reviews)</span>
                        <span class="zv-sep" aria-hidden="true"></span>
                        <span><i class="fas fa-download"></i> {{ $item->downloads }} downloads</span>
                    </div>
                    @if($item->publisher)
                        <div class="zv-publisher-row">
                            @if(str_contains(strtolower((string) $item->publisher), 'adobe'))
                                <img src="{{ \App\Support\SoftwareDesignAssets::adobeMark() }}" alt="" width="22" height="19">
                            @endif
                            <span>By <a href="#publisher">{{ $item->publisher }}</a></span>
                            <span class="zv-verified"><i class="fas fa-check-circle"></i> Verified Publisher</span>
                        </div>
                    @endif
                    <div class="zv-tag-rows">
                        <div class="zv-tags">
                            @foreach($tags as $tag)
                                <span class="zv-tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <div class="zv-tags">
                            @foreach($platforms as $os)
                                <span class="zv-tag">{{ $os }}</span>
                            @endforeach
                            <span class="zv-tag {{ $licenseClass }}">{{ $licenseLabel }}</span>
                        </div>
                    </div>
                    @if($item->description)
                        <p class="zv-desc">{{ $item->description }}</p>
                    @endif
                </div>

                <aside class="zv-buy" aria-label="Download options">
                    <div class="zv-buy-main">
                        <div class="zv-price-row">
                            <span class="zv-price">{{ $licenseLabel === 'Free' ? 'Free' : $licenseLabel }}</span>
                            @if($item->file_size)
                                <span style="font-size:14px;color:var(--zv-muted);font-weight:600;">{{ $item->file_size }}</span>
                            @endif
                        </div>

                        @if($downloadUrl)
                            <a
                                class="zv-btn zv-btn-primary"
                                href="{{ $downloadUrl }}"
                                @if($item->isLocalDownload()) download @else target="_blank" rel="noopener" @endif
                            >
                                <i class="fas fa-download"></i> Download for {{ $platform }}
                            </a>
                        @endif
                        @if(count($versions))
                            <a class="zv-btn zv-btn-ghost" href="#panel-versions" data-open-tab="versions">
                                Other Versions <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                    <ul class="zv-benefits">
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-download"></i></span>
                            <div><strong>Instant Download</strong><span>Get your files immediately</span></div>
                        </li>
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-shield-alt"></i></span>
                            <div><strong>100% Safe &amp; Secure</strong><span>Scanned for viruses and malware</span></div>
                        </li>
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-sync"></i></span>
                            <div><strong>Latest Version</strong><span>{{ $item->version ?: 'Always up to date' }}</span></div>
                        </li>
                        <li>
                            <span class="zv-benefit-icon"><i class="fas fa-check-circle"></i></span>
                            <div><strong>Trusted Source</strong><span>Verified and secure downloads</span></div>
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
                @if($item->show_mock_screenshots)
                    <button type="button" class="zv-tab" role="tab" id="tab-screenshots" aria-controls="panel-screenshots" aria-selected="false" tabindex="-1">Screenshots</button>
                @endif
                @if(count($versions))
                    <button type="button" class="zv-tab" role="tab" id="tab-versions" aria-controls="panel-versions" aria-selected="false" tabindex="-1">Older Versions</button>
                @endif
                <button type="button" class="zv-tab" role="tab" id="tab-reviews" aria-controls="panel-reviews" aria-selected="false" tabindex="-1">Reviews ({{ $item->votes }})</button>
                @if(count($faqs))
                    <button type="button" class="zv-tab" role="tab" id="tab-faqs" aria-controls="panel-faqs" aria-selected="false" tabindex="-1">FAQs</button>
                @endif
            </div>
        </div>
    </div>

    <div class="container zv-panels">
        <section class="zv-panel" role="tabpanel" id="panel-overview" aria-labelledby="tab-overview" tabindex="0">
            <div class="zv-overview-panel">
                <div>
                    <div class="zv-copy">
                        <h2 class="zv-section-title">{{ $item->name }} Overview</h2>
                        @foreach($overview as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                    @if(count($features))
                        <div class="zv-key-features">
                            <h2 class="zv-section-title">Key Features</h2>
                            <ul class="zv-features">
                                @foreach($features as $feature)
                                    <li>
                                        <span class="zv-feature-icon"><i class="{{ $feature['icon'] ?? 'fas fa-check' }}"></i></span>
                                        <div>
                                            <strong>{{ $feature['title'] ?? '' }}</strong>
                                            <span>{{ $feature['text'] ?? '' }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <aside class="zv-info-card" id="publisher" aria-label="Software information">
                    <h3>Software Information</h3>
                    <dl>
                        <dt>License</dt><dd>{{ $licenseLabel }}</dd>
                        @if($item->publisher)<dt>Developer</dt><dd>{{ $item->publisher }}</dd>@endif
                        <dt>Latest Version</dt><dd>{{ $item->version }}</dd>
                        @if($item->release_date)<dt>Release Date</dt><dd>{{ $item->release_date }}</dd>@endif
                        @if($item->file_size)<dt>File Size</dt><dd>{{ $item->file_size }}</dd>@endif
                        <dt>Operating System</dt><dd>{{ $item->os }}</dd>
                        <dt>Language</dt><dd>{{ $item->language }}</dd>
                        <dt>Downloads</dt><dd>{{ $item->downloads }}</dd>
                        <dt>Category</dt><dd>{{ $categoryLabel }}</dd>
                    </dl>
                </aside>
            </div>
            @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'rectangle'])
        </section>

        @if(count($features))
            <section class="zv-panel" role="tabpanel" id="panel-features" aria-labelledby="tab-features" tabindex="0" hidden>
                <h2 class="zv-section-title">Everything in {{ $item->name }}</h2>
                <ul class="zv-feature-list">
                    @foreach($features as $feature)
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>
                                <b>{{ $feature['title'] ?? '' }}</b>
                                @if(!empty($feature['text'])) — {{ $feature['text'] }}@endif
                            </span>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif

        @if($item->show_mock_screenshots && count($mockShots))
            <section class="zv-panel" role="tabpanel" id="panel-screenshots" aria-labelledby="tab-screenshots" tabindex="0" hidden>
                <div class="zv-shot-grid-lg">
                    @foreach($mockShots as $shot)
                        <figure>
                            <img src="{{ $shot['src'] }}" alt="{{ $shot['alt'] }}" loading="lazy">
                            <figcaption>{{ $shot['caption'] }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </section>
        @endif

        @if(count($versions))
            <section class="zv-panel" role="tabpanel" id="panel-versions" aria-labelledby="tab-versions" tabindex="0" hidden>
                <h2 class="zv-section-title">Older Versions</h2>
                <div class="zv-req-wrap">
                    <table class="zv-req-table">
                        <thead>
                            <tr>
                                <th scope="col">Version</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">File Size</th>
                                <th scope="col">Downloads</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($versions as $row)
                                <tr>
                                    <th scope="row">{{ $row['label'] }} @if(!empty($row['latest']))<em>(Latest)</em>@endif</th>
                                    <td>{{ $row['date'] ?? '—' }}</td>
                                    <td>{{ $row['size'] ?? ($item->file_size ?: '—') }}</td>
                                    <td>{{ $row['downloads'] ?? $item->downloads }}</td>
                                    <td>
                                        @if($item->downloadUrl($row))
                                            <a class="zv-dl" href="{{ $item->downloadUrl($row) }}" @if($item->isLocalDownload($row)) download @else target="_blank" rel="noopener" @endif>
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @endif

        <section class="zv-panel" role="tabpanel" id="panel-reviews" aria-labelledby="tab-reviews" tabindex="0" hidden>
            <div class="zv-reviews">
                <div class="zv-review-summary">
                    <div class="zv-score">{{ $item->rating }}</div>
                    <span class="zv-stars" aria-hidden="true">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </span>
                    <p>Based on {{ $item->votes }} reviews</p>
                </div>
                <div class="zv-copy">
                    <h2 class="zv-section-title">User Reviews</h2>
                    <p>Readers rate {{ $item->name }} at {{ $item->rating }}/5 based on {{ $item->votes }} votes and {{ $item->downloads }} downloads.</p>
                </div>
            </div>
        </section>

        @if(count($faqs))
            <section class="zv-panel" role="tabpanel" id="panel-faqs" aria-labelledby="tab-faqs" tabindex="0" hidden>
                <div class="zv-faq">
                    @foreach($faqs as $i => $faq)
                        <details @if($i === 0) open @endif>
                            <summary>{{ $faq['q'] }}</summary>
                            <p>{{ $faq['a'] }}</p>
                        </details>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

    @if($item->show_mock_screenshots && count($mockShots))
        <section class="zv-block" aria-labelledby="zv-shots-title">
            <div class="container">
                <div class="zv-block-head">
                    <h2 id="zv-shots-title">Screenshots</h2>
                    <button type="button" class="zv-link" data-open-tab="screenshots" style="background:none;border:0;padding:0;cursor:pointer;">
                        View All <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <div class="zv-shots">
                    @foreach(array_slice($mockShots, 0, 4) as $shot)
                        <a class="zv-shot popup-image" href="{{ $shot['src'] }}" title="{{ $shot['caption'] }}">
                            <img src="{{ $shot['src'] }}" alt="{{ $shot['alt'] }}" loading="lazy">
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($related->isNotEmpty())
        <section class="zv-block zv-related-wrap" aria-labelledby="zv-related-title">
            <div class="container">
                <div class="zv-block-head">
                    <h2 id="zv-related-title">You May Also Like</h2>
                    <a href="{{ route('filehippo.index') }}" class="zv-link">View All Software <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="zv-related">
                    @foreach($related as $rel)
                        @php $relLogo = \App\Support\SoftwareDesignAssets::logoFor($rel); @endphp
                        <a href="{{ route('filehippo.show', $rel->slug) }}" class="zv-rel">
                            <div class="zv-rel-head">
                                @if($rel->image)
                                    <img src="{{ $rel->imageUrl() }}" alt="" width="48" height="48">
                                @elseif($relLogo)
                                    <img src="{{ $relLogo }}" alt="" width="48" height="48">
                                @else
                                    <span class="zv-rel-icon {{ $rel->icon_class }}">
                                        @if($rel->icon)
                                            <i class="{{ $rel->icon }}"></i>
                                        @else
                                            {{ $rel->icon_text }}
                                        @endif
                                    </span>
                                @endif
                                <div>
                                    <strong>{{ $rel->name }}</strong>
                                    <small>{{ $rel->publisher ?: $rel->licenseLabel() }}</small>
                                </div>
                            </div>
                            <div class="zv-rel-rating">
                                <span class="zv-stars" aria-hidden="true"><i class="fas fa-star"></i></span>
                                <span><b>{{ $rel->rating }}</b></span>
                            </div>
                            <div class="zv-rel-price">
                                <b>{{ $rel->licenseLabel() }}</b>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])

    <section class="zv-newsletter" id="newsletter" aria-labelledby="zv-newsletter-title">
        <div class="container">
            <div class="zv-newsletter-box">
                <div class="zv-newsletter-copy">
                    <span class="zv-newsletter-icon"><i class="fas fa-cloud-download-alt"></i></span>
                    <div>
                        <h3 id="zv-newsletter-title">Stay Updated With the Latest Software</h3>
                        <p>Get notified about new versions, popular software and exclusive deals.</p>
                    </div>
                </div>
                <form class="zv-newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                    @csrf
                    <input type="hidden" name="source" value="filehippo-detail">
                    <label class="zv-sr-only" for="zv-newsletter-email-detail">Email address</label>
                    <input id="zv-newsletter-email-detail" type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit" class="zv-btn zv-btn-primary">Subscribe</button>
                    <label class="zv-newsletter-agree">
                        <input type="checkbox" name="agree" value="1" required>
                        I agree to the Privacy Policy.
                    </label>
                    @if(session('newsletter_success'))
                        <span class="zv-form-note is-success">{{ session('newsletter_success') }}</span>
                    @endif
                    @if(session('newsletter_error'))
                        <span class="zv-form-note is-error">{{ session('newsletter_error') }}</span>
                    @endif
                </form>
            </div>
        </div>
    </section>
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
        el.addEventListener('click', function (e) {
            e.preventDefault();
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
