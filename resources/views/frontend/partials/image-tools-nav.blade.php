@php
    $primary = \App\Support\ImageTools::primaryNav();
    $onIndex = request()->routeIs('image-tools.index');
@endphp
<ul class="it-nav">
    @foreach($primary as $tool)
        <li class="{{ \App\Support\ImageTools::isCurrent($tool['slug']) ? 'is-active' : '' }}">
            <a href="{{ route('image-tools.show', $tool['slug']) }}"
               @if(\App\Support\ImageTools::isCurrent($tool['slug'])) aria-current="page" @endif>
                {{ $tool['name'] }}
            </a>
        </li>
    @endforeach
    <li class="it-nav__mega {{ $onIndex ? 'is-active' : '' }}">
        <button type="button"
                class="it-nav__trigger"
                id="image-tools-trigger"
                data-mega-trigger
                aria-expanded="false"
                aria-controls="image-tools-mega"
                aria-haspopup="true">
            Image Tools
            <i class="fas fa-angle-down" aria-hidden="true"></i>
        </button>
    </li>
    <li class="it-nav__more">
        <button type="button"
                class="it-nav__trigger"
                id="more-tools-trigger"
                data-more-trigger
                aria-expanded="false"
                aria-controls="more-tools-menu"
                aria-haspopup="true">
            More Tools
            <i class="fas fa-angle-down" aria-hidden="true"></i>
        </button>
        <div class="it-more" id="more-tools-menu" role="menu" hidden inert aria-hidden="true">
            @forelse($headerMenu as $item)
                <a role="menuitem" href="{{ $item->href() }}">{{ $item->label }}</a>
                @foreach($item->children as $child)
                    <a role="menuitem" href="{{ $child->href() }}">{{ $child->label }}</a>
                @endforeach
            @empty
                <a role="menuitem" href="{{ route('home') }}">Home</a>
                <a role="menuitem" href="{{ route('about') }}">About</a>
                <a role="menuitem" href="{{ route('services.index') }}">Services</a>
                <a role="menuitem" href="{{ route('marketplace.index') }}">Marketplace</a>
                <a role="menuitem" href="{{ route('filehippo.index') }}">Software</a>
                <a role="menuitem" href="{{ route('blog.index') }}">Blog</a>
                <a role="menuitem" href="{{ route('contact') }}">Contact</a>
            @endforelse
        </div>
    </li>
</ul>
