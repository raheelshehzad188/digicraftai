@php
    $detailUrl = route('filehippo.show', $item->slug);
    $licenseClass = $item->license === 'paid' ? 'paid' : 'free';
    $licenseLabel = $item->licenseLabel();
    $tags = $item->tagList();
    $platforms = $item->platformList();
@endphp
<article class="fh-software">
    <a href="{{ $detailUrl }}" class="fh-app-icon {{ $item->icon_class }}" aria-label="{{ $item->name }}">
        @if($item->image)
            <img src="{{ $item->imageUrl() }}" alt="{{ $item->name }}" style="width:100%;height:100%;object-fit:cover;border-radius:12px">
        @elseif($item->icon)
            <i class="{{ $item->icon }}"></i>
        @else
            {{ $item->icon_text }}
        @endif
    </a>
    <div>
        <div class="fh-app-name">
            <a href="{{ $detailUrl }}">{{ $item->name }}</a>
            <span class="fh-version">{{ $item->version }}</span>
        </div>
        <div class="fh-desc">{{ $item->description }}</div>
        <div class="fh-tags">
            @foreach($tags as $tag)
                <span class="fh-tag">{{ $tag }}</span>
            @endforeach
            <span class="fh-tag {{ $licenseClass }}">{{ $licenseLabel }}</span>
        </div>
    </div>
    <div class="fh-meta">
        <strong>★ {{ $item->rating }}</strong> ({{ $item->votes }} votes)<br>
        ↧ {{ $item->downloads }} downloads<br>
        <i class="fab fa-windows"></i> {{ implode(' / ', $platforms) }}
    </div>
    <div class="fh-download">
        <a class="theme-btn fh-dl-btn" href="{{ $detailUrl }}">
            <i class="fas fa-download"></i> Download
        </a>
        <a class="fh-details" href="{{ $detailUrl }}">View Details →</a>
    </div>
</article>
