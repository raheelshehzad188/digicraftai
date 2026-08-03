@extends('layouts.frontend')

@section('title', $member->name.' - '.$settings->site_name)

@section('content')
    @include('partials.page-header', [
        'title' => $member->name,
        'parent' => ['label' => 'Team', 'route' => 'team'],
    ])

    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row align-items-start">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    @php $imageUrl = cms_image($member->image, 'team-1.jpg'); @endphp
                    <div class="team-item rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ $imageUrl }}" alt="{{ $member->name }}">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h1 class="display-4 text-uppercase mb-2">{{ $member->name }}</h1>
                    @if($member->designation)
                        <h5 class="text-uppercase text-primary mb-4">{{ $member->designation }}</h5>
                    @endif
                    @if($member->bio)
                        <p class="mb-4">{{ $member->bio }}</p>
                    @endif
                    @if($member->content)
                        <div class="mb-4">{!! $member->content !!}</div>
                    @endif
                    <div class="d-flex align-items-center mb-4">
                        @if($member->twitter)
                            <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($member->facebook)
                            <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($member->linkedin)
                            <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($member->instagram)
                            <a class="btn btn-lg btn-primary btn-lg-square" href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                    <a href="{{ route('contact') }}" class="btn btn-primary text-uppercase py-3 px-5">Contact Us</a>
                    <a href="{{ route('team') }}" class="btn btn-dark text-uppercase py-3 px-5 ml-2">All Team</a>
                </div>
            </div>
        </div>
    </div>

    @if($related->isNotEmpty())
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h2 class="display-4 text-uppercase text-center mb-5">Other Team Members</h2>
                @include('partials.team-carousel', ['teams' => $related])
            </div>
        </div>
    @endif
@endsection
