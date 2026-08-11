@php
    $bg = !empty($cta->extra['background_image'] ?? null)
        ? cms_image($cta->extra['background_image'])
        : asset('assets/img/background.jpg');
@endphp
<div
    class="container-fluid py-5 wow fadeIn"
    data-wow-delay=".3s"
    style="background-image: linear-gradient(rgba(24, 66, 182, .85), rgba(24, 66, 182, .85)), url('{{ $bg }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;"
>
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <img src="{{ cms_image($cta->image, 'action.jpg') }}" class="img-fluid w-100 rounded" alt="">
            </div>
            <div class="col-lg-6">
                <h1 class="text-white mb-3">{{ $cta->title }}</h1>
                @if(!empty($cta->content))
                    <div class="text-white mb-4">{!! cms_html($cta->content) !!}</div>
                @endif
                <form method="post" action="{{ route('newsletter.store') }}" class="js-newsletter-form">
                    @csrf
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <input type="email" class="form-control border-0 py-3 px-4" name="email" placeholder="Enter Your Email Address" required>
                        <input type="hidden" name="_form" value="cta_newsletter">
                        <button type="submit" class="btn btn-secondary text-white px-5 py-3 rounded-pill">{{ $cta->button_text ?: 'Subscribe' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
