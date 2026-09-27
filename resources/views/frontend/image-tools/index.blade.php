@extends('layouts.frontend')

@section('content')
    <section class="it-index">
        <div class="container">
            <nav class="it-crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span>Image Tools</span>
            </nav>
            <div class="it-index__head">
                <h1>All Image Tools</h1>
                <p>Access all image editing, optimization, conversion and creation tools in one place.</p>
            </div>

            @foreach($categories as $category)
                <div class="it-index__group">
                    <h2>{{ $category['label'] }}</h2>
                    <div class="it-index__grid">
                        @foreach($category['tools'] as $tool)
                            @include('frontend.partials.image-tool-item', ['tool' => $tool])
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
