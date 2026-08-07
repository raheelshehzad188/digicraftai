@php
    use App\Models\PageBanner;

    $bannerRecord = null;
    if (!empty($bannerKey)) {
        $bannerRecord = PageBanner::forKey($bannerKey);
    }

    $resolvedTitle = $title
        ?? $bannerRecord?->title
        ?? 'Page';

    if (!empty($background)) {
        $bannerBg = $background;
    } elseif ($bannerRecord?->background_image) {
        $bannerBg = $bannerRecord->background_url;
    } else {
        $bannerBg = asset('assets/img/carousel-2.jpg');
    }
@endphp
<div
    class="container-fluid page-header py-5"
    style="background-image: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ $bannerBg }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;"
>
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $resolvedTitle }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @isset($parent)
                    <li class="breadcrumb-item"><a href="{{ route($parent['route']) }}">{{ $parent['label'] }}</a></li>
                @endisset
                <li class="breadcrumb-item text-white" aria-current="page">{{ $resolvedTitle }}</li>
            </ol>
        </nav>
    </div>
</div>
