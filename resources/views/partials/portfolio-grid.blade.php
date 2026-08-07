<div class="row g-3 g-md-5">
    @forelse($projects as $index => $project)
        @php
            $fallback = 'project-'.(($index % 6) + 1).'.jpg';
            $imageUrl = cms_image($project->image, $fallback);
        @endphp
        <div class="col-6 col-md-6 col-lg-6 col-xxl-4 wow fadeInUp" data-wow-delay=".{{ 3 + ($index % 3) * 2 }}s">
            <div class="project-item">
                <div class="project-left bg-dark"></div>
                <div class="project-right bg-dark"></div>
                <img src="{{ $imageUrl }}" class="img-fluid h-100" alt="{{ $project->title }}">
                <a href="{{ $project->slug ? route('projects.show', $project->slug) : '#' }}" class="fs-4 fw-bold text-center project-card-title">{{ $project->title }}</a>
            </div>
        </div>
    @empty
        <div class="col-12"><p class="text-muted">No projects available.</p></div>
    @endforelse
</div>
