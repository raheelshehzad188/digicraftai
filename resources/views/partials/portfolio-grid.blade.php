<div class="row g-4">
    @forelse($projects as $index => $project)
        @php
            $fallback = 'project-'.(($index % 6) + 1).'.jpg';
            $imageUrl = cms_image($project->image, $fallback);
        @endphp
        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="project-card bg-light rounded h-100">
                <img src="{{ $imageUrl }}" class="img-fluid w-100 rounded-top" alt="{{ $project->title }}">
                <div class="p-4 text-center">
                    <h4 class="mb-3">{{ $project->title }}</h4>
                    @if($project->slug)
                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-secondary text-white px-4 py-2 rounded-pill">View Project</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No projects available.</p></div>
    @endforelse
</div>
