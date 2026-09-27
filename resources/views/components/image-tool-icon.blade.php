@props(['name'])
<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
    @switch($name)
        @case('compress')
            <path d="M8 3H5a2 2 0 0 0-2 2v3M16 3h3a2 2 0 0 1 2 2v3M8 21H5a2 2 0 0 1-2-2v-3M16 21h3a2 2 0 0 0 2-2v-3M9 12h6"/>
            @break
        @case('resize')
            <path d="M4 9V5a1 1 0 0 1 1-1h4M20 9V5a1 1 0 0 0-1-1h-4M4 15v4a1 1 0 0 0 1 1h4M20 15v4a1 1 0 0 1-1 1h-4"/>
            @break
        @case('crop')
            <path d="M6 3v12a2 2 0 0 0 2 2h12M3 6h12a2 2 0 0 1 2 2v12"/>
            @break
        @case('jpg')
            <path d="M5 4h10l4 4v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1zM15 4v4h4M8 15l2-2 2 2 3-3"/>
            @break
        @case('edit')
            <path d="M4 20h4l10-10-4-4L4 16v4zM13 7l4 4"/>
            @break
        @case('meme')
            <circle cx="12" cy="12" r="8"/>
            <path d="M9 10h.01M15 10h.01M8.5 14.5c1 .9 2.2 1.3 3.5 1.3s2.5-.4 3.5-1.3"/>
            @break
        @case('html')
            <path d="M8 8l-3 4 3 4M16 8l3 4-3 4M13 6l-2 12"/>
            @break
        @case('gif')
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M8 15V9h3M8 12h2M14 9v6M17 9v6"/>
            @break
        @case('upscale')
            <path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5 18 18M18 6l-2.5 2.5M8.5 15.5 6 18"/>
            @break
        @case('background')
            <circle cx="12" cy="8" r="3"/>
            <path d="M6 19c1.2-3 3.2-4.5 6-4.5S16.8 16 18 19M4 4h3M4 7h2M17 4h3M18 7h2"/>
            @break
        @case('watermark')
            <rect x="4" y="5" width="16" height="14" rx="2"/>
            <path d="M8 15l2.5-3 2 2 1.5-1.5L16 15M8 9h4"/>
            @break
        @case('blur')
            <circle cx="12" cy="12" r="3"/>
            <path d="M4 12h3M17 12h3M12 4v3M12 17v3"/>
            @break
        @case('rotate')
            <path d="M20 12a8 8 0 1 1-2.3-5.6M20 4v5h-5"/>
            @break
        @case('png')
            <rect x="4" y="4" width="16" height="16" rx="2"/>
            <path d="M8 15l2.2-2.5L12 15l2-2 2 2.5"/>
            @break
        @case('webp')
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M8 15l2-6 2 6M8.6 13h2.8M14 9l2 3-2 3M16 12h2"/>
            @break
        @default
            <path d="M7 7h10v10H7zM4 10V4h6M20 14v6h-6"/>
    @endswitch
</svg>
