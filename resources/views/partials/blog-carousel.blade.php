<div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay=".5s">
    @foreach($blogs as $index => $blog)
        @php $imageUrl = cms_image($blog->image, 'blog-'.(($index % 3) + 1).'.jpg'); @endphp
        <div class="blog-item">
            <img src="{{ $imageUrl }}" class="img-fluid w-100 rounded-top" alt="{{ $blog->title }}">
            <div class="rounded-bottom bg-light">
                <div class="d-flex justify-content-between p-4 pb-2">
                    <span class="pe-2 text-dark"><i class="fa fa-user me-2"></i>By {{ $blog->author }}</span>
                    <span class="text-dark"><i class="fas fa-calendar-alt me-2"></i>{{ optional($blog->published_at)->format('d M, Y') }}</span>
                </div>
                <div class="px-4 pb-0">
                    <h4>{{ $blog->title }}</h4>
                    <p>{{ \Illuminate\Support\Str::limit($blog->excerpt, 90) }}</p>
                </div>
                <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
                    <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary border-0">Learn More</a>
                    <span class="my-auto text-dark"><i class="fa fa-comments me-2"></i>{{ $blog->comments_count }} Comments</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
