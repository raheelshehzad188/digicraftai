@php
    $primary = \App\Support\ImageTools::primaryNav();
@endphp
<nav class="it-mobile" aria-label="Mobile">
    <ul class="it-mobile__links">
        @foreach($primary as $tool)
            <li>
                <a href="{{ route('image-tools.show', $tool['slug']) }}"
                   @if(\App\Support\ImageTools::isCurrent($tool['slug'])) aria-current="page" @endif>
                    {{ $tool['name'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="it-acc">
        <button type="button" class="it-acc__toggle" aria-expanded="false" aria-controls="it-mobile-tools">
            Image Tools
            <i class="fas fa-angle-down" aria-hidden="true"></i>
        </button>
        <div id="it-mobile-tools" class="it-acc__panel" hidden>
            @foreach(\App\Support\ImageTools::categories() as $category)
                <div class="it-acc it-acc--nested">
                    <button type="button"
                            class="it-acc__toggle it-acc__toggle--sub"
                            aria-expanded="false"
                            aria-controls="it-mobile-{{ $category['key'] }}">
                        {{ $category['label'] }}
                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <div id="it-mobile-{{ $category['key'] }}" class="it-acc__panel" hidden>
                        @foreach($category['tools'] as $tool)
                            @include('frontend.partials.image-tool-item', ['tool' => $tool])
                        @endforeach
                    </div>
                </div>
            @endforeach
            <a class="it-mobile__all" href="{{ route('image-tools.index') }}">View all image tools</a>
        </div>
    </div>

    <div class="it-acc">
        <button type="button" class="it-acc__toggle" aria-expanded="false" aria-controls="it-mobile-more">
            More Tools
            <i class="fas fa-angle-down" aria-hidden="true"></i>
        </button>
        <div id="it-mobile-more" class="it-acc__panel" hidden>
            @forelse($headerMenu as $item)
                <a class="it-mobile__plain" href="{{ $item->href() }}">{{ $item->label }}</a>
                @foreach($item->children as $child)
                    <a class="it-mobile__plain" href="{{ $child->href() }}">{{ $child->label }}</a>
                @endforeach
            @empty
                <a class="it-mobile__plain" href="{{ route('home') }}">Home</a>
                <a class="it-mobile__plain" href="{{ route('about') }}">About</a>
                <a class="it-mobile__plain" href="{{ route('services.index') }}">Services</a>
                <a class="it-mobile__plain" href="{{ route('marketplace.index') }}">Marketplace</a>
                <a class="it-mobile__plain" href="{{ route('filehippo.index') }}">Software</a>
                <a class="it-mobile__plain" href="{{ route('blog.index') }}">Blog</a>
                <a class="it-mobile__plain" href="{{ route('contact') }}">Contact</a>
            @endforelse
        </div>
    </div>

    <div class="it-mobile__auth">
        <a href="{{ url('/admin/login') }}">Login</a>
        <a href="{{ route('contact') }}" class="it-signup">Sign up</a>
    </div>
</nav>
