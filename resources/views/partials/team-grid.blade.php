<div class="row g-4">
    @forelse($teams as $index => $member)
        @php $imageUrl = cms_image($member->image, 'team-'.(($index % 4) + 1).'.jpg'); @endphp
        <div class="col-6 col-md-6 col-lg-3 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 4) * 2 }}s">
            <div class="team-card bg-light rounded h-100">
                <a href="{{ $member->slug ? route('team.show', $member->slug) : '#' }}">
                    <img src="{{ $imageUrl }}" class="img-fluid w-100 rounded-top" alt="{{ $member->name }}">
                </a>
                <div class="p-3 text-center">
                    <a href="{{ $member->slug ? route('team.show', $member->slug) : '#' }}" class="h5 text-dark text-decoration-none">{{ $member->name }}</a>
                    <p class="text-secondary mb-2">{{ $member->designation }}</p>
                    <div class="d-flex justify-content-center gap-2">
                        @if($member->facebook)<a href="{{ $member->facebook }}" class="btn btn-sm btn-primary btn-square rounded-circle" target="_blank"><i class="fab fa-facebook-f"></i></a>@endif
                        @if($member->twitter)<a href="{{ $member->twitter }}" class="btn btn-sm btn-primary btn-square rounded-circle" target="_blank"><i class="fab fa-twitter"></i></a>@endif
                        @if($member->instagram)<a href="{{ $member->instagram }}" class="btn btn-sm btn-primary btn-square rounded-circle" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                        @if($member->linkedin)<a href="{{ $member->linkedin }}" class="btn btn-sm btn-primary btn-square rounded-circle" target="_blank"><i class="fab fa-linkedin-in"></i></a>@endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No team members available.</p></div>
    @endforelse
</div>
