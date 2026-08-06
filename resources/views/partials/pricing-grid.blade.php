<div class="row g-5">
    @forelse($pricingPlans as $index => $plan)
        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".{{ 3 + $index * 2 }}s">
            <div class="rounded bg-light pricing-item">
                <div class="{{ $plan->is_featured ? 'bg-dark' : 'bg-primary' }} py-3 px-5 text-center rounded-top border-bottom {{ $plan->is_featured ? 'border-primary' : 'border-dark' }}">
                    <h2 class="m-0 {{ $plan->is_featured ? 'text-primary' : '' }}">{{ $plan->name }}</h2>
                </div>
                <div class="px-4 py-5 text-center {{ $plan->is_featured ? 'bg-dark pricing-label pricing-featured' : 'bg-primary pricing-label' }} mb-2">
                    <h1 class="mb-0 {{ $plan->is_featured ? 'text-primary' : '' }}">
                        {{ $plan->currency }}{{ number_format($plan->price, 0) }}
                        <span class="{{ $plan->is_featured ? '' : 'text-secondary' }} fs-5 fw-normal">{{ $plan->period }}</span>
                    </h1>
                    <p class="mb-0 {{ $plan->is_featured ? 'text-white' : '' }}">{{ $plan->tagline }}</p>
                </div>
                <div class="p-4 text-center fs-5">
                    @foreach(($plan->features ?? []) as $feature)
                        @php $excluded = str_starts_with($feature, '-'); $label = ltrim($feature, '-'); @endphp
                        <p>
                            <i class="fa {{ $excluded ? 'fa-times text-danger' : 'fa-check text-success' }} me-2"></i>
                            {{ $label }}
                        </p>
                    @endforeach
                    <a href="{{ $plan->button_url ?: route('contact') }}" class="btn {{ $plan->is_featured ? 'btn-dark text-primary' : 'btn-primary' }} border-0 rounded-pill px-4 py-3 mt-3">
                        {{ $plan->button_text ?: 'Get Started' }}
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted">No pricing plans available.</p></div>
    @endforelse
</div>
