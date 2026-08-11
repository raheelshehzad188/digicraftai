<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', trim(($settings->site_name ?? '').($settings->brand_accent ?? '')).' - IT Solutions')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="@yield('meta_keywords', $settings->tagline)">
    <meta name="description" content="@yield('meta_description', $settings->tagline)">
    <meta property="og:title" content="@yield('og_title', trim(($settings->site_name ?? '').($settings->brand_accent ?? '')))">
    <meta property="og:description" content="@yield('og_description', $settings->tagline)">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    @if($settings->favicon)
        <link href="{{ cms_image($settings->favicon) }}" rel="icon">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @php
        $primary = $settings->primary_color ?: '#1842b6';
        $secondary = $settings->secondary_color ?: '#26d48c';
        $dark = $settings->dark_color ?: '#000103';
        $menuText = $settings->menu_text_color ?: '#FFFFFF';
        $menuHover = $settings->menu_hover_color ?: $secondary;
        $contactBg = $settings->contact_background_image
            ? cms_image($settings->contact_background_image)
            : asset('assets/img/background.jpg');
    @endphp
    <style>
        :root {
            --bs-primary: {{ $primary }};
            --bs-secondary: {{ $secondary }};
            --bs-dark: {{ $dark }};
            --primary: {{ $primary }};
            --secondary: {{ $secondary }};
            --dark: {{ $dark }};
            --menu-text: {{ $menuText }};
            --menu-hover: {{ $menuHover }};
        }
        .bg-primary { background-color: {{ $primary }} !important; }
        .btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: {{ $primary }} !important;
            border-color: {{ $primary }} !important;
            color: #fff !important;
        }
        .text-primary { color: {{ $primary }} !important; }
        .border-primary { border-color: {{ $primary }} !important; }
        .bg-secondary { background-color: {{ $secondary }} !important; }
        .btn-secondary, .btn-secondary:hover {
            background-color: {{ $secondary }} !important;
            border-color: {{ $secondary }} !important;
            color: #fff !important;
        }
        .text-secondary { color: {{ $secondary }} !important; }
        .bg-dark { background-color: {{ $dark }} !important; }
        .contact-detail::before {
            background: linear-gradient(rgba(38, 212, 140, .9), rgba(38, 212, 140, .9)), url('{{ $contactBg }}') center/cover !important;
        }
        .contact-map, .contact-form { background: {{ $secondary }} !important; }
        .site-header { position: sticky; top: 0; z-index: 1030; }
        .site-header .navbar .navbar-nav .nav-link { color: var(--menu-text) !important; }
        .site-header .navbar .navbar-nav .nav-link:hover,
        .site-header .navbar .navbar-nav .nav-link.active,
        .site-header .navbar .navbar-nav .nav-link:focus { color: var(--menu-hover) !important; }

        @if($settings->preloader_enabled ?? true)
        .loader-wrapper {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            z-index: 100000; background: #fff;
        }
        .loader-wrapper .loader {
            display: block; position: relative; top: 50%; left: 50%;
            width: 300px; height: 300px; z-index: 100001; transform: translate(-50%, -50%);
        }
        .loaded .loader { opacity: 0; transition: all 0.3s ease-out; }
        .loaded .loader-wrapper {
            visibility: hidden; transform: translateY(-100%);
            transition: all 0.3s 0.3s ease-out;
        }
        @endif
    </style>
    @stack('styles')
</head>
<body>
    @if($settings->preloader_enabled ?? true)
    <div class="loader-wrapper">
        <div class="loader">
            <dotlottie-player
                src="https://lottie.host/f8e0b03c-545b-4e81-8e1c-d8500df41f9f/VTTcCVMYTX.lottie"
                background="transparent" speed="1"
                style="width: 300px; height: 300px" loop autoplay
            ></dotlottie-player>
        </div>
    </div>
    @endif

    <div class="site-header">
        <div class="container-fluid bg-dark py-2 d-none d-md-flex">
            <div class="container">
                <div class="d-flex justify-content-between topbar">
                    <div class="top-info">
                        @if($settings->address)
                            <small class="me-3 text-white-50"><a href="#"><i class="fas fa-map-marker-alt me-2 text-secondary"></i></a>{{ $settings->address }}</small>
                        @endif
                        @if($settings->email)
                            <small class="me-3 text-white-50"><a href="mailto:{{ $settings->email }}"><i class="fas fa-envelope me-2 text-secondary"></i></a>{{ $settings->email }}</small>
                        @endif
                    </div>
                    @if($settings->tagline)
                        <div id="note" class="text-secondary d-none d-xl-flex"><small>{{ $settings->tagline }}</small></div>
                    @endif
                    <div class="top-link">
                        @if($settings->facebook)<a href="{{ $settings->facebook }}" class="bg-light nav-fill btn btn-sm-square rounded-circle" target="_blank"><i class="fab fa-facebook-f text-primary"></i></a>@endif
                        @if($settings->twitter)<a href="{{ $settings->twitter }}" class="bg-light nav-fill btn btn-sm-square rounded-circle" target="_blank"><i class="fab fa-twitter text-primary"></i></a>@endif
                        @if($settings->instagram)<a href="{{ $settings->instagram }}" class="bg-light nav-fill btn btn-sm-square rounded-circle" target="_blank"><i class="fab fa-instagram text-primary"></i></a>@endif
                        @if($settings->linkedin)<a href="{{ $settings->linkedin }}" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0" target="_blank"><i class="fab fa-linkedin-in text-primary"></i></a>@endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-primary">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-lg py-0">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        @if($settings->logo)
                            <img src="{{ cms_image($settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height:52px">
                        @else
                            <h1 class="text-white fw-bold d-block mb-0">
                                {{ $settings->site_name }}@if($settings->brand_accent)<span class="text-secondary">{{ $settings->brand_accent }}</span>@endif
                            </h1>
                        @endif
                    </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                        <div class="navbar-nav ms-auto mx-xl-auto p-0">
                            @foreach($menuItems as $item)
                                @php
                                    $activeChildren = $item->children->where('is_active', true);
                                    $isActive = $activeChildren->isNotEmpty()
                                        ? $activeChildren->contains(fn ($child) => menu_is_active($child))
                                        : menu_is_active($item);
                                @endphp
                                @if($activeChildren->isNotEmpty())
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle {{ $isActive ? 'active text-secondary' : '' }}" data-bs-toggle="dropdown">{{ $item->label }}</a>
                                        <div class="dropdown-menu m-0 bg-light">
                                            @foreach($activeChildren as $child)
                                                <a href="{{ $child->href }}" class="dropdown-item {{ menu_is_active($child) ? 'active' : '' }}" target="{{ $child->target }}">{{ $child->label }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $item->href }}" class="nav-item nav-link {{ $isActive ? 'active text-secondary' : '' }}" target="{{ $item->target }}">{{ $item->label }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @if($settings->phone)
                        <div class="d-none d-xl-flex flex-shrink-0">
                            <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}" class="position-relative animated tada infinite">
                                    <i class="fa fa-phone-alt text-white fa-2x"></i>
                                    <div class="position-absolute" style="top: -7px; left: 20px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column pe-4 border-end">
                                <span class="text-white-50">{{ $settings->phone_cta_label ?: 'Have any questions?' }}</span>
                                <span class="text-secondary">Call: {{ $settings->phone }}</span>
                            </div>
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
        <div class="container pt-5 pb-4">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('home') }}">
                        @if($settings->logo)
                            <img src="{{ cms_image($settings->logo) }}" alt="" style="max-height:48px;filter:brightness(0) invert(1)">
                        @else
                            <h1 class="text-white fw-bold d-block">{{ $settings->site_name }}@if($settings->brand_accent)<span class="text-secondary">{{ $settings->brand_accent }}</span>@endif</h1>
                        @endif
                    </a>
                    <p class="mt-4 text-light">{{ $settings->footer_about }}</p>
                    <div class="d-flex hightech-link">
                        @if($settings->facebook)<a href="{{ $settings->facebook }}" class="btn-light nav-fill btn btn-square rounded-circle me-2" target="_blank"><i class="fab fa-facebook-f text-primary"></i></a>@endif
                        @if($settings->twitter)<a href="{{ $settings->twitter }}" class="btn-light nav-fill btn btn-square rounded-circle me-2" target="_blank"><i class="fab fa-twitter text-primary"></i></a>@endif
                        @if($settings->instagram)<a href="{{ $settings->instagram }}" class="btn-light nav-fill btn btn-square rounded-circle me-2" target="_blank"><i class="fab fa-instagram text-primary"></i></a>@endif
                        @if($settings->linkedin)<a href="{{ $settings->linkedin }}" class="btn-light nav-fill btn btn-square rounded-circle me-0" target="_blank"><i class="fab fa-linkedin-in text-primary"></i></a>@endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Short Link</a>
                    <div class="mt-4 d-flex flex-column short-link">
                        @foreach($menuItems as $item)
                            @if($item->children->where('is_active', true)->isEmpty())
                                <a href="{{ $item->href }}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>{{ $item->label }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Help Link</a>
                    <div class="mt-4 d-flex flex-column help-link">
                        @foreach(($settings->footer_help_links ?? []) as $link)
                            <a href="{{ $link['url'] ?? '#' }}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>{{ $link['label'] ?? '' }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('contact') }}" class="h3 text-secondary">Contact Us</a>
                    <div class="text-white mt-4 d-flex flex-column contact-link">
                        @if($settings->address)
                            <a href="{{ $settings->contact_map_link ?: '#' }}" class="pb-3 text-light border-bottom border-primary" target="_blank"><i class="fas fa-map-marker-alt text-secondary me-2"></i>{{ $settings->address }}</a>
                        @endif
                        @if($settings->phone)
                            <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}" class="py-3 text-light border-bottom border-primary"><i class="fas fa-phone-alt text-secondary me-2"></i>{{ $settings->phone }}</a>
                        @endif
                        @if($settings->email)
                            <a href="mailto:{{ $settings->email }}" class="py-3 text-light border-bottom border-primary"><i class="fas fa-envelope text-secondary me-2"></i>{{ $settings->email }}</a>
                        @endif
                    </div>
                </div>
            </div>

            @if($settings->newsletter_enabled ?? true)
                <hr class="text-light mt-5 mb-4">
                <div class="row g-4 align-items-center" id="footer-newsletter">
                    <div class="col-lg-5">
                        <h3 class="text-secondary mb-2">{{ $settings->newsletter_title ?: 'Newsletter' }}</h3>
                        @if($settings->newsletter_text)
                            <p class="text-light mb-0">{{ $settings->newsletter_text }}</p>
                        @endif
                    </div>
                    <div class="col-lg-7">
                        @if(session('newsletter_success'))
                            <div class="alert alert-success py-2 mb-3">{{ session('newsletter_success') }}</div>
                        @endif
                        @if($errors->has('email') && old('_form') === 'footer_newsletter')
                            <div class="alert alert-danger py-2 mb-3">{{ $errors->first('email') }}</div>
                        @endif
                        <form method="post" action="{{ route('newsletter.store') }}" class="d-flex flex-column flex-sm-row gap-2">
                            @csrf
                            <input type="hidden" name="_form" value="footer_newsletter">
                            <input
                                type="email"
                                name="email"
                                class="form-control border-0 py-3 px-4"
                                value="{{ old('_form') === 'footer_newsletter' ? old('email') : '' }}"
                                placeholder="{{ $settings->newsletter_placeholder ?: 'Enter Your Email Address' }}"
                                required
                            >
                            <button type="submit" class="btn btn-secondary text-white px-5 py-3 rounded-pill flex-shrink-0">
                                {{ $settings->newsletter_button_text ?: 'Subscribe' }}
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <hr class="text-light mt-5 mb-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <span class="text-light">
                        <a href="{{ route('home') }}" class="text-secondary"><i class="fas fa-copyright text-secondary me-2"></i>{{ trim(($settings->site_name ?? '').($settings->brand_accent ?? '')) }}</a>, {{ $settings->copyright_text }}
                    </span>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="text-light">Designed By <a href="https://htmlcodex.com" class="text-secondary">HTML Codex</a></span>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @if($settings->preloader_enabled ?? true)
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module" defer></script>
    <script>
        window.addEventListener('load', function () {
            setTimeout(function () { document.body.classList.add('loaded'); }, 3000);
        });
    </script>
    @endif
    @stack('scripts')
</body>
</html>
