<div class="row g-5 services-inner">
    @forelse($services as $index => $service)
        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="services-item bg-light h-100">
                <div class="p-4 text-center services-content">
                    <div class="services-content-icon">
                        <i class="fa {{ $service->icon ?: 'fa-laptop' }} fa-7x mb-4 text-primary"></i>
                        <h4 class="mb-3">{{ $service->full_title }}</h4>
                        <p class="mb-4">{{ \Illuminate\Support\Str::limit($service->description, 110) }}</p>
                        @if($service->slug)
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No services available.</p></div>
    @endforelse
</div>
