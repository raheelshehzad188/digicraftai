<div class="row g-4">
    @forelse($pricingPlans as $index => $plan)
        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{ 3 + $index * 2 }}s">
            <div class="pricing-item bg-light rounded h-100 overflow-hidden {{ $plan->is_featured ? 'border border-secondary border-3' : '' }}">
                <div class="pricing-head {{ $plan->is_featured ? 'bg-secondary' : 'bg-primary' }} py-4 text-center">
                    <h3 class="text-white mb-0">{{ $plan->name }}</h3>
                </div>
                <div class="p-4 text-center">
                    <h1 class="mb-2 text-primary">
                        {{ $plan->currency }}{{ number_format($plan->price, 0) }}
                        <span class="fs-5 fw-normal text-muted">{{ $plan->period }}</span>
                    </h1>
                    @if($plan->tagline)<p class="mb-4">{{ $plan->tagline }}</p>@endif
                    @foreach(($plan->features ?? []) as $feature)
                        @php $excluded = str_starts_with($feature, '-'); $label = ltrim($feature, '-'); @endphp
                        <p class="mb-2">
                            <i class="fa {{ $excluded ? 'fa-times text-danger' : 'fa-check text-secondary' }} me-2"></i>
                            {{ $label }}
                        </p>
                    @endforeach
                    <a href="{{ $plan->button_url ?: route('contact') }}" class="btn {{ $plan->is_featured ? 'btn-secondary' : 'btn-primary' }} text-white rounded-pill px-4 py-3 mt-3">
                        {{ $plan->button_text ?: 'Get Started' }}
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No pricing plans available.</p></div>
    @endforelse
</div>
