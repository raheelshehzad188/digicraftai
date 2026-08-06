@extends('layouts.frontend')
@section('title', $blog->title.' - '.$settings->site_name)
@section('content')
    @include('partials.page-header', ['title' => $blog->title, 'parent' => ['label' => 'Blog', 'route' => 'blog']])
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <img class="img-fluid w-100 rounded mb-4" src="{{ cms_image($blog->image, 'blog-1.jpg') }}" alt="{{ $blog->title }}">
                    <div class="d-flex mb-3">
                        <span class="me-4"><i class="fa fa-user text-primary me-2"></i>{{ $blog->author }}</span>
                        <span><i class="fas fa-calendar-alt text-primary me-2"></i>{{ optional($blog->published_at)->format('d M, Y') }}</span>
                    </div>
                    <h1 class="mb-4">{{ $blog->title }}</h1>
                    <div>{!! $blog->content !!}</div>
                </div>
                <div class="col-lg-4">
                    <h4 class="mb-4">Related Posts</h4>
                    @foreach($related as $item)
                        <div class="d-flex mb-3">
                            <img src="{{ cms_image($item->image, 'blog-2.jpg') }}" class="img-fluid rounded" style="width:100px;height:80px;object-fit:cover" alt="">
                            <div class="ms-3">
                                <a href="{{ route('blog.show', $item->slug) }}" class="h6">{{ $item->title }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
