<div class="row g-5 justify-content-center">
    @forelse($blogs as $index => $blog)
        <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="blog-item position-relative bg-light rounded">
                <img src="{{ cms_image($blog->image, 'blog-'.(($index % 3) + 1).'.jpg') }}" class="img-fluid w-100 rounded-top" alt="{{ $blog->title }}">
                @if($blog->category)
                    <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">{{ $blog->category }}</span>
                @endif
                <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: -75px;">
                    <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn text-white">{{ $readMoreText ?? 'Read More' }}</a>
                    </div>
                    <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill">
                        <div class="blog-icon-1">
                            <p class="text-white px-2">{{ $shareLabel ?? 'Share' }}<i class="fa fa-arrow-right ms-3"></i></p>
                        </div>
                        <div class="blog-icon-2">
                            @if($settings->facebook)<a href="{{ $settings->facebook }}" class="btn me-1" target="_blank"><i class="fab fa-facebook-f text-white"></i></a>@endif
                            @if($settings->twitter)<a href="{{ $settings->twitter }}" class="btn me-1" target="_blank"><i class="fab fa-twitter text-white"></i></a>@endif
                            @if($settings->instagram)<a href="{{ $settings->instagram }}" class="btn me-1" target="_blank"><i class="fab fa-instagram text-white"></i></a>@endif
                        </div>
                    </div>
                </div>
                <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                    <img src="{{ cms_image($blog->author_image, 'admin.jpg') }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="{{ $blog->author }}" style="width:70px;height:70px;object-fit:cover;">
                    <h5>By {{ $blog->author }}</h5>
                    <span class="text-secondary">{{ optional($blog->published_at)->format('d F Y') }}</span>
                    <p class="py-2">{{ $blog->excerpt }}</p>
                </div>
                <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>{{ $blog->shares_count }} Share</small></a>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>{{ $blog->comments_count }} Comments</small></a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No blog posts yet.</p></div>
    @endforelse
</div>
