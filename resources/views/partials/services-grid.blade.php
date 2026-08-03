<div class="row">
    @forelse($services as $service)
        <div class="col-lg-3 mb-2">
            @if($service->slug)
                <a href="{{ route('services.show', $service->slug) }}" class="text-decoration-none text-body">
            @endif
                <div class="service-item rounded p-5 mb-4 h-100">
                    @if($service->icon)
                        <i class="fa fa-3x {{ $service->icon }} text-primary mb-4"></i>
                    @endif
                    <h4 class="text-uppercase mb-4">
                        {{ $service->title }}
                        @if($service->title_line2)
                            <span class="d-block text-body">{{ $service->title_line2 }}</span>
                        @endif
                    </h4>
                    <p class="m-0">{{ \Illuminate\Support\Str::limit($service->description, 80) }}</p>
                    @if($service->slug)
                        <span class="text-primary text-uppercase mt-3 d-inline-block">Read More</span>
                    @endif
                </div>
            @if($service->slug)
                </a>
            @endif
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted">No services available at the moment.</p>
        </div>
    @endforelse
</div>
