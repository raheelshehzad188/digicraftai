<div class="owl-carousel team-carousel position-relative" style="padding-left: 30px;">
    @forelse($teams as $index => $member)
        @php $imageUrl = cms_image($member->image, 'team-'.(($index % 4) + 1).'.jpg'); @endphp
        <div class="team-item rounded overflow-hidden">
            <div class="position-relative">
                <a href="{{ route('team.show', $member->slug) }}">
                    <img class="img-fluid w-100" src="{{ $imageUrl }}" alt="{{ $member->name }}">
                </a>
                <div class="team-overlay">
                    <div class="d-flex align-items-center justify-content-start">
                        <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="{{ route('team.show', $member->slug) }}" title="View profile">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if($member->twitter)
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($member->facebook)
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($member->linkedin)
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($member->instagram)
                            <a class="btn btn-lg btn-primary btn-lg-square mx-1" href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-light text-center p-4">
                <h4 class="text-uppercase">
                    <a href="{{ route('team.show', $member->slug) }}" class="text-dark">{{ $member->name }}</a>
                </h4>
                <p class="m-0">{{ $member->designation }}</p>
            </div>
        </div>
    @empty
        <div class="text-center w-100">
            <p class="text-muted">No team members available at the moment.</p>
        </div>
    @endforelse
</div>
