@php
    $detailUrl = route('filehippo.show', $item->slug);
    $licenseClass = match ($item->license) {
        'paid' => 'is-paid',
        'freemium' => 'is-freemium',
        default => 'is-free',
    };
    $licenseLabel = $item->licenseLabel();
    $tags = $item->tagList();
    $platforms = $item->platformList();
    $platformLabel = implode(' / ', $platforms) ?: 'Windows';
    $designLogo = \App\Support\SoftwareDesignAssets::logoFor($item);
@endphp
<article class="zv-soft">
    <a href="{{ $detailUrl }}" class="zv-soft-logo {{ $item->icon_class }}" aria-label="{{ $item->name }}">
        @if($item->image)
            <img src="{{ $item->imageUrl() }}" alt="{{ $item->name }}" width="80" height="80">
        @elseif($designLogo)
            <img src="{{ $designLogo }}" alt="{{ $item->name }}" width="80" height="80">
        @elseif($item->icon)
            <i class="{{ $item->icon }}"></i>
        @else
            {{ $item->icon_text }}
        @endif
    </a>
    <div class="zv-soft-info">
        <h3>
            <a href="{{ $detailUrl }}">{{ $item->name }}</a>
            @if($item->version)
                <span class="zv-ver">{{ $item->version }}</span>
            @endif
        </h3>
        <p>{{ $item->description }}</p>
        <div class="zv-tags">
            @foreach($tags as $tag)
                <span class="zv-tag">{{ $tag }}</span>
            @endforeach
            <span class="zv-tag {{ $licenseClass }}">{{ $licenseLabel }}</span>
        </div>
    </div>
    <div class="zv-soft-stats">
        <span><i class="fas fa-star"></i><b>{{ $item->rating }}</b> ({{ $item->votes }} votes)</span>
        <span><i class="fas fa-download"></i>{{ $item->downloads }} downloads</span>
        <span><i class="fab fa-windows"></i>{{ $platformLabel }}</span>
    </div>
    <div class="zv-soft-actions">
        <a class="zv-btn zv-btn-primary" href="{{ $detailUrl }}">
            <i class="fas fa-download"></i> Download
        </a>
        <a class="zv-link" href="{{ $detailUrl }}">View Details <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
