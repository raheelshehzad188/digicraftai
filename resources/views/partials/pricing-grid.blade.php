<div class="row">
    @forelse($pricingPlans as $plan)
        <div class="col-lg-4 mb-2">
            <div class="{{ $plan->is_featured ? 'bg-dark' : 'bg-light' }} rounded text-center pt-5 {{ $plan->is_featured ? '' : 'mt-lg-5' }} mb-4">
                <h2 class="text-uppercase {{ $plan->is_featured ? 'text-white' : '' }}">{{ $plan->name }}</h2>
                <h6 class="text-uppercase {{ $plan->is_featured ? 'text-secondary' : 'text-body' }} mb-5">{{ $plan->tagline }}</h6>
                <div class="text-center {{ $plan->is_featured ? 'bg-primary' : 'bg-dark' }} rounded-circle p-4 mb-2">
                    <h1 class="display-4 {{ $plan->is_featured ? '' : 'text-white' }} mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">{{ $plan->currency }}</small>{{ number_format($plan->price, 0) }}<small class="align-bottom" style="font-size: 16px; line-height: 40px;">{{ $plan->period }}</small>
                    </h1>
                </div>
                <div class="text-center {{ $plan->is_featured ? 'text-secondary' : '' }} py-4">
                    @foreach($plan->features ?? [] as $feature)
                        <p>{{ $feature }}</p>
                    @endforeach
                    @if($plan->button_url)
                        <a href="{{ $plan->button_url }}" class="btn {{ $plan->is_featured ? 'btn-primary' : 'btn-dark' }} text-uppercase py-2 px-4 my-3">{{ $plan->button_text }}</a>
                    @else
                        <a href="{{ route('contact') }}" class="btn {{ $plan->is_featured ? 'btn-primary' : 'btn-dark' }} text-uppercase py-2 px-4 my-3">{{ $plan->button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted">No pricing plans available at the moment.</p>
        </div>
    @endforelse
</div>
