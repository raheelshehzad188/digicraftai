<div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay=".5s">
    @forelse($testimonials as $index => $testimonial)
        @php $imageUrl = cms_image($testimonial->image, 'testimonial-'.(($index % 4) + 1).'.jpg'); @endphp
        <div class="testimonial-item">
            <div class="testimonial-content rounded mb-4 p-4">
                <p class="fs-5 m-0">{{ $testimonial->content }}</p>
            </div>
            <div class="d-flex align-items-center mb-4" style="padding: 0 0 0 25px;">
                <div class="position-relative">
                    <img src="{{ $imageUrl }}" class="img-fluid rounded-circle py-2" alt="{{ $testimonial->name }}">
                    <div class="position-absolute" style="top: 33px; left: -25px;">
                        <i class="fa fa-quote-left rounded-pill bg-primary text-dark p-3"></i>
                    </div>
                </div>
                <div class="ms-3">
                    <h4 class="mb-0">{{ $testimonial->name }}</h4>
                    <p class="mb-1">{{ $testimonial->profession }}</p>
                    <div class="d-flex">
                        @for($i = 0; $i < 5; $i++)
                            <small class="fas fa-star text-primary me-1"></small>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center"><p class="text-muted">No testimonials yet.</p></div>
    @endforelse
</div>
