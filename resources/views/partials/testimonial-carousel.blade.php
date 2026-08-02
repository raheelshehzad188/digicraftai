<div class="owl-carousel testimonial-carousel">
    @forelse($testimonials as $index => $testimonial)
        @php $imageUrl = cms_image($testimonial->image, 'testimonial-'.(($index % 4) + 1).'.jpg'); @endphp
        <div class="testimonial-item position-relative text-center rounded p-4">
            <img class="img-fluid rounded mx-auto my-4" src="{{ $imageUrl }}" alt="{{ $testimonial->name }}">
            <h5 class="text-uppercase">{{ $testimonial->name }}</h5>
            <p class="text-uppercase">{{ $testimonial->profession }}</p>
            <p class="text-secondary">{{ $testimonial->content }}</p>
        </div>
    @empty
        <div class="text-center w-100">
            <p class="text-muted">No testimonials available at the moment.</p>
        </div>
    @endforelse
</div>
