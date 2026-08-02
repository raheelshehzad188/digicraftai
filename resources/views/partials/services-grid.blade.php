<div class="row">
    @forelse($services as $service)
        <div class="col-lg-3 mb-2">
            <div class="service-item rounded p-5 mb-4">
                @if($service->icon)
                    <i class="fa fa-3x {{ $service->icon }} text-primary mb-4"></i>
                @endif
                <h4 class="text-uppercase mb-4">
                    {{ $service->title }}
                    @if($service->title_line2)
                        <span class="d-block text-body">{{ $service->title_line2 }}</span>
                    @endif
                </h4>
                <p class="m-0">{{ $service->description }}</p>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted">No services available at the moment.</p>
        </div>
    @endforelse
</div>
