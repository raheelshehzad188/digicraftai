@php
    use App\Models\HomeSection;
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
        $bannerBg = asset('assets/img/carousel-1.jpg');
    }

    $aboutForFacts = HomeSection::query()->where('key', 'facts')->first()
        ?? HomeSection::query()->where('key', 'about')->first();
    $facts = $aboutForFacts?->extra['facts'] ?? [];
    $factsVisible = $aboutForFacts?->is_visible ?? false;
@endphp

<div class="container-fluid page-header py-5" style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url('{{ $bannerBg }}') center center / cover no-repeat;">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $resolvedTitle }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @isset($parent)
                    <li class="breadcrumb-item"><a href="{{ route($parent['route']) }}">{{ $parent['label'] }}</a></li>
                @else
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                @endisset
                <li class="breadcrumb-item text-white" aria-current="page">{{ $crumb ?? $resolvedTitle }}</li>
            </ol>
        </nav>
    </div>
</div>

@if($factsVisible && !empty($facts) && empty($hideFacts))
    @include('partials.facts-strip', ['facts' => $facts])
@endif
