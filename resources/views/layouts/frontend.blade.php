<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', $settings->site_name)</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('meta_keywords', $settings->tagline)" name="keywords">
    <meta content="@yield('meta_description', $settings->tagline)" name="description">

    @if($settings->favicon)
        <link href="{{ asset('storage/'.$settings->favicon) }}" rel="icon">
    @else
        <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    @endif

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: {{ $settings->primary_color }};
            --secondary: {{ $settings->secondary_color }};
            --dark: {{ $settings->dark_color }};
        }
        .bg-primary { background-color: {{ $settings->primary_color }} !important; }
        .btn-primary {
            background-color: {{ $settings->primary_color }} !important;
            border-color: {{ $settings->primary_color }} !important;
            color: {{ $settings->dark_color }} !important;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: {{ $settings->dark_color }} !important;
            border-color: {{ $settings->dark_color }} !important;
            color: #fff !important;
        }
        .text-primary { color: {{ $settings->primary_color }} !important; }
        .border-primary { border-color: {{ $settings->primary_color }} !important; }
        .page-header.bg-primary { background-color: {{ $settings->primary_color }} !important; }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-white position-relative">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand text-secondary">
                @if($settings->logo)
                    <img src="{{ asset('storage/'.$settings->logo) }}" alt="{{ $settings->site_name }}" style="max-height: 60px;">
                @else
                    <h1 class="display-4 text-uppercase">{{ $settings->site_name }}</h1>
                @endif
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0 pr-3 border-right">
                    @foreach($menuItems as $item)
                        @php
                            $activeChildren = $item->children->where('is_active', true);
                            $isActive = $activeChildren->isNotEmpty()
                                ? $activeChildren->contains(fn ($child) => menu_is_active($child))
                                : menu_is_active($item);
                        @endphp
                        @if($activeChildren->isNotEmpty())
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{ $isActive ? 'active' : '' }}" data-toggle="dropdown">{{ $item->label }}</a>
                                <div class="dropdown-menu rounded-0 m-0">
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
                @if($settings->phone)
                    <div class="d-none d-lg-flex align-items-center pl-4">
                        <i class="fa fa-2x fa-mobile-alt text-primary mr-3"></i>
                        <div>
                            <h6 class="text-body text-uppercase mb-1"><small>Call Anytime</small></h6>
                            <h6 class="m-0">{{ $settings->phone }}</h6>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="m-0 mt-n2 text-white display-4">{{ $settings->site_name }}</h1>
                </a>
                <p>{{ $settings->footer_about }}</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    @if($settings->twitter)
                        <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="{{ $settings->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($settings->facebook)
                        <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="{{ $settings->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($settings->linkedin)
                        <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if($settings->instagram)
                        <a class="btn btn-lg btn-primary btn-lg-square" href="{{ $settings->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-white mb-4">Get In Touch</h4>
                <p>{{ $settings->footer_about }}</p>
                @if($settings->address)
                    <p><i class="fa fa-map-marker-alt text-white mr-2"></i>{{ $settings->address }}</p>
                @endif
                @if($settings->phone)
                    <p><i class="fa fa-phone-alt text-white mr-2"></i>{{ $settings->phone }}</p>
                @endif
                @if($settings->email)
                    <p><i class="fa fa-envelope text-white mr-2"></i>{{ $settings->email }}</p>
                @endif
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-white mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    @foreach($menuItems as $item)
                        @php $activeChildren = $item->children->where('is_active', true); @endphp
                        @if($activeChildren->isNotEmpty())
                            @foreach($activeChildren as $child)
                                <a class="text-white-50 mb-2" href="{{ $child->href }}" target="{{ $child->target }}"><i class="fa fa-angle-right text-white mr-2"></i>{{ $child->label }}</a>
                            @endforeach
                        @else
                            <a class="text-white-50 mb-2" href="{{ $item->href }}" target="{{ $item->target }}"><i class="fa fa-angle-right text-white mr-2"></i>{{ $item->label }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-white mb-4">Newsletter</h4>
                <p class="mb-4">{{ $settings->newsletter_text }}</p>
                <div class="w-100 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3" type="button">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="mb-2 text-center text-white-50">
            &copy; <a href="{{ route('home') }}" class="text-white-50">{{ $settings->site_name }}</a>.
            {{ $settings->copyright_text ?: 'All Rights Reserved.' }}
        </p>
        <p class="m-0 text-center text-white-50">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p>
    </div>
    <!-- Footer End -->

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
