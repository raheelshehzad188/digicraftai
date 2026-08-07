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
        $bannerBg = asset('assets/img/carousel-1.jpg');
    }
@endphp
<div
    class="container-fluid page-header py-5"
    style="background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url('{{ $bannerBg }}') center center no-repeat; background-size: cover;"
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

@php $aboutForFacts = \App\Models\HomeSection::query()->where('key', 'about')->first(); @endphp
@if($aboutForFacts?->is_visible)
    @php
        $facts = $aboutForFacts->extra['facts'] ?? [
            ['value' => $aboutForFacts->extra['years'] ?? 99, 'label' => $aboutForFacts->extra['years_label'] ?? 'Happy Customers'],
            ['value' => 25, 'label' => 'Successful Projects'],
            ['value' => 120, 'label' => 'Clients Worldwide'],
            ['value' => 5, 'label' => 'Star Reviews'],
        ];
    @endphp
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row">
                @foreach($facts as $fi => $fact)
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".{{ 1 + $fi * 2 }}s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value">{{ (int) ($fact['value'] ?? 0) }}</h1>
                            <h5 class="text-white mt-1">{{ $fact['label'] ?? '' }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
