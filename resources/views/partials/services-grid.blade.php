<div class="row g-5 justify-content-center">
    @forelse($services as $index => $service)
        @php
            $fallback = 'project-'.(($index % 6) + 1).'.jpg';
            $imageUrl = cms_image($service->image, $fallback);
        @endphp
        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="project-item bg-light rounded h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="{{ $imageUrl }}" class="img-fluid w-100" alt="{{ $service->full_title }}" style="height: 260px; object-fit: cover;">
                </div>
                <div class="p-4 text-center">
                    <h4 class="mb-3">{{ $service->full_title }}</h4>
                    <p class="mb-4">{{ \Illuminate\Support\Str::limit($service->description, 90) }}</p>
                    <a href="{{ $service->slug ? route('services.show', $service->slug) : '#' }}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">{{ $readMoreText ?? 'Read More' }}</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No services available.</p></div>
    @endforelse
</div>
