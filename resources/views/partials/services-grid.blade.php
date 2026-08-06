<div class="row g-5">
    @forelse($services as $index => $service)
        <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".{{ 3 + ($index % 4) * 2 }}s">
            <div class="bg-light rounded p-5 services-item h-100">
                <div class="d-flex" style="align-items: center; justify-content: center;">
                    <div class="mb-4 rounded-circle services-inner-icon">
                        <i class="fa {{ $service->icon ?: 'fa-spider' }} fa-3x text-primary"></i>
                    </div>
                </div>
                <h4 class="text-center">{{ $service->full_title }}</h4>
                <p class="text-center fs-5">{{ \Illuminate\Support\Str::limit($service->description, 90) }}</p>
                @if($service->slug)
                    <div class="text-center">
                        <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary border-0 rounded-pill px-4 py-3">Learn More</a>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted">No services available.</p></div>
    @endforelse
</div>
