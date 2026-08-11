<div class="container-fluid bg-secondary py-5">
    <div class="container">
        <div class="row">
            @foreach($facts as $fi => $fact)
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".{{ 1 + ($fi * 2) }}s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">{{ (int) ($fact['value'] ?? 0) }}</h1>
                        <h5 class="text-white mt-1">{{ $fact['label'] ?? '' }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
