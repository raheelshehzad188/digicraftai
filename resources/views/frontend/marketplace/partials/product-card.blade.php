@php
    $productUrl = route('marketplace.show', $product);
@endphp
<article class="mp-product">
    <a href="{{ $productUrl }}" class="mp-product-img">
        <img class="mp-real-product" src="{{ $product->imageUrl() }}" alt="{{ $product->title }}">
    </a>
    <div class="mp-product-body">
        <a href="{{ $productUrl }}" class="mp-product-link">
            <div class="mp-product-cat">{{ $product->category?->name ?? 'Digital Product' }}</div>
            <h3>{{ $product->title }}</h3>
            <div class="mp-product-meta">
                @if($product->short_description)
                    <span>{{ \Illuminate\Support\Str::limit($product->short_description, 48) }}</span>
                @endif
            </div>
        </a>
        <div class="mp-price-row">
            <a href="{{ $productUrl }}" class="mp-price">
                {{ $product->displayPrice() }}
                @if($product->regularPrice())
                    <s>{{ $product->regularPrice() }}</s>
                @endif
            </a>
            <span class="mp-actions">
                <a href="{{ $productUrl }}" aria-label="View product" class="mp-icon-btn"><i class="fa-regular fa-heart"></i></a>
                <a href="{{ $productUrl }}" aria-label="View product" class="mp-icon-btn cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </span>
        </div>
    </div>
</article>
