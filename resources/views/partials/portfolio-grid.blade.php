@if(empty($hideFilters))
<div class="row">
    <div class="col-12 text-center mb-2">
        <ul class="list-inline mb-4" id="portfolio-flters">
            <li class="btn btn-outline-dark text-uppercase py-2 px-4 active" data-filter="*">
                <i class="fa fa-star text-primary mr-2"></i>All
            </li>
            @foreach($categories as $category)
                <li class="btn btn-outline-dark text-uppercase py-2 px-4" data-filter=".{{ $category->filter_class ?: $category->slug }}">
                    @if($category->icon)
                        <i class="fa {{ $category->icon }} text-primary mr-2"></i>
                    @endif
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="row portfolio-container">
    @forelse($projects as $index => $project)
        @php
            $filterClass = $project->category?->filter_class ?: $project->category?->slug ?: 'uncategorized';
            $fallback = 'portfolio-'.(($index % 6) + 1).'.jpg';
            $imageUrl = cms_image($project->image, $fallback);
        @endphp
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{ $filterClass }}">
            <div class="position-relative rounded overflow-hidden mb-2">
                <a href="{{ route('projects.show', $project->slug) }}">
                    <img class="img-fluid w-100" src="{{ $imageUrl }}" alt="{{ $project->title }}">
                </a>
                <div class="portfolio-btn d-flex align-items-center justify-content-center">
                    <a href="{{ route('projects.show', $project->slug) }}" title="{{ $project->title }}">
                        <i class="fa fa-4x fa-plus text-primary"></i>
                    </a>
                </div>
            </div>
            <h5 class="text-uppercase mt-2 mb-0">
                <a href="{{ route('projects.show', $project->slug) }}" class="text-dark">{{ $project->title }}</a>
            </h5>
            @if($project->category)
                <small class="text-primary text-uppercase">{{ $project->category->name }}</small>
            @endif
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted">No projects available at the moment.</p>
        </div>
    @endforelse
</div>
