<div class="row g-5 justify-content-center">
    @forelse($projects as $index => $project)
        @php
            $fallback = 'project-'.(($index % 6) + 1).'.jpg';
            $imageUrl = cms_image($project->image, $fallback);
        @endphp
        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="project-item bg-light rounded h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="{{ $imageUrl }}" class="img-fluid w-100" alt="{{ $project->title }}" style="height: 260px; object-fit: cover;">
                    @if($project->category)
                        <span class="position-absolute px-3 py-2 bg-primary text-white rounded" style="top: 16px; right: 16px;">{{ $project->category->name }}</span>
                    @endif
                </div>
                <div class="p-4 text-center">
                    <h4 class="mb-2">{{ $project->title }}</h4>
                    @if($project->client)
                        <p class="text-secondary mb-3">{{ $project->client }}</p>
                    @endif
                    <p class="mb-4">{{ \Illuminate\Support\Str::limit($project->description, 90) }}</p>
                    @if($project->slug)
                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">{{ $readMoreText ?? 'View Project' }}</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted text-center">No projects available.</p></div>
    @endforelse
</div>
