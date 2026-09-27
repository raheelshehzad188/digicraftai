@extends('layouts.frontend')

@push('head')
<style>
.software-detail-page{background:#fff;color:#14213d;font-family:inherit}.software-detail-page *{box-sizing:border-box}.sw-breadcrumb{padding:18px 0 10px}.sw-breadcrumb-inner{display:flex;gap:10px;align-items:center;font-size:13px;color:#7b8798}.sw-breadcrumb a{color:#637085}.sw-breadcrumb strong{font-weight:500;color:#24324a}.sw-product-hero{padding:8px 0 26px}.sw-product-grid{display:grid;grid-template-columns:106px minmax(0,1fr) 255px;gap:22px;align-items:start}.sw-logo-box{height:106px;border:1px solid #e7edf5;border-radius:9px;display:flex;align-items:center;justify-content:center;background:#fff}.chrome-logo{width:78px;height:78px;border-radius:50%;position:relative;background:conic-gradient(#e94235 0 33%,#fbbc05 33% 50%,#34a853 50% 75%,#4285f4 75% 100%);box-shadow:inset 0 0 0 1px rgba(0,0,0,.04)}.chrome-logo:before{content:"";position:absolute;left:17px;top:17px;width:44px;height:44px;border-radius:50%;background:#fff}.chrome-center{position:absolute;z-index:2;left:24px;top:24px;width:30px;height:30px;border-radius:50%;background:#4285f4;border:5px solid #fff}.sw-title-row{display:flex;align-items:center;gap:12px}.sw-title-row h1{margin:0;font-size:31px;line-height:1.15;font-weight:700;color:#0e1d4d}.sw-badge{font-size:12px;padding:5px 11px;border-radius:5px;font-weight:700}.sw-badge.free{background:#c9f2dd;color:#17834c}.sw-version{margin-top:6px;font-size:13px;color:#4d5c73}.sw-version span{color:#69778b}.sw-lead{margin:7px 0 8px;color:#536176;font-size:14px}.sw-meta-row{display:flex;gap:6px;align-items:center;flex-wrap:wrap;font-size:13px;color:#59677a}.stars{color:#f5b719;letter-spacing:1px}.meta-sep{color:#cbd3df;margin:0 5px}.sw-meta-row i{color:#607087}.publisher-row{margin-top:10px;display:flex;gap:7px;align-items:center;font-size:13px;color:#59677a}.google-g{font-size:21px;font-weight:800;color:#4285f4}.verified{background:#eaf8f0;color:#23935b;padding:5px 9px;border-radius:5px;font-size:11px;margin-left:8px}.tag-row{display:flex;gap:7px;flex-wrap:wrap;margin-top:12px}.tag-row span{font-size:11px;background:#edf5ff;color:#4b6a93;padding:5px 10px;border-radius:4px}.sw-download-panel{padding-top:0}.sw-download-btn{height:58px;background:#19a65a;color:#fff;border-radius:5px;display:flex;align-items:center;gap:12px;padding:0 16px;text-decoration:none}.sw-download-btn>i:first-child{font-size:22px}.sw-download-btn span{display:flex;flex-direction:column;flex:1}.sw-download-btn b{font-size:14px}.sw-download-btn small{font-size:11px;opacity:.9;margin-top:2px}.sw-download-btn>i:last-child{font-size:13px}.other-versions{display:block;text-align:center;margin:11px 0 20px;font-size:12px;font-weight:600;color:#2672d9}.safe-box{background:#eef6ff;border-radius:6px;padding:14px;display:flex;gap:10px;align-items:center}.safe-box>i{font-size:28px;color:#1873e8}.safe-box div{display:flex;flex-direction:column}.safe-box strong{font-size:12px;color:#152443}.safe-box span{font-size:10px;color:#67758a;margin-top:3px}.sw-tabs-wrap{border-top:1px solid #e8edf4;border-bottom:1px solid #e4e9f0}.sw-tabs{display:flex;gap:30px;overflow:auto}.sw-tabs a{padding:14px 2px 12px;color:#4f5d71;font-size:12px;white-space:nowrap;position:relative}.sw-tabs a.active{color:#1469df;font-weight:700}.sw-tabs a.active:after{content:"";position:absolute;bottom:-1px;left:0;right:0;height:2px;background:#1469df}.sw-content-section{padding:18px 0 0}.sw-content-grid{display:grid;grid-template-columns:minmax(0,1fr) 240px;gap:25px}.sw-content-main h2{font-size:18px;color:#122143;margin:0 0 8px}.sw-content-main article p{font-size:13px;line-height:1.65;color:#56647a;margin:0 0 13px}.sw-features{margin-top:20px}.feature-grid{display:grid;grid-template-columns:1fr 1fr;gap:13px 26px;margin-top:13px}.feature-item{display:flex;gap:11px;align-items:flex-start}.feature-icon{width:40px;height:40px;border-radius:7px;background:#edf6ff;display:flex;align-items:center;justify-content:center;color:#1672e7;font-size:17px;flex:none}.feature-item h3{font-size:12px;margin:2px 0 4px;color:#172544}.feature-item p{font-size:10.5px!important;line-height:1.45!important;margin:0!important;color:#6b778b!important}.sw-section-heading{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}.sw-section-heading a,.more-versions{font-size:11px;font-weight:600;color:#2672dc}.sw-screenshots{margin-top:23px}.shot-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}.shot-card{position:relative;overflow:hidden;border-radius:5px;border:1px solid #dce4ee;background:#fff}.shot-card>span{display:block;position:absolute;left:5px;right:5px;bottom:5px;padding:7px;background:rgba(0,0,0,.58);color:#fff;text-align:center;font-size:10px;border-radius:3px}.browser-shot{height:108px;background:#eef4fa}.shot-bar{height:15px;background:#d7e0eb;border-bottom:1px solid #c8d2df}.shot-content{height:93px;display:flex;align-items:center;justify-content:center}.shot-google{font-size:25px;color:#4285f4;font-weight:600;letter-spacing:-1px}.fake-window{width:65%;height:62%;background:#fff;border-radius:3px;padding:7px;box-shadow:0 2px 8px rgba(22,48,80,.12);font-size:8px}.fake-window span,.fake-settings span{height:5px;background:#dbe7f4;border-radius:3px;display:block;margin-top:6px}.fake-settings{width:68%;height:70%;background:#fff;border-radius:3px;padding:8px;font-size:9px;box-shadow:0 2px 8px rgba(22,48,80,.12)}.shot-dots{text-align:center;margin:9px 0}.shot-dots b{display:inline-block;width:6px;height:6px;background:#d9e1eb;border-radius:50%;margin:0 3px}.shot-dots b:first-child{background:#1f73e8;width:17px;border-radius:4px}.sw-versions{margin-top:16px}.version-table-wrap{border:1px solid #dce4ed;border-radius:5px;overflow:hidden}.version-table{width:100%;border-collapse:collapse;font-size:10px}.version-table th,.version-table td{padding:7px 10px;border-bottom:1px solid #e3e8ef;text-align:left}.version-table th{background:#f2f6fa;color:#33435e;font-weight:700}.version-table td{color:#56657a}.version-table tr:last-child td{border-bottom:0}.version-table em{color:#178a55;font-style:normal}.table-download{border:1px solid #a8c8ed;border-radius:4px;padding:4px 10px;color:#176fda;display:inline-block}.more-versions{display:block;text-align:center;margin:12px 0 0}.sw-faq{margin-top:28px}.sw-faq details{border:1px solid #e1e7ef;border-radius:5px;padding:10px 12px;margin-top:8px}.sw-faq summary{font-size:12px;font-weight:600;color:#1c2a47;cursor:pointer}.sw-faq p{font-size:11px;color:#66748a;line-height:1.55;margin:8px 0 0}.sw-reviews{margin-top:25px;padding-bottom:25px}.review-count{font-size:11px;color:#758297}.review-summary{border:1px solid #e0e7ef;border-radius:6px;padding:13px;display:flex;align-items:center;gap:10px}.review-summary strong{font-size:22px;color:#142243}.review-summary span:last-child{font-size:11px;color:#5f6d82}.sw-sidebar{padding-top:0}.side-card{border:1px solid #e0e7ef;background:#f8fbff;border-radius:6px;margin-bottom:13px}.info-card{padding:13px}.side-card h3{font-size:13px;margin:0 0 12px;color:#1b2947}.info-card dl{display:grid;grid-template-columns:1fr 1.25fr;gap:8px 7px;margin:0}.info-card dt,.info-card dd{font-size:10px;line-height:1.3}.info-card dt{color:#617087}.info-card dd{margin:0;color:#263650;font-weight:500}.related-card{background:#fff;padding:13px}.side-heading{display:flex;justify-content:space-between;align-items:center}.side-heading a{font-size:10px;color:#1f70dc}.related-item{display:flex;align-items:center;gap:8px;padding:9px 0;border-top:1px solid #e8edf3}.related-item:first-of-type{border-top:0}.related-icon{width:30px;height:30px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:17px}.firefox{background:#fff0ef;color:#ef5c38}.edge{background:#e9f7f5;color:#1d9d86}.brave{background:#fff2ed;color:#ef6b3c}.opera{background:#fff0f0;color:#d94343}.vivaldi{background:#fff0f4;color:#d83264}.related-item div{display:flex;flex-direction:column;flex:1}.related-item strong{font-size:10.5px;color:#172441}.related-item small{font-size:9px;color:#f1ad17;margin-top:2px}.related-item>b{font-size:9px;background:#d9f4e5;color:#29915e;padding:4px 6px;border-radius:4px;font-weight:600}.side-ad{background:#eef7ff;border-radius:6px;padding:22px 13px;text-align:center}.mini-chrome{height:58px;display:flex;align-items:center;justify-content:center}.chrome-logo.small{width:49px;height:49px}.chrome-logo.small:before{left:11px;top:11px;width:28px;height:28px}.chrome-logo.small .chrome-center{left:15px;top:15px;width:19px;height:19px;border-width:3px}.side-ad h3{font-size:19px;line-height:1.2;margin:9px 0 5px;color:#101f46}.side-ad p{font-size:10px;color:#66758b;margin-bottom:14px}.ad-btn{display:block;background:#176ee9;color:#fff;border-radius:4px;padding:9px;font-size:11px;font-weight:600}.sw-newsletter{padding:0 0 18px}.newsletter-box{background:#e9f5ff;border-radius:5px;padding:14px 20px;display:flex;align-items:center;gap:14px}.newsletter-icon{width:46px;height:46px;border-radius:50%;background:#2379ed;color:#fff;display:flex;align-items:center;justify-content:center;font-size:19px;flex:none}.newsletter-copy{flex:1}.newsletter-copy h3{font-size:15px;margin:0 0 3px;color:#1a2a48}.newsletter-copy p{font-size:10px;margin:0;color:#68778b}.newsletter-box form{display:flex;width:290px}.newsletter-box input{height:38px;flex:1;border:1px solid #d6e0eb;border-right:0;padding:0 11px;font-size:10px;border-radius:4px 0 0 4px;background:#fff}.newsletter-box button{width:86px;border:0;background:#176fe8;color:#fff;border-radius:0 4px 4px 0;font-size:10px;font-weight:600}@media(max-width:991px){.sw-product-grid{grid-template-columns:90px 1fr}.sw-download-panel{grid-column:1/-1;display:grid;grid-template-columns:1fr 1fr;gap:10px;align-items:start}.sw-download-panel .safe-box{grid-column:1/-1}.sw-content-grid{grid-template-columns:1fr}.sw-sidebar{display:grid;grid-template-columns:1fr 1fr;gap:13px}.side-ad{grid-column:1/-1}.sw-newsletter .newsletter-box{flex-wrap:wrap}.newsletter-box form{width:100%}}@media(max-width:767px){.sw-product-grid{grid-template-columns:1fr}.sw-logo-box{width:106px}.sw-download-panel{grid-template-columns:1fr}.sw-tabs{gap:20px}.feature-grid,.shot-grid{grid-template-columns:1fr}.sw-sidebar{grid-template-columns:1fr}.version-table-wrap{overflow-x:auto}.version-table{min-width:650px}.newsletter-box{padding:15px}.sw-title-row h1{font-size:25px}}

.sw-badge.paid{background:#ffd7d7;color:#b64a4a}
.sw-badge.freemium{background:#e9f9f0;color:#21854c}
.sw-logo-box .sw-app-icon{width:78px;height:78px;border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:34px;font-weight:800;color:#fff}
.chrome{background:linear-gradient(135deg,#e34b38 0 35%,#f7d34b 35% 66%,#2aa85d 66%)}.vlc{background:#f4a500}.ps{background:#071d3c}.winrar{background:linear-gradient(#e34b62,#6953a6,#efb93f)}.zoom{background:#3d91ee}.notepad{background:#70bd6b}
.related-item{text-decoration:none;color:inherit}.related-item b.paid{background:#fff0f0;color:#b64a4a}
.sw-tabs a,.other-versions,.table-download,.side-heading a,.ad-btn{text-decoration:none}
.newsletter-agree{width:100%;font-size:10px;color:#66778e;margin:6px 0 0;display:flex;gap:6px;align-items:center}
.sw-newsletter form{flex-wrap:wrap}

</style>
@endpush

@section('content')
@php
    $licenseClass = $item->license === 'paid' ? 'paid' : ($item->license === 'freemium' ? 'freemium' : 'free');
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
@endphp
<main class="software-detail-page">
    @include('frontend.partials.breadcrumb', [
        'title' => $item->name,
        'crumbs' => [
            ['label' => 'Software', 'url' => route('filehippo.index')],
            ['label' => $categoryLabel, 'url' => route('filehippo.index', ['category' => $categorySlug])],
        ],
    ])

    <section class="sw-product-hero">
        <div class="container">
            <div class="sw-product-grid">
                <div class="sw-logo-box" aria-label="{{ $item->name }} logo">
                    @if($item->image)
                        <img src="{{ $item->imageUrl() }}" alt="{{ $item->name }}" style="width:78px;height:78px;object-fit:cover;border-radius:16px">
                    @else
                    <div class="sw-app-icon {{ $item->icon_class }}">
                        @if($item->icon)
                            <i class="{{ $item->icon }}"></i>
                        @else
                            {{ $item->icon_text }}
                        @endif
                    </div>
                    @endif
                </div>
                <div class="sw-product-main">
                    <div class="sw-title-row">
                        <h1>{{ $item->name }}</h1>
                        <span class="sw-badge {{ $licenseClass }}">{{ $licenseLabel }}</span>
                    </div>
                    <div class="sw-version">{{ $item->version }} <span>(Latest Version)</span></div>
                    <p class="sw-lead">{{ $item->description }}</p>
                    <div class="sw-meta-row">
                        <span class="stars">★★★★★</span><strong>{{ $item->rating }}</strong> <span>({{ $item->votes }} votes)</span>
                        <span class="meta-sep">|</span>
                        <span><i class="fa-solid fa-download"></i> {{ $item->downloads }} downloads</span>
                    </div>
                    @if($item->publisher)
                        <div class="publisher-row">
                            By <strong>{{ $item->publisher }}</strong>
                            <span class="verified"><i class="fa-solid fa-shield"></i> Verified Publisher</span>
                        </div>
                    @endif
                    <div class="tag-row">
                        @foreach($tags as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                        @foreach($platforms as $os)
                            <span>{{ $os }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="sw-download-panel">
                    @if($item->downloadUrl())
                        <a class="theme-btn sw-download-btn" href="{{ $item->downloadUrl() }}" @if($item->isLocalDownload()) download @else target="_blank" rel="noopener" @endif>
                            <i class="fa-solid fa-download"></i>
                            <span><b>Download for {{ $platform }}</b><small>{{ $item->file_size ? $item->file_size : 'Latest version' }}</small></span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    @endif
                    @if(count($versions))
                        <a class="other-versions" href="#versions">Other Versions <i class="fa-solid fa-arrow-right"></i></a>
                    @endif
                    <div class="safe-box">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div><strong>100% Safe &amp; Secure</strong><span>Scanned for viruses and malware</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sw-tabs-wrap">
        <div class="container">
            <div class="sw-tabs">
                <a class="active" href="#overview">Overview</a>
                @if($item->show_mock_screenshots)<a href="#screenshots">Screenshots</a>@endif
                @if(count($features))<a href="#technical">Technical Details</a>@endif
                @if(count($versions))<a href="#versions">Older Versions</a>@endif
                @if(count($faqs))<a href="#faq">FAQ</a>@endif
                <a href="#reviews">Reviews ({{ $item->votes }})</a>
            </div>
        </div>
    </section>

    <section class="sw-content-section" id="overview">
        <div class="container">
            <div class="sw-content-grid">
                <div class="sw-content-main">
                    <article>
                        <h2>{{ $item->name }} Overview</h2>
                        @foreach($overview as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </article>

                    @include('frontend.partials.ad-slot', ['slot' => 'inline', 'size' => 'rectangle'])

                    @if(count($features))
                        <section class="sw-features" id="technical">
                            <h2>Key Features</h2>
                            <div class="feature-grid">
                                @foreach($features as $feature)
                                    <div class="feature-item">
                                        <span class="feature-icon"><i class="{{ $feature['icon'] }}"></i></span>
                                        <div>
                                            <h3>{{ $feature['title'] }}</h3>
                                            <p>{{ $feature['text'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if($item->show_mock_screenshots)
                        <section class="sw-screenshots" id="screenshots">
                            <div class="sw-section-heading"><h2>Screenshots</h2></div>
                            <div class="shot-grid">
                                <div class="shot-card"><div class="browser-shot"><div class="shot-bar"></div><div class="shot-content"><div class="shot-google">Google</div></div></div><span>Clean and simple interface</span></div>
                                <div class="shot-card"><div class="browser-shot"><div class="shot-bar"></div><div class="shot-content"><div class="fake-window"><b>Discover Chrome</b><span></span><span></span><span></span></div></div></div><span>Browse faster</span></div>
                                <div class="shot-card"><div class="browser-shot"><div class="shot-bar"></div><div class="shot-content"><div class="fake-settings"><b>Settings</b><span></span><span></span><span></span><span></span></div></div></div><span>Easy to customize</span></div>
                            </div>
                            <div class="shot-dots"><b></b><b></b><b></b><b></b><b></b></div>
                        </section>
                    @endif

                    @if(count($versions))
                        <section class="sw-versions" id="versions">
                            <div class="sw-section-heading"><h2>Older Versions</h2></div>
                            <div class="version-table-wrap">
                                <table class="version-table">
                                    <thead><tr><th>Version</th><th>Release Date</th><th>File Size</th><th>Downloads</th><th>Action</th></tr></thead>
                                    <tbody>
                                        @foreach($versions as $row)
                                            <tr>
                                                <td>{{ $row['label'] }} @if(!empty($row['latest']))<em>(Latest)</em>@endif</td>
                                                <td>{{ $row['date'] ?? '—' }}</td>
                                                <td>{{ $row['size'] ?? ($item->file_size ?: '—') }}</td>
                                                <td>{{ $row['downloads'] ?? $item->downloads }}</td>
                                                <td>
                                                    @if($item->downloadUrl($row))
                                                        <a class="table-download" href="{{ $item->downloadUrl($row) }}" @if($item->isLocalDownload($row)) download @else target="_blank" rel="noopener" @endif>
                                                            <i class="fa-solid fa-download"></i> Download
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

                    @if(count($faqs))
                        <section class="sw-faq" id="faq">
                            <h2>Frequently Asked Questions</h2>
                            @foreach($faqs as $i => $faq)
                                <details @if($i === 0) open @endif>
                                    <summary>{{ $faq['q'] }}</summary>
                                    <p>{{ $faq['a'] }}</p>
                                </details>
                            @endforeach
                        </section>
                    @endif

                    <section class="sw-reviews" id="reviews">
                        <div class="sw-section-heading"><h2>User Reviews</h2><span class="review-count">{{ $item->votes }} reviews</span></div>
                        <div class="review-summary"><strong>{{ $item->rating }}</strong><span class="stars">★★★★★</span><span>Excellent</span></div>
                    </section>

                    @include('frontend.partials.ad-slot', ['slot' => 'bottom', 'size' => 'leaderboard'])
                </div>

                <aside class="sw-sidebar">
                    <div class="side-card info-card">
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
                    </div>
                    @include('frontend.partials.ad-slot', ['slot' => 'sidebar', 'size' => 'sidebar'])
                    @if($related->isNotEmpty())
                        <div class="side-card related-card">
                            <div class="side-heading">
                                <h3>Related Software</h3>
                                <a href="{{ route('filehippo.index') }}">View All <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            @foreach($related as $rel)
                                <a class="related-item" href="{{ route('filehippo.show', $rel->slug) }}">
                                    <span class="related-icon {{ $rel->icon_class }}">
                                        @if($rel->icon)
                                            <i class="{{ $rel->icon }}"></i>
                                        @else
                                            {{ $rel->icon_text }}
                                        @endif
                                    </span>
                                    <div>
                                        <strong>{{ $rel->name }}</strong>
                                        <small>★ {{ $rel->rating }}</small>
                                    </div>
                                    <b class="{{ $rel->license === 'paid' ? 'paid' : '' }}">{{ $rel->licenseLabel() }}</b>
                                </a>
                            @endforeach
                        </div>
                    @endif
                    <div class="side-ad">
                        <div class="mini-chrome">
                            <div class="sw-app-icon {{ $item->icon_class }}" style="width:49px;height:49px;font-size:22px;border-radius:12px;">
                                @if($item->icon)
                                    <i class="{{ $item->icon }}"></i>
                                @else
                                    {{ $item->icon_text }}
                                @endif
                            </div>
                        </div>
                        <h3>Download {{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                        @if($item->downloadUrl())
                            <a class="ad-btn" href="{{ $item->downloadUrl() }}" @if($item->isLocalDownload()) download @else target="_blank" rel="noopener" @endif>Download {{ $item->name }}</a>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="sw-newsletter" id="newsletter">
        <div class="container">
            <div class="newsletter-box">
                <div class="newsletter-icon"><i class="fa-solid fa-cloud-arrow-down"></i></div>
                <div class="newsletter-copy">
                    <h3>Stay Updated With the Latest Software</h3>
                    <p>Get notified about new versions, popular software and exclusive deals.</p>
                </div>
                <form method="POST" action="{{ route('newsletter.subscribe') }}">
                    @csrf
                    <input type="hidden" name="source" value="filehippo-detail">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit">Subscribe</button>
                    <label class="newsletter-agree">
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
    </section>
</main>
@endsection
