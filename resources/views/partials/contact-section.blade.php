@php
    $addressLabel = $section?->extra['address_label'] ?? 'Address';
    $phoneLabel = $section?->extra['phone_label'] ?? 'Call Us';
    $emailLabel = $section?->extra['email_label'] ?? 'Email Us';
    $formNotice = $section?->extra['form_notice'] ?? $settings->contact_form_notice;
    $namePh = $section?->extra['name_placeholder'] ?? 'Your Name';
    $emailPh = $section?->extra['email_placeholder'] ?? 'Your Email';
    $subjectPh = $section?->extra['subject_placeholder'] ?? 'Project';
    $messagePh = $section?->extra['message_placeholder'] ?? 'Message';
    $submitText = $section?->extra['submit_text'] ?? 'Send Message';
@endphp
<div class="container-fluid py-5 mb-5">
    <div class="container">
        @if(!empty($showTitle))
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                @if($section?->subtitle)<h5 class="text-primary">{{ $section->subtitle }}</h5>@endif
                <h1 class="mb-3">{{ $section?->title ?? 'Contact for any query' }}</h1>
            </div>
        @endif

        <div class="contact-detail position-relative p-4 p-md-5">
            <div class="row g-5 mb-5 justify-content-center">
                @if($settings->contact_display_address || $settings->address)
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">{{ $addressLabel }}</h4>
                                <a href="{{ $settings->contact_map_link ?: '#' }}" target="_blank" class="h5">{{ $settings->contact_display_address ?: $settings->address }}</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($settings->phone)
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">{{ $phoneLabel }}</h4>
                                <a class="h5" href="tel:{{ preg_replace('/\s+/', '', $settings->phone) }}">{{ $settings->phone }}</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($settings->email)
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">{{ $emailLabel }}</h4>
                                <a class="h5" href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="p-4 p-md-5 h-100 rounded contact-map">
                        <iframe class="rounded w-100 h-100"
                            src="{{ $settings->map_embed_url }}"
                            style="border:0; min-height:300px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-4 p-md-5 rounded contact-form">
                        @if($formNotice)
                            <h4 class="mb-4 text-white">{{ $formNotice }}</h4>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" name="name" value="{{ old('name') }}" placeholder="{{ $namePh }}" required>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control border-0 py-3" name="email" value="{{ old('email') }}" placeholder="{{ $emailPh }}" required>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" name="subject" value="{{ old('subject') }}" placeholder="{{ $subjectPh }}" required>
                            </div>
                            <div class="mb-4">
                                <textarea class="w-100 form-control border-0 py-3" rows="6" name="message" placeholder="{{ $messagePh }}" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="text-start">
                                <button class="btn bg-primary text-white py-3 px-5" type="submit">{{ $submitText }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
