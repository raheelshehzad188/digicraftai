@extends('layouts.frontend')

@section('content')
    <section class="it-tool-page">
        <div class="container">
            <nav class="it-crumbs" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <a href="{{ route('image-tools.index') }}">Image Tools</a>
                <span aria-hidden="true">/</span>
                <span>{{ $tool['name'] }}</span>
            </nav>

            <div class="it-tool-hero">
                <span class="it-tool-hero__icon" style="--it-color: {{ $tool['color'] }}">
                    <x-image-tool-icon :name="$tool['icon']" />
                </span>
                <div>
                    <h1>{{ $tool['name'] }}</h1>
                    <p>{{ $tool['description'] }}</p>
                </div>
            </div>

            <div class="it-drop">
                <span class="it-tool-hero__icon" style="--it-color: {{ $tool['color'] }}">
                    <x-image-tool-icon :name="$tool['icon']" />
                </span>
                <h2>Drop your images here</h2>
                <p>or click to browse files</p>
                <button type="button" class="it-signup" disabled>Select Images</button>
                <p style="margin-top: 16px;">This tool page is ready. Image processing connects here.</p>
            </div>
        </div>
    </section>
@endsection
