@extends('layouts.frontend')

@push('head')
<style>
.filehippo-page{background:#f7faff;color:#122044;overflow:hidden}
.filehippo-page *{box-sizing:border-box}
.fh-hero{background:linear-gradient(135deg,#eef6ff 0%,#dcecff 52%,#f8fbff 100%);border-bottom:1px solid #dce8f7;padding:56px 0 34px;position:relative}
.fh-hero-grid{display:grid;grid-template-columns:1fr 1.15fr;gap:38px;align-items:center}
.fh-eyebrow{font-size:13px;letter-spacing:1.4px;font-weight:800;color:var(--theme);text-transform:uppercase;margin-bottom:10px}
.fh-hero h1{font-size:48px;line-height:1.04;margin:0 0 14px;font-weight:800;color:#0a1743}
.fh-hero p{font-size:17px;line-height:1.65;color:#50627c;max-width:620px;margin:0 0 24px}
.fh-search{display:flex;background:#fff;border:1px solid #d7e2f1;border-radius:8px;overflow:hidden;box-shadow:0 8px 24px rgba(33,75,130,.08);max-width:640px;height:52px;align-items:stretch}
.fh-search input{border:0;outline:0;padding:0 17px;font-size:14px;flex:1;min-width:0;color:#253550;height:52px;line-height:52px;background:#fff}
.fh-search button{border:0;background:var(--theme);color:#fff;width:62px;min-width:62px;height:52px;font-size:17px;cursor:pointer;display:flex;align-items:center;justify-content:center;padding:0}
.fh-hero-art{min-height:330px;border-radius:22px;position:relative;display:flex;align-items:center;justify-content:center}
.fh-hero-banner-img{width:100%;max-width:620px;height:330px;display:block;object-fit:cover;object-position:center;border-radius:14px;box-shadow:0 12px 30px rgba(33,75,130,.12)}
.fh-trust{display:grid;grid-template-columns:repeat(4,1fr);gap:15px;margin-top:28px}
.fh-trust-item{display:flex;gap:10px;align-items:center;color:#1d3154;font-size:12px}
.fh-trust-item i{width:35px;height:35px;border-radius:50%;background:#fff;color:var(--theme);display:flex;align-items:center;justify-content:center;box-shadow:0 3px 12px rgba(31,84,150,.1);flex:0 0 35px}
.fh-trust-item strong{display:block;font-size:12px}
.fh-trust-item span{display:block;color:#6b7b92;font-size:10px;margin-top:2px}
.fh-main{padding:38px 0 54px}
.fh-layout{display:grid;grid-template-columns:250px 1fr;gap:26px}
.fh-sidebar{background:#fff;border:1px solid #dfe8f4;border-radius:10px;padding:20px;height:max-content;box-shadow:0 4px 18px rgba(34,72,121,.04)}
.fh-side-title{font-size:19px;font-weight:800;color:#17264a;margin:0 0 13px}
.fh-side-group{border-top:1px solid #e8eef5;padding:18px 0}
.fh-side-group:first-of-type{border-top:0;padding-top:0}
.fh-side-link{display:flex;justify-content:space-between;align-items:center;padding:9px 8px;border-radius:6px;color:#4f6079;font-size:16px;text-decoration:none}
.fh-side-link:hover,.fh-side-link.active{background:#e9f2ff;color:var(--theme)}
.fh-side-link span:last-child{color:#7c8ba0;font-size:11px}
.fh-check{display:flex;align-items:center;gap:8px;font-size:13px;color:#5b6a7e;margin:9px 0}
.fh-check input{accent-color:var(--theme)}
.fh-content-head{display:flex;justify-content:space-between;gap:20px;align-items:end;margin-bottom:17px}
.fh-content-head h2{margin:0;font-size:28px;color:#17264a}
.fh-content-head p{margin:4px 0 0;color:#708096;font-size:13px}
.fh-sort{display:flex;align-items:center;gap:8px;color:#64748b;font-size:12px}
.fh-sort select{border:1px solid #dbe4ef;border-radius:7px;padding:10px 28px 10px 12px;background:#fff;color:#34445e}
.fh-categories{display:grid;grid-template-columns:repeat(9,1fr);gap:10px;margin-bottom:30px;background:#fff;border:1px solid #e1e7ef;padding:10px;border-radius:5px}
.fh-cat{background:#fff;border:1px solid #d8e0ea;border-radius:4px;min-height:74px;padding:10px 6px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;color:#334155;text-decoration:none;font-size:14px;line-height:1.25;text-align:center;transition:border-color .2s,background .2s,color .2s}
.fh-cat i{font-size:19px;color:#52657d;line-height:1}
.fh-cat:hover{border-color:#b9c7d8;background:#f8fafc;color:var(--theme)}
.fh-cat:hover i,.fh-cat.active i{color:var(--theme)}
.fh-cat.active{background:#fff;color:var(--theme);border-color:var(--theme);box-shadow:inset 0 -2px 0 var(--theme)}
.fh-list{display:flex;flex-direction:column;gap:9px}
.fh-software{background:#fff;border:1px solid #dfe8f4;border-radius:9px;padding:14px 15px;display:grid;grid-template-columns:58px 1fr 220px 105px;gap:15px;align-items:center;box-shadow:0 3px 13px rgba(28,68,115,.035)}
.fh-app-icon{width:55px;height:55px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:25px;font-weight:800;color:#fff;box-shadow:inset 0 -7px 15px rgba(0,0,0,.08);text-decoration:none}
.chrome{background:linear-gradient(135deg,#e34b38 0 35%,#f7d34b 35% 66%,#2aa85d 66%)}.vlc{background:#f4a500;color:#fff}.ps{background:#071d3c}.winrar{background:linear-gradient(#e34b62,#6953a6,#efb93f)}.zoom{background:#3d91ee}.notepad{background:#70bd6b}
.fh-app-name{font-weight:800;color:#1a2948;font-size:15px}
.fh-app-name a{color:inherit}
.fh-version{font-weight:500;color:#7a889d;font-size:11px;margin-left:6px}
.fh-desc{font-size:16px;color:#6b7b91;margin:5px 0 7px;line-height:1.65}
.fh-tags{display:flex;gap:5px;flex-wrap:wrap}
.fh-tag{font-size:13px;padding:5px 9px;border-radius:4px;background:#edf5ff;color:#3171ca}
.fh-tag.free{background:#e9f9f0;color:#21854c}
.fh-tag.paid{background:#fff0f0;color:#b64a4a}
.fh-meta{font-size:15px;color:#63738b;line-height:1.8}
.fh-meta strong{color:#f2a900}
.fh-download{text-align:right}
.fh-download a.fh-dl-btn{display:inline-flex;align-items:center;gap:7px;background:var(--theme);color:#fff;text-decoration:none;border-radius:6px;padding:10px 13px;font-size:12px;font-weight:700}
.fh-details{display:inline-block;color:var(--theme);text-decoration:none;font-size:16px;font-weight:600;margin-top:10px}
.fh-empty{padding:28px;text-align:center;color:#708096;border:1px dashed #dbe3ef;border-radius:10px;background:#fff}
.fh-subscribe{background:#e5f1ff;border:1px solid #cfe3fb;border-radius:9px;margin-top:24px;padding:18px 22px;display:flex;align-items:center;justify-content:space-between;gap:25px}
.fh-sub-left{display:flex;gap:15px;align-items:center}
.fh-sub-icon{width:52px;height:52px;border-radius:50%;background:var(--theme);color:#fff;display:flex;align-items:center;justify-content:center;font-size:21px;flex:0 0 52px}
.fh-sub h3{margin:0 0 4px;color:#172b4e;font-size:17px}
.fh-sub p{margin:0;color:#66778e;font-size:11px}
.fh-sub-form{display:flex;background:#fff;border:1px solid #d4e0ee;border-radius:6px;overflow:hidden;min-width:370px;flex-wrap:wrap}
.fh-sub-form input[type=email]{border:0;outline:0;padding:12px 14px;flex:1;font-size:11px;min-width:180px}
.fh-sub-form button{border:0;background:var(--theme);color:#fff;padding:0 18px;font-size:11px;font-weight:700;min-height:42px}
.fh-sub-agree{width:100%;padding:6px 14px 10px;font-size:10px;color:#66778e;margin:0;display:flex;gap:6px;align-items:center}
@media(max-width:1100px){.fh-categories{grid-template-columns:repeat(5,1fr)}.fh-software{grid-template-columns:58px 1fr 160px 100px}.fh-hero h1{font-size:40px}}
@media(max-width:850px){.fh-hero-grid,.fh-layout{grid-template-columns:1fr}.fh-hero-art{order:-1}.fh-sidebar{display:none}.fh-trust{grid-template-columns:repeat(2,1fr)}.fh-software{grid-template-columns:58px 1fr}.fh-meta{display:none}.fh-download{grid-column:2;text-align:left}.fh-categories{grid-template-columns:repeat(3,1fr)}.fh-subscribe{flex-direction:column;align-items:stretch}.fh-sub-form{min-width:0}.fh-content-head{align-items:flex-start;flex-direction:column}.fh-hero-banner-img{max-width:100%;height:290px}}
@media(max-width:520px){.fh-hero{padding-top:35px}.fh-hero h1{font-size:34px}.fh-hero p{font-size:14px}.fh-trust{grid-template-columns:1fr 1fr}.fh-cat{min-height:72px}.fh-software{grid-template-columns:48px 1fr;padding:12px}.fh-app-icon{width:48px;height:48px}.fh-hero-banner-img{height:220px}.fh-search,.fh-search input,.fh-search button{height:48px}.fh-search input{line-height:48px}}
</style>
@endpush

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
@endphp
<main class="filehippo-page">
    <section class="fh-hero">
        <div class="container">
            <div class="fh-hero-grid">
                <div>
                    <div class="fh-eyebrow">{{ $seo->section('hero_kicker', 'Software Downloads') }}</div>
                    <h1>{!! nl2br(e($seo->section('hero_title', 'Find the Best Software for Your Needs'))) !!}</h1>
                    <p>{{ $seo->section('hero_description', 'Download trusted, safe and verified software for Windows, Mac, Android and more. Free & premium software in one place.') }}</p>
                    <form class="fh-search" method="GET" action="{{ route('filehippo.index') }}">
                        @if($activeCategory && $activeCategory !== 'all')
                            <input type="hidden" name="category" value="{{ $activeCategory }}">
                        @endif
                        <input name="q" value="{{ $search }}" type="search" placeholder="{{ $seo->section('search_placeholder', 'Search for software, e.g. Chrome, Photoshop, VLC...') }}">
                        <button aria-label="Search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="fh-hero-art">
                    <img src="{{ $seo->sectionMedia('hero_image', 'https://softwaretechcompany.com/storage/home/dashboard.jpg') }}" alt="{{ $seo->section('hero_title', 'Software downloads') }}" class="fh-hero-banner-img">
                </div>
            </div>
            <div class="fh-trust">
                @foreach($trustItems as $trust)
                    <div class="fh-trust-item"><i class="{{ $trust['icon'] ?? 'fas fa-check' }}"></i><div><strong>{{ $trust['title'] ?? '' }}</strong><span>{{ $trust['text'] ?? '' }}</span></div></div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="fh-main">
        <div class="container">
            <div class="fh-categories">
                @foreach($chips as $chip)
                    <a class="fh-cat {{ $activeCategory === $chip->slug ? 'active' : '' }}" href="{{ route('filehippo.index', array_merge($queryBase, ['category' => $chip->slug])) }}">
                        <i class="{{ $chip->icon }}"></i>{!! str_contains($chip->name, ' Apps') ? str_replace(' Apps', '<br>Apps', e($chip->name)) : e($chip->name) !!}
                    </a>
                @endforeach
            </div>

            <div class="site-ad-mobile-only">
                @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
            </div>

            <div class="fh-layout">
                <aside class="fh-sidebar">
                    <h3 class="fh-side-title">Categories</h3>
                    <div class="fh-side-group">
                        <a href="{{ route('filehippo.index', $queryBase) }}" class="fh-side-link {{ $activeCategory === 'all' || $activeCategory === '' ? 'active' : '' }}">
                            <span><i class="fab fa-windows"></i>&nbsp; All Software</span>
                            <span>{{ $categoryCounts['all'] ?? $items->count() }}</span>
                        </a>
                        @foreach($categories as $cat)
                            <a href="{{ route('filehippo.index', array_merge($queryBase, ['category' => $cat->slug])) }}" class="fh-side-link {{ $activeCategory === $cat->slug ? 'active' : '' }}">
                                <span><i class="{{ $cat->icon }}"></i>&nbsp; {{ $cat->name }}</span>
                                <span>{{ $categoryCounts[$cat->slug] ?? 0 }}</span>
                            </a>
                        @endforeach
                    </div>
                    <form method="GET" action="{{ route('filehippo.index') }}">
                        @if($search)<input type="hidden" name="q" value="{{ $search }}">@endif
                        @if($activeCategory && $activeCategory !== 'all')<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                        <input type="hidden" name="sort" value="{{ $sort }}">
                        <div class="fh-side-group">
                            <h4 class="fh-side-title" style="font-size:16px">Platform</h4>
                            @foreach(['' => 'All', 'Windows' => 'Windows', 'Mac' => 'Mac', 'Android' => 'Android'] as $value => $label)
                                <label class="fh-check">
                                    <input type="radio" name="platform" value="{{ $value }}" @checked($platform === $value) onchange="this.form.submit()">
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>
                        <div class="fh-side-group">
                            <h4 class="fh-side-title" style="font-size:16px">License</h4>
                            @foreach(['all' => 'All', 'free' => 'Free', 'freemium' => 'Freemium', 'paid' => 'Paid'] as $value => $label)
                                <label class="fh-check">
                                    <input type="radio" name="license" value="{{ $value }}" @checked($license === $value) onchange="this.form.submit()">
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>
                    </form>
                    @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
                </aside>

                <div>
                    <div class="fh-content-head">
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
                        <form class="fh-sort" method="GET" action="{{ route('filehippo.index') }}">
                            @if($search)<input type="hidden" name="q" value="{{ $search }}">@endif
                            @if($activeCategory && $activeCategory !== 'all')<input type="hidden" name="category" value="{{ $activeCategory }}">@endif
                            @if($platform)<input type="hidden" name="platform" value="{{ $platform }}">@endif
                            @if($license && $license !== 'all')<input type="hidden" name="license" value="{{ $license }}">@endif
                            Sort by:
                            <select name="sort" onchange="this.form.submit()">
                                <option value="popular" @selected($sort === 'popular')>Most Popular</option>
                                <option value="newest" @selected($sort === 'newest')>Newest</option>
                                <option value="rated" @selected($sort === 'rated')>Highest Rated</option>
                            </select>
                        </form>
                    </div>

                    <div class="fh-list">
                        @forelse($items as $item)
                            @include('frontend.filehippo.partials.software-row', ['item' => $item])
                            @if($loop->index === 1)
                                @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'leaderboard'])
                            @endif
                        @empty
                            <div class="fh-empty">No software matches your filters.</div>
                        @endforelse
                    </div>

                    @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])

                    <div class="fh-subscribe" id="newsletter">
                        <div class="fh-sub-left">
                            <div class="fh-sub-icon"><i class="fas fa-cloud-download-alt"></i></div>
                            <div>
                                <h3>{{ $seo->section('subscribe_title', 'Stay Updated With the Latest Software') }}</h3>
                                <p>{{ $seo->section('subscribe_text', 'Get notified about new versions, popular software and exclusive deals.') }}</p>
                            </div>
                        </div>
                        <form class="fh-sub-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                            @csrf
                            <input type="hidden" name="source" value="filehippo">
                            <input type="email" name="email" placeholder="Enter your email address" required>
                            <button type="submit">Subscribe</button>
                            <label class="fh-sub-agree">
                                <input type="checkbox" name="agree" value="1" required>
                                I agree to the Privacy Policy.
                            </label>
                        </form>
                    </div>
                    @if(session('newsletter_success'))
                        <p class="mt-3 mb-0" style="color:#21854c;font-size:13px;">{{ session('newsletter_success') }}</p>
                    @endif
                    @if(session('newsletter_error'))
                        <p class="mt-3 mb-0" style="color:#b64a4a;font-size:13px;">{{ session('newsletter_error') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
