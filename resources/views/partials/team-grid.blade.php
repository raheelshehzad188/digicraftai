<div class="row g-3 g-md-5">
    @forelse($teams as $index => $member)
        @php $imageUrl = cms_image($member->image, 'team-'.(($index % 4) + 1).'.jpg'); @endphp
        <div class="col-6 col-md-6 col-lg-6 col-xxl-3 wow fadeInUp" data-wow-delay=".{{ 3 + ($index % 4) * 2 }}s">
            <div class="rounded team-item">
                <a href="{{ $member->slug ? route('team.show', $member->slug) : '#' }}">
                    <img src="{{ $imageUrl }}" class="img-fluid w-100 rounded-top border border-bottom-0" alt="{{ $member->name }}">
                </a>
                <div class="team-content bg-primary text-dark text-center py-2 py-md-3 px-1">
                    <a href="{{ $member->slug ? route('team.show', $member->slug) : '#' }}" class="team-name fw-bold text-dark text-decoration-none">{{ $member->name }}</a>
                    <p class="text-muted mb-0 team-role">{{ $member->designation }}</p>
                </div>
                <div class="team-icon d-flex flex-column">
                    @if($member->facebook)<a href="{{ $member->facebook }}" class="btn btn-primary border-0 mb-2" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                    @if($member->twitter)<a href="{{ $member->twitter }}" class="btn btn-primary border-0 mb-2" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                    @if($member->instagram)<a href="{{ $member->instagram }}" class="btn btn-primary border-0 mb-2" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                    @if($member->linkedin)<a href="{{ $member->linkedin }}" class="btn btn-primary border-0" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted">No team members available.</p></div>
    @endforelse
</div>
