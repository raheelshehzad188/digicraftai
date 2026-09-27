@php
    $active = \App\Support\ImageTools::isCurrent($tool['slug']);
@endphp
<a href="{{ route('image-tools.show', $tool['slug']) }}"
   class="it-tool {{ $active ? 'is-active' : '' }}"
   @if($active) aria-current="page" @endif>
    <span class="it-tool__icon" style="--it-color: {{ $tool['color'] }}">
        <x-image-tool-icon :name="$tool['icon']" />
    </span>
    <span class="it-tool__copy">
        <span class="it-tool__name">{{ $tool['name'] }}</span>
        <span class="it-tool__desc">{{ $tool['description'] }}</span>
    </span>
</a>
