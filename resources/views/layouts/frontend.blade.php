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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: {{ $settings->primary_color ?? '#1842b6' }};
            --secondary: {{ $settings->secondary_color ?? '#26d48c' }};
            --dark: {{ $settings->dark_color ?? '#000103' }};
            --menu-text: {{ $settings->menu_text_color ?? '#FFFFFF' }};
            --menu-hover: {{ $settings->menu_hover_color ?? ($settings->secondary_color ?? '#26d48c') }};
            --bs-primary: {{ $settings->primary_color ?? '#1842b6' }};
            --bs-secondary: {{ $settings->secondary_color ?? '#26d48c' }};
        }
        .bg-primary { background-color: {{ $settings->primary_color ?? '#1842b6' }} !important; }
        .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
            background-color: {{ $settings->primary_color ?? '#1842b6' }} !important;
            border-color: {{ $settings->primary_color ?? '#1842b6' }} !important;
            color: #fff !important;
        }
        .text-primary { color: {{ $settings->primary_color ?? '#1842b6' }} !important; }
        .border-primary { border-color: {{ $settings->primary_color ?? '#1842b6' }} !important; }
        .bg-secondary { background-color: {{ $settings->secondary_color ?? '#26d48c' }} !important; }
        .btn-secondary, .btn-secondary:hover {
            background-color: {{ $settings->secondary_color ?? '#26d48c' }} !important;
            border-color: {{ $settings->secondary_color ?? '#26d48c' }} !important;
            color: #fff !important;
        }
        .text-secondary { color: {{ $settings->secondary_color ?? '#26d48c' }} !important; }
        .bg-dark { background-color: {{ $settings->dark_color ?? '#000103' }} !important; }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1030;
        }
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
            background: rgba(0,0,0,.05);
        }

        /* LiveBits preloader */
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

        /* Extra section cards for CMS collections */
        .project-card img { height: 260px; object-fit: cover; }
        .project-card { overflow: hidden; transition: transform .3s ease; }
        .project-card:hover { transform: translateY(-6px); }
        .pricing-item .pricing-head { border-bottom: 1px solid rgba(0,0,0,.08); }
        .team-card img { height: 280px; object-fit: cover; }
        .team-card { overflow: hidden; transition: transform .3s ease; }
        .team-card:hover { transform: translateY(-6px); }
        .testimonial-item .testimonial-content { background: #f8f9fa; min-height: 140px; }
        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            width: 42px; height: 42px; border-radius: 50% !important;
            background: var(--secondary) !important; color: #fff !important;
        }
    </style>
    @stack('styles')
</head>
<body>
    {{-- LiveBits Lottie preloader --}}
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

    <div class="site-header">
        {{-- Topbar --}}
        <div class="container-fluid bg-dark py-2 d-none d-md-flex">
            <div class="container">
                <div class="d-flex justify-content-between topbar">
                    <div class="top-info">
                        @if($settings->address)
                            <small class="me-3 text-white-50"><i class="fas fa-map-marker-alt me-2 text-secondary"></i>{{ $settings->address }}</small>
                        @endif
                        @if($settings->email)
                            <small class="me-3 text-white-50"><a href="mailto:{{ $settings->email }}" class="text-white-50"><i class="fas fa-envelope me-2 text-secondary"></i>{{ $settings->email }}</a></small>
                        @endif
                    </div>
                    @if($settings->tagline)
                        <div id="note" class="text-secondary d-none d-xl-flex"><small>{{ $settings->tagline }}</small></div>
                    @endif
                    <div class="top-link">
                        @if($settings->facebook)<a href="{{ $settings->facebook }}" target="_blank" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>@endif
                        @if($settings->twitter)<a href="{{ $settings->twitter }}" target="_blank" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-twitter text-primary"></i></a>@endif
                        @if($settings->instagram)<a href="{{ $settings->instagram }}" target="_blank" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-primary"></i></a>@endif
                        @if($settings->linkedin)<a href="{{ $settings->linkedin }}" target="_blank" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>@endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Navbar --}}
        <div class="container-fluid bg-primary">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-lg py-0">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        @if($settings->logo)
                            <img src="{{ asset('storage/'.$settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height:52px">
                        @else
                            @php
                                $name = trim($settings->site_name);
                                $parts = preg_split('/\s+/', $name, 2);
                            @endphp
                            <h1 class="text-white fw-bold d-block mb-0">
                                {{ $parts[0] ?? $name }}@if(!empty($parts[1]))<span class="text-secondary">{{ $parts[1] }}</span>@endif
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
                                <a href="tel:{{ $settings->phone }}" class="position-relative animated tada infinite">
                                    <i class="fa fa-phone-alt text-white fa-2x"></i>
                                    <div class="position-absolute" style="top: -7px; left: 20px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column pe-4 border-end">
                                <span class="text-white-50">Have any questions?</span>
                                <span class="text-secondary">Call: {{ $settings->phone }}</span>
                            </div>
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    {{-- Footer --}}
    <div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
        <div class="container pt-5 pb-4">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('home') }}">
                        @if($settings->logo)
                            <img src="{{ asset('storage/'.$settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height:48px;filter:brightness(0) invert(1)">
                        @else
                            @php
                                $name = trim($settings->site_name);
                                $parts = preg_split('/\s+/', $name, 2);
                            @endphp
                            <h1 class="text-white fw-bold d-block">{{ $parts[0] ?? $name }}@if(!empty($parts[1]))<span class="text-secondary">{{ $parts[1] }}</span>@endif</h1>
                        @endif
                    </a>
                    <p class="mt-4 text-light">{{ $settings->footer_about }}</p>
                    <div class="d-flex hightech-link">
                        @if($settings->facebook)<a href="{{ $settings->facebook }}" target="_blank" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-facebook-f text-primary"></i></a>@endif
                        @if($settings->twitter)<a href="{{ $settings->twitter }}" target="_blank" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-twitter text-primary"></i></a>@endif
                        @if($settings->instagram)<a href="{{ $settings->instagram }}" target="_blank" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i class="fab fa-instagram text-primary"></i></a>@endif
                        @if($settings->linkedin)<a href="{{ $settings->linkedin }}" target="_blank" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>@endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Quick Links</a>
                    <div class="mt-4 d-flex flex-column short-link">
                        @foreach($menuItems->take(6) as $item)
                            @if($item->children->where('is_active', true)->isEmpty())
                                <a href="{{ $item->href }}" class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>{{ $item->label }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Newsletter</a>
                    <p class="mt-4 text-light">{{ $settings->newsletter_text }}</p>
                    <form action="{{ route('newsletter.store') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="position-relative w-100">
                            <input class="form-control border-0 py-3 ps-4 pe-5" type="email" name="email" placeholder="Your Email" required>
                            <button type="submit" class="btn btn-secondary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('contact') }}" class="h3 text-secondary">Contact Us</a>
                    <div class="text-white mt-4 d-flex flex-column contact-link">
                        @if($settings->address)
                            <span class="pb-3 text-light border-bottom border-primary"><i class="fas fa-map-marker-alt text-secondary me-2"></i>{{ $settings->address }}</span>
                        @endif
                        @if($settings->phone)
                            <a href="tel:{{ $settings->phone }}" class="py-3 text-light border-bottom border-primary"><i class="fas fa-phone-alt text-secondary me-2"></i>{{ $settings->phone }}</a>
                        @endif
                        @if($settings->email)
                            <a href="mailto:{{ $settings->email }}" class="py-3 text-light border-bottom border-primary"><i class="fas fa-envelope text-secondary me-2"></i>{{ $settings->email }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <hr class="text-light mt-5 mb-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <span class="text-light"><a href="{{ route('home') }}" class="text-secondary"><i class="fas fa-copyright text-secondary me-2"></i>{{ $settings->site_name }}</a>, {{ $settings->copyright_text ?: 'All rights reserved.' }}</span>
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
