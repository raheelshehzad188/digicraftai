<div class="row g-4 justify-content-center">
    @forelse($blogs as $index => $blog)
        @php $imageUrl = cms_image($blog->image, 'blog-'.(($index % 3) + 1).'.jpg'); @endphp
        <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="blog-item position-relative bg-light rounded h-100">
                <img src="{{ $imageUrl }}" class="img-fluid w-100 rounded-top" alt="{{ $blog->title }}" style="height:220px;object-fit:cover;">
                <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">Blog</span>
                <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: -75px;">
                    <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn text-white">Read More</a>
                    </div>
                </div>
                <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                    <img src="{{ asset('assets/img/admin.jpg') }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="" style="width:70px;height:70px;object-fit:cover;">
                    <h5 class="">{{ $blog->title }}</h5>
                    <span class="text-secondary">By {{ $blog->author }} · {{ optional($blog->published_at)->format('d M Y') }}</span>
                    <p class="py-2">{{ \Illuminate\Support\Str::limit($blog->excerpt, 100) }}</p>
                </div>
                <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>Share</small></a>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>{{ $blog->comments_count ?? 0 }} Comments</small></a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No blog posts yet.</p></div>
    @endforelse
</div>
