<div class="it-mega" id="image-tools-mega" role="region" aria-labelledby="image-tools-mega-title" hidden inert aria-hidden="true">
    <div class="it-mega__panel">
        <div class="it-mega__intro">
            <span class="it-mega__badge" aria-hidden="true">
                <x-image-tool-icon name="jpg" />
            </span>
            <div>
                <h2 id="image-tools-mega-title">Image Tools</h2>
                <p>Everything you need to edit, optimize and convert images — simple, fast and free.</p>
            </div>
        </div>

        <div class="it-mega__grid">
            @foreach(\App\Support\ImageTools::categories() as $category)
                <div class="it-mega__col">
                    <p class="it-mega__label it-mega__label--{{ $category['key'] }}">{{ $category['label'] }}</p>
                    @foreach($category['tools'] as $tool)
                        @include('frontend.partials.image-tool-item', ['tool' => $tool])
                    @endforeach
                </div>
            @endforeach

            <aside class="it-mega__feature">
                <p class="it-mega__feature-kicker">Explore</p>
                <h3>All Image Tools</h3>
                <p>Access all image editing, optimization, conversion and creation tools in one place.</p>
                <div class="it-mega__art" aria-hidden="true">
                    <span class="it-mega__art-tile it-mega__art-tile--a"><x-image-tool-icon name="compress" /></span>
                    <span class="it-mega__art-tile it-mega__art-tile--b"><x-image-tool-icon name="edit" /></span>
                    <span class="it-mega__art-card">
                        <x-image-tool-icon name="jpg" />
                    </span>
                    <span class="it-mega__art-tile it-mega__art-tile--c"><x-image-tool-icon name="rotate" /></span>
                </div>
                <a class="it-mega__cta" href="{{ route('image-tools.index') }}">
                    View All Tools
                    <span aria-hidden="true">→</span>
                </a>
            </aside>
        </div>
    </div>
</div>
