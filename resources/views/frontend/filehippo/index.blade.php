@extends('layouts.frontend')

@section('content')
@php
    $chips = collect($categories)->where('is_chip', true);
    $queryBase = array_filter([
        'q' => $search ?: null,
        'sort' => $sort !== 'popular' ? $sort : null,
        'platform' => $platform ?: null,
        'license' => ($license && $license !== 'all') ? $license : null,
    ]);
    $categoryLabel = optional(collect($categories)->firstWhere('slug', $activeCategory))->name ?? 'All Software';
    $trustItems = $seo->section('trust', [
        ['icon' => 'fas fa-shield-alt', 'title' => '100% Safe Downloads', 'text' => 'Virus Scanned'],
        ['icon' => 'fas fa-clock', 'title' => 'Latest Versions', 'text' => 'Always up to date'],
        ['icon' => 'fas fa-th-large', 'title' => 'Wide Selection', 'text' => 'Thousands of apps'],
        ['icon' => 'fas fa-check-circle', 'title' => 'Trusted Source', 'text' => 'Verified and secure'],
    ]);
    $designHero = \App\Support\SoftwareDesignAssets::hero();
    $cmsHeroRaw = (string) ($seo->section('hero_image') ?? '');
    $cmsHeroIsLegacy = $cmsHeroRaw === ''
        || str_contains($cmsHeroRaw, 'softwaretechcompany.com')
        || str_contains($cmsHeroRaw, 'dashboard.jpg');
    // Always prefer design pack hero over broken/legacy CMS URLs
    $heroImage = $cmsHeroIsLegacy
        ? $designHero
        : ($seo->sectionMedia('hero_image', $designHero) ?: $designHero);
    $platformActive = $platform ?: '';
@endphp
<main class="filehippo-page software-listing-page">
    <section class="zv-hero" aria-labelledby="zv-hero-title">
        <div class="container">
            <div class="zv-hero-copy">
                <span class="zv-kicker">{{ $seo->section('hero_kicker', 'Software Downloads') }}</span>
                <h1 id="zv-hero-title">{!! nl2br(e($seo->section('hero_title', 'Find the Best Software for Your Needs'))) !!}</h1>
                <p>{{ $seo->section('hero_description', 'Download trusted, safe and verified software for Windows, Mac, Android and more. Free & premium software in one place.') }}</p>
                <form class="zv-hero-search" method="GET" action="{{ route('filehippo.index') }}" role="search">
                    @if($activeCategory && $activeCategory !== 'all')
                        <input type="hidden" name="category" value="{{ $activeCategory }}">
                    @endif
                    <label class="zv-sr-only" for="zv-hero-search">Search for software</label>
                    <input id="zv-hero-search" name="q" value="{{ $search }}" type="search" placeholder="{{ $seo->section('search_placeholder', 'Search for software, e.g. Chrome, Photoshop, VLC...') }}">
                    <button type="submit" aria-label="Search"><i class="fas fa-search"></i></button>
                </form>
                <ul class="zv-trust">
                    @foreach($trustItems as $trust)
                        <li class="zv-trust-item">
                            <span class="zv-trust-icon"><i class="{{ $trust['icon'] ?? 'fas fa-check' }}"></i></span>
                            <div>
                                <strong>{{ $trust['title'] ?? '' }}</strong>
                                <span>{{ $trust['text'] ?? '' }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="zv-hero-art">
                <img src="{{ $heroImage }}" alt="{{ $seo->section('hero_title', 'Software downloads') }}" width="720" height="470">
            </div>
            <div class="zv-hero-badge">
                <i class="fas fa-cloud-download-alt"></i>
                <p><strong>Trusted Downloads</strong>for a Better Digital Life</p>
            </div>
        </div>
    </section>

    @if($chips->isNotEmpty())
        <section class="zv-platforms" aria-label="Browse by platform or category">
            <div class="container">
                <div class="zv-platform-grid">
                    @foreach($chips as $chip)
                        <a
                            class="zv-platform {{ $activeCategory === $chip->slug ? 'is-active' : '' }}"
                            href="{{ route('filehippo.index', array_merge($queryBase, ['category' => $chip->slug])) }}"
                            @if($activeCategory === $chip->slug) aria-current="page" @endif
                        >
                            <i class="{{ $chip->icon }}"></i>
                            <span class="zv-platform-label">
                                @if(str_contains($chip->name, ' Apps'))
                                    {!! str_replace(' Apps', '<small>Apps</small>', e($chip->name)) !!}
                                @else
                                    {{ $chip->name }}
                                @endif
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="zv-listing" id="all-software">
        <div class="container">
            <div class="site-ad-mobile-only">
                @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
            </div>

            <div class="zv-listing-grid">
                <button type="button" class="zv-filter-toggle" aria-expanded="false" aria-controls="zv-sidebar" id="zv-filter-toggle">
                    <span><i class="fas fa-sliders-h me-2"></i>Filters &amp; Categories</span>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <aside class="zv-sidebar" id="zv-sidebar" aria-label="Filters">
                    <div class="zv-sidebar-inner">
                        <div class="zv-sidebar-block is-cats">
                            <h2>Categories</h2>
                            <ul class="zv-cat-list">
                                <li>
                                    <a href="{{ route('filehippo.index', $queryBase) }}" class="{{ $activeCategory === 'all' || $activeCategory === '' ? 'is-active' : '' }}">
                                        <i class="fas fa-th-large"></i>
                                        All Software
                                        <span class="zv-count">{{ $categoryCounts['all'] ?? $items->total() }}</span>
                                    </a>
                                </li>
                                @foreach($categories as $cat)
                                    <li>
                                        <a href="{{ route('filehippo.index', array_merge($queryBase, ['category' => $cat->slug])) }}" class="{{ $activeCategory === $cat->slug ? 'is-active' : '' }}">
                                            <i class="{{ $cat->icon }}"></i>
                                            {{ $cat->name }}
                                            <span class="zv-count">{{ $categoryCounts[$cat->slug] ?? 0 }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <form method="GET" action="{{ route('filehippo.index') }}">
                            @if($search)<input type="hidden" name="q" value="{{ $search }}">@endif
                            @if($activeCategory && $activeCategory !== 'all')<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                            <input type="hidden" name="sort" value="{{ $sort }}">

                            <div class="zv-sidebar-block is-platform" role="group" aria-labelledby="zv-platform-title">
                                <h2 id="zv-platform-title">Platform</h2>
                                <ul class="zv-filter-list">
                                    @foreach(['' => 'All', 'Windows' => 'Windows', 'Mac' => 'Mac', 'Android' => 'Android'] as $value => $label)
                                        <li>
                                            <label class="zv-filter">
                                                <input type="radio" name="platform" value="{{ $value }}" @checked($platformActive === $value) onchange="this.form.submit()">
                                                <span class="zv-box"></span>
                                                {{ $label }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="zv-sidebar-block is-license" role="group" aria-labelledby="zv-license-title">
                                <h2 id="zv-license-title">License</h2>
                                <ul class="zv-filter-list">
                                    @foreach(['all' => 'All', 'free' => 'Free', 'freemium' => 'Freemium', 'paid' => 'Paid'] as $value => $label)
                                        <li>
                                            <label class="zv-filter">
                                                <input type="radio" name="license" value="{{ $value }}" @checked($license === $value) onchange="this.form.submit()">
                                                <span class="zv-box {{ $value === 'all' ? '' : 'is-round' }}"></span>
                                                {{ $label }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </form>

                        @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
                    </div>
                </aside>

                <div class="zv-list-col">
                    <div class="zv-list-head">
                        <div>
                            <h2>{{ $activeCategory === 'all' || $activeCategory === '' ? 'All Software' : $categoryLabel }}</h2>
                            <p>
                                @if($search)
                                    Results for “{{ $search }}”
                                @else
                                    {{ $seo->section('list_subtitle', 'Discover and download the best software for your device.') }}
                                @endif
                            </p>
                        </div>
                        <form class="zv-sort" method="GET" action="{{ route('filehippo.index') }}">
                            @if($search)<input type="hidden" name="q" value="{{ $search }}">@endif
                            @if($activeCategory && $activeCategory !== 'all')<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                            @if($platform)<input type="hidden" name="platform" value="{{ $platform }}">@endif
                            @if($license && $license !== 'all')<input type="hidden" name="license" value="{{ $license }}">@endif
                            <label for="zv-sort">Sort by:</label>
                            <select id="zv-sort" name="sort" onchange="this.form.submit()" aria-label="Sort software">
                                <option value="popular" @selected($sort === 'popular')>Most Popular</option>
                                <option value="newest" @selected($sort === 'newest')>Newest</option>
                                <option value="rated" @selected($sort === 'rated')>Highest Rated</option>
                            </select>
                        </form>
                    </div>

                    <div
                        class="zv-soft-list"
                        id="fh-software-list"
                        data-page="{{ $items->currentPage() }}"
                        data-last="{{ $items->lastPage() }}"
                        data-total="{{ $items->total() }}"
                        data-loading="0"
                    >
                        @forelse($items as $item)
                            @include('frontend.filehippo.partials.software-row', ['item' => $item])
                            @if($loop->index === 1)
                                @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'leaderboard'])
                            @endif
                        @empty
                            <div class="zv-empty">No software matches your filters.</div>
                        @endforelse
                    </div>

                    <div id="fh-infinite-status" class="zv-infinite-status" @if(! $items->hasMorePages()) hidden @endif>
                        <div class="zv-infinite-spinner" aria-hidden="true"></div>
                        <span>Loading more software…</span>
                    </div>
                    <div id="fh-infinite-end" class="zv-infinite-end" @if($items->hasMorePages() || $items->total() === 0) hidden @endif>
                        All {{ $items->total() }} software loaded.
                    </div>
                    <div id="fh-infinite-sentinel" aria-hidden="true"></div>

                    @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])

                    <section class="zv-newsletter" id="newsletter" aria-labelledby="zv-newsletter-title">
                        <div class="zv-newsletter-box">
                            <div class="zv-newsletter-copy">
                                <span class="zv-newsletter-icon"><i class="fas fa-cloud-download-alt"></i></span>
                                <div>
                                    <h3 id="zv-newsletter-title">{{ $seo->section('subscribe_title', 'Stay Updated With the Latest Software') }}</h3>
                                    <p>{{ $seo->section('subscribe_text', 'Get notified about new versions, popular software and exclusive deals.') }}</p>
                                </div>
                            </div>
                            <form class="zv-newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                                @csrf
                                <input type="hidden" name="source" value="filehippo">
                                <label class="zv-sr-only" for="zv-newsletter-email">Email address</label>
                                <input id="zv-newsletter-email" type="email" name="email" placeholder="Enter your email address" required>
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
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
(function () {
    var toggle = document.getElementById('zv-filter-toggle');
    var sidebar = document.getElementById('zv-sidebar');
    if (toggle && sidebar) {
        toggle.addEventListener('click', function () {
            var open = sidebar.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    var list = document.getElementById('fh-software-list');
    var sentinel = document.getElementById('fh-infinite-sentinel');
    var statusEl = document.getElementById('fh-infinite-status');
    var endEl = document.getElementById('fh-infinite-end');
    if (!list || !sentinel) return;

    var page = parseInt(list.getAttribute('data-page') || '1', 10);
    var last = parseInt(list.getAttribute('data-last') || '1', 10);
    var loading = false;

    function setLoading(on) {
        loading = on;
        list.setAttribute('data-loading', on ? '1' : '0');
        if (statusEl) statusEl.hidden = !on || page >= last;
    }

    function showEnd() {
        if (statusEl) statusEl.hidden = true;
        if (endEl) endEl.hidden = false;
    }

    function nextUrl(nextPage) {
        var url = new URL(window.location.href);
        url.searchParams.set('page', String(nextPage));
        url.searchParams.set('ajax', '1');
        return url.toString();
    }

    async function loadMore() {
        if (loading || page >= last) {
            if (page >= last) showEnd();
            return;
        }

        setLoading(true);
        try {
            var res = await fetch(nextUrl(page + 1), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
            if (!res.ok) throw new Error('HTTP ' + res.status);
            var data = await res.json();
            if (data.html) {
                list.insertAdjacentHTML('beforeend', data.html);
            }
            page = data.current_page || (page + 1);
            last = data.last_page || last;
            list.setAttribute('data-page', String(page));
            list.setAttribute('data-last', String(last));
            if (!data.has_more) {
                showEnd();
            }
        } catch (e) {
            console.error('Software infinite scroll failed', e);
        } finally {
            setLoading(false);
            if (page >= last) showEnd();
        }
    }

    if (page >= last) {
        showEnd();
        return;
    }

    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) loadMore();
            });
        }, { rootMargin: '280px 0px' });
        io.observe(sentinel);
    } else {
        window.addEventListener('scroll', function () {
            if (loading || page >= last) return;
            var rect = sentinel.getBoundingClientRect();
            if (rect.top < window.innerHeight + 280) loadMore();
        }, { passive: true });
    }
})();
</script>
@endpush
