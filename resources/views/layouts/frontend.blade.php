<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', $settings->site_name)</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="@yield('meta_keywords', $settings->tagline)">
    <meta name="description" content="@yield('meta_description', $settings->tagline)">
    <meta property="og:title" content="@yield('og_title', $settings->site_name)">
    <meta property="og:description" content="@yield('og_description', $settings->tagline)">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    @if($settings->favicon)
        <link href="{{ asset('storage/'.$settings->favicon) }}" rel="icon">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: {{ $settings->primary_color ?? '#FDF001' }};
            --secondary: {{ $settings->secondary_color ?? '#555555' }};
            --dark: {{ $settings->dark_color ?? '#13357B' }};
            --menu-text: {{ $settings->menu_text_color ?? '#FFFFFF' }};
            --menu-hover: {{ $settings->menu_hover_color ?? ($settings->primary_color ?? '#FDF001') }};
        }
        .bg-primary, .btn-primary, .btn-primary:hover, .btn-primary:active,
        .spinner-grow.text-primary, .text-primary, .border-primary,
        .carousel-control-prev.btn-primary, .carousel-control-next.btn-primary,
        .navbar-toggler.bg-primary, .dropdown-menu.bg-primary,
        .blog-btn.bg-primary, .team-content.bg-primary, .pricing-label.bg-primary {
            --bs-primary: {{ $settings->primary_color ?? '#FDF001' }};
        }
        .bg-primary { background-color: {{ $settings->primary_color ?? '#FDF001' }} !important; }
        .btn-primary {
            background-color: {{ $settings->primary_color ?? '#FDF001' }} !important;
            border-color: {{ $settings->primary_color ?? '#FDF001' }} !important;
            color: #111 !important;
        }
        .text-primary { color: {{ $settings->primary_color ?? '#FDF001' }} !important; }
        .border-primary { border-color: {{ $settings->primary_color ?? '#FDF001' }} !important; }
        .bg-dark { background-color: {{ $settings->dark_color ?? '#13357B' }} !important; }

        /* Top menu item colors from Site Settings */
        .site-header .navbar .navbar-nav .nav-link {
            color: var(--menu-text) !important;
        }
        .site-header .navbar .navbar-nav .nav-link:hover,
        .site-header .navbar .navbar-nav .nav-link.active,
        .site-header .navbar .navbar-nav .nav-link:focus {
            color: var(--menu-hover) !important;
        }
        .site-header .navbar .dropdown-menu .dropdown-item {
            color: #111 !important;
        }
        .site-header .navbar .dropdown-menu .dropdown-item:hover,
        .site-header .navbar .dropdown-menu .dropdown-item.active {
            color: var(--menu-hover) !important;
        }

        /* LiveBits preloader (exact) */
        .loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100000;
            background: #fff;
        }
        .loader-wrapper .loader {
            display: block;
            position: relative;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 300px;
            z-index: 100001;
            transform: translate(-50%, -50%);
        }
        .loaded .loader {
            opacity: 0;
            transition: all 0.3s ease-out;
        }
        .loaded .loader-wrapper {
            visibility: hidden;
            transform: translateY(-100%);
            transition: all 0.3s 0.3s ease-out;
        }
    </style>
    @stack('styles')
</head>
<body>
    {{-- THEME PRELOADER START (LiveBits) --}}
    <div class="loader-wrapper">
        <div class="loader">
            <dotlottie-player
                src="https://lottie.host/f8e0b03c-545b-4e81-8e1c-d8500df41f9f/VTTcCVMYTX.lottie"
                background="transparent"
                speed="1"
                style="width: 300px; height: 300px"
                loop
                autoplay
            ></dotlottie-player>
        </div>
    </div>
    {{-- THEME PRELOADER END --}}

    <div class="site-header">
        <div class="container-fluid topbar-top bg-primary">
            <div class="container">
                <div class="d-flex justify-content-between topbar py-2">
                    <div class="d-flex align-items-center flex-shrink-0 topbar-info flex-wrap">
                        @if($settings->address)
                            <a href="#" class="me-4 text-secondary"><i class="fas fa-map-marker-alt me-2 text-dark"></i>{{ $settings->address }}</a>
                        @endif
                        @if($settings->phone)
                            <a href="tel:{{ $settings->phone }}" class="me-4 text-secondary"><i class="fas fa-phone-alt me-2 text-dark"></i>{{ $settings->phone }}</a>
                        @endif
                        @if($settings->email)
                            <a href="mailto:{{ $settings->email }}" class="text-secondary"><i class="fas fa-envelope me-2 text-dark"></i>{{ $settings->email }}</a>
                        @endif
                    </div>
                    <div class="d-flex align-items-center justify-content-center topbar-icon">
                        @if($settings->facebook)<a href="{{ $settings->facebook }}" class="me-4" target="_blank"><i class="fab fa-facebook-f text-dark"></i></a>@endif
                        @if($settings->twitter)<a href="{{ $settings->twitter }}" class="me-4" target="_blank"><i class="fab fa-twitter text-dark"></i></a>@endif
                        @if($settings->instagram)<a href="{{ $settings->instagram }}" class="me-4" target="_blank"><i class="fab fa-instagram text-dark"></i></a>@endif
                        @if($settings->linkedin)<a href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin-in text-dark"></i></a>@endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-dark">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-lg py-lg-0">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        @if($settings->logo)
                            <img src="{{ asset('storage/'.$settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height:55px">
                        @else
                            @php
                                $name = $settings->site_name;
                                $parts = preg_split('/\s+/', trim($name), 2);
                            @endphp
                            <h1 class="text-primary mb-0 display-5">
                                {{ $parts[0] ?? $name }}@if(!empty($parts[1]))<span class="text-white">{{ $parts[1] }}</span>@endif
                                <i class="fa fa-spider text-primary ms-2"></i>
                            </h1>
                        @endif
                    </a>
                    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-dark"></span>
                    </button>
                    <div class="collapse navbar-collapse me-n3" id="navbarCollapse">
                        <div class="navbar-nav ms-auto">
                            @foreach($menuItems as $item)
                                @php
                                    $activeChildren = $item->children->where('is_active', true);
                                    $isActive = $activeChildren->isNotEmpty()
                                        ? $activeChildren->contains(fn ($child) => menu_is_active($child))
                                        : menu_is_active($item);
                                @endphp
                                @if($activeChildren->isNotEmpty())
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle {{ $isActive ? 'active' : '' }}" data-bs-toggle="dropdown">{{ $item->label }}</a>
                                        <div class="dropdown-menu m-0 bg-primary">
                                            @foreach($activeChildren as $child)
                                                <a href="{{ $child->href }}" class="dropdown-item {{ menu_is_active($child) ? 'active' : '' }}" target="{{ $child->target }}">{{ $child->label }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $item->href }}" class="nav-item nav-link {{ $isActive ? 'active' : '' }}" target="{{ $item->target }}">{{ $item->label }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    @php
        $footerBg = $settings->footer_background_image
            ? asset('storage/'.$settings->footer_background_image)
            : asset('assets/img/carousel-2.jpg');
    @endphp
    <div
        class="container-fluid footer py-5 wow fadeIn"
        data-wow-delay=".3s"
        style="background-image: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ $footerBg }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;"
    >
        <div class="container py-5">
            <div class="row g-4 footer-inner">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-white fw-bold mb-4">{{ $settings->site_name }}</h4>
                        <p class="mb-4">{{ $settings->footer_about }}</p>
                        <div class="d-flex">
                            @if($settings->facebook)<a href="{{ $settings->facebook }}" class="btn btn-primary btn-sm-square me-3" target="_blank"><i class="fab fa-facebook-f text-dark"></i></a>@endif
                            @if($settings->twitter)<a href="{{ $settings->twitter }}" class="btn btn-primary btn-sm-square me-3" target="_blank"><i class="fab fa-twitter text-dark"></i></a>@endif
                            @if($settings->instagram)<a href="{{ $settings->instagram }}" class="btn btn-primary btn-sm-square me-3" target="_blank"><i class="fab fa-instagram text-dark"></i></a>@endif
                            @if($settings->linkedin)<a href="{{ $settings->linkedin }}" class="btn btn-primary btn-sm-square" target="_blank"><i class="fab fa-linkedin-in text-dark"></i></a>@endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-white fw-bold mb-4">Contact Us</h4>
                        @if($settings->address)<p><i class="fa fa-map-marker-alt me-2"></i>{{ $settings->address }}</p>@endif
                        @if($settings->email)<p><i class="fas fa-envelope me-2"></i>{{ $settings->email }}</p>@endif
                        @if($settings->phone)<p><i class="fas fa-phone me-2"></i>{{ $settings->phone }}</p>@endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-white fw-bold mb-4">Quick Links</h4>
                        @foreach($menuItems->take(6) as $item)
                            @if($item->children->where('is_active', true)->isEmpty())
                                <a class="btn btn-link" href="{{ $item->href }}">{{ $item->label }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-white fw-bold mb-4">Newsletter</h4>
                        <p class="mb-3">{{ $settings->newsletter_text }}</p>
                        <form action="{{ route('newsletter.store') }}" method="POST">
                            @csrf
                            <div class="position-relative w-100">
                                <input class="form-control py-3 ps-4 pe-5" type="email" name="email" placeholder="Your Email" required>
                                <button type="submit" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('home') }}">{{ $settings->site_name }}</a>, {{ $settings->copyright_text ?: 'All Rights Reserved.' }}
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed by <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-primary rounded-circle border-3 border-white back-to-top"><i class="fa fa-arrow-up text-dark"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- LiveBits preloader: Lottie player + hide after load --}}
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module" defer></script>
    <script>
        window.addEventListener('load', function () {
            setTimeout(function () {
                document.body.classList.add('loaded');
            }, 3000);
        });
    </script>
    @stack('scripts')
</body>
</html>
