@php
    $bg = !empty($cta->extra['background_image'] ?? null)
        ? asset('storage/'.$cta->extra['background_image'])
        : asset('assets/img/carousel-1.jpg');
@endphp
<div
    class="container-fluid py-5 call-to-action wow fadeInUp"
    data-wow-delay=".3s"
    style="margin: 6rem 0; background-image: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ $bg }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;"
>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <img src="{{ cms_image($cta->image, 'action.jpg') }}" class="img-fluid w-100 rounded-circle p-5" alt="">
            </div>
            <div class="col-lg-6 my-auto">
                <div class="text-start mt-4">
                    <h1 class="pb-4 text-white">{{ $cta->title }}</h1>
                    @if(!empty($cta->content))
                        <div class="text-white mb-3">{!! cms_html($cta->content) !!}</div>
                    @endif
                </div>
                <form method="post" action="{{ route('newsletter.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="d-flex call-btn">
                            <input type="email" class="form-control py-3 px-4 w-100 border-0 rounded-0 rounded-end rounded-pill" name="email" placeholder="Enter Your Email Address" required>
                            <button type="submit" class="btn btn-primary border-0 rounded-pill rounded rounded-start px-5">{{ $cta->button_text ?: 'Subscribe' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
