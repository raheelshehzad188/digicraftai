<div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".3s">
    @forelse($testimonials as $index => $testimonial)
        @php $imageUrl = cms_image($testimonial->image, 'testimonial-'.(($index % 4) + 1).'.jpg'); @endphp
        <div class="testimonial-item px-2">
            <div class="testimonial-content rounded mb-4 p-4">
                <p class="fs-5 m-0">{{ $testimonial->content }}</p>
            </div>
            <div class="d-flex align-items-center mb-4" style="padding: 0 0 0 25px;">
                <div class="position-relative">
                    <img src="{{ $imageUrl }}" class="img-fluid rounded-circle py-2" alt="{{ $testimonial->name }}" style="width:80px;height:80px;object-fit:cover;">
                    <div class="position-absolute" style="top: 33px; left: -25px;">
                        <i class="fa fa-quote-left rounded-pill bg-secondary text-white p-3"></i>
                    </div>
                </div>
                <div class="ms-3">
                    <h4 class="mb-0">{{ $testimonial->name }}</h4>
                    <p class="mb-1 text-secondary">{{ $testimonial->profession }}</p>
                    <div class="d-flex">
                        @for($i = 0; $i < 5; $i++)
                            <small class="fas fa-star text-secondary me-1"></small>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center"><p class="text-muted">No testimonials yet.</p></div>
    @endforelse
</div>
