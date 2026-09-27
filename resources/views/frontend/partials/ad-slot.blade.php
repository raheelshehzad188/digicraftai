@php
    $slot = $slot ?? 'top';
    $size = $size ?? 'leaderboard';
    $showAds = $settings->adsAreEnabled();
    $code = $showAds ? $settings->adSlotHtml($slot) : null;
    $isSidebar = in_array($size, ['sidebar'], true);
    $isRectangle = in_array($size, ['rectangle'], true);
@endphp
@if($showAds)
    <div class="site-ad site-ad-{{ $slot }} site-ad-{{ $size }}" aria-label="Advertisement">
        <span class="site-ad-label">Advertisement</span>
        <div class="site-ad-box">
            @if(filled($code))
                {!! $code !!}
            @elseif($isSidebar)
                {{-- Google Medium Rectangle 300x250 --}}
                <svg class="site-ad-dummy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 250" width="300" height="250" role="img" aria-label="Advertisement 300 by 250">
                    <rect width="300" height="250" rx="8" fill="#EEF2FF"/>
                    <rect x="8" y="8" width="284" height="234" rx="6" fill="none" stroke="#C7D2FE" stroke-dasharray="6 6"/>
                    <rect x="123" y="58" width="54" height="54" rx="10" fill="#384BFF"/>
                    <text x="150" y="92" text-anchor="middle" fill="#fff" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Ad</text>
                    <text x="150" y="140" text-anchor="middle" fill="#18185E" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Advertisement</text>
                    <text x="150" y="166" text-anchor="middle" fill="#64748B" font-family="Arial, Helvetica, sans-serif" font-size="13">Google Medium Rectangle</text>
                    <text x="150" y="188" text-anchor="middle" fill="#94A3B8" font-family="Arial, Helvetica, sans-serif" font-size="12">300 × 250</text>
                </svg>
            @elseif($isRectangle)
                {{-- Google Large Rectangle 336x280 --}}
                <svg class="site-ad-dummy site-ad-dummy-desktop" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 336 280" width="336" height="280" role="img" aria-label="Advertisement 336 by 280">
                    <rect width="336" height="280" rx="8" fill="#EEF2FF"/>
                    <rect x="8" y="8" width="320" height="264" rx="6" fill="none" stroke="#C7D2FE" stroke-dasharray="6 6"/>
                    <rect x="141" y="72" width="54" height="54" rx="10" fill="#384BFF"/>
                    <text x="168" y="106" text-anchor="middle" fill="#fff" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Ad</text>
                    <text x="168" y="156" text-anchor="middle" fill="#18185E" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Advertisement</text>
                    <text x="168" y="182" text-anchor="middle" fill="#64748B" font-family="Arial, Helvetica, sans-serif" font-size="13">Google Large Rectangle</text>
                    <text x="168" y="204" text-anchor="middle" fill="#94A3B8" font-family="Arial, Helvetica, sans-serif" font-size="12">336 × 280</text>
                </svg>
                <svg class="site-ad-dummy site-ad-dummy-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 250" width="300" height="250" role="img" aria-label="Advertisement 300 by 250">
                    <rect width="300" height="250" rx="8" fill="#EEF2FF"/>
                    <rect x="8" y="8" width="284" height="234" rx="6" fill="none" stroke="#C7D2FE" stroke-dasharray="6 6"/>
                    <rect x="123" y="58" width="54" height="54" rx="10" fill="#384BFF"/>
                    <text x="150" y="92" text-anchor="middle" fill="#fff" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Ad</text>
                    <text x="150" y="140" text-anchor="middle" fill="#18185E" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Advertisement</text>
                    <text x="150" y="166" text-anchor="middle" fill="#64748B" font-family="Arial, Helvetica, sans-serif" font-size="13">Google Medium Rectangle</text>
                    <text x="150" y="188" text-anchor="middle" fill="#94A3B8" font-family="Arial, Helvetica, sans-serif" font-size="12">300 × 250</text>
                </svg>
            @else
                {{-- Google Leaderboard 728x90 / Large Mobile Banner 320x100 --}}
                <svg class="site-ad-dummy site-ad-dummy-desktop" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 728 90" width="728" height="90" role="img" aria-label="Advertisement 728 by 90">
                    <rect width="728" height="90" rx="8" fill="#EEF2FF"/>
                    <rect x="8" y="8" width="712" height="74" rx="6" fill="none" stroke="#C7D2FE" stroke-dasharray="6 6"/>
                    <rect x="16" y="18" width="54" height="54" rx="10" fill="#384BFF"/>
                    <text x="43" y="52" text-anchor="middle" fill="#fff" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Ad</text>
                    <text x="86" y="42" fill="#18185E" font-family="Arial, Helvetica, sans-serif" font-size="16" font-weight="700">Advertisement</text>
                    <text x="86" y="64" fill="#64748B" font-family="Arial, Helvetica, sans-serif" font-size="13">Google Leaderboard · 728 × 90</text>
                </svg>
                <svg class="site-ad-dummy site-ad-dummy-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 100" width="320" height="100" role="img" aria-label="Advertisement 320 by 100">
                    <rect width="320" height="100" rx="8" fill="#EEF2FF"/>
                    <rect x="6" y="6" width="308" height="88" rx="6" fill="none" stroke="#C7D2FE" stroke-dasharray="6 6"/>
                    <rect x="16" y="23" width="54" height="54" rx="10" fill="#384BFF"/>
                    <text x="43" y="56" text-anchor="middle" fill="#fff" font-family="Arial, Helvetica, sans-serif" font-size="15" font-weight="700">Ad</text>
                    <text x="82" y="48" fill="#18185E" font-family="Arial, Helvetica, sans-serif" font-size="14" font-weight="700">Advertisement</text>
                    <text x="82" y="70" fill="#64748B" font-family="Arial, Helvetica, sans-serif" font-size="11">Google 320 × 100</text>
                </svg>
            @endif
        </div>
    </div>
@endif
