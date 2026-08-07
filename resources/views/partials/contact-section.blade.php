<div class="container-fluid py-5 mb-5">
    <div class="container">
        @if(!empty($showTitle))
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Get In Touch</h5>
                <h1 class="mb-3">{{ $section?->title ?? 'Contact for any query' }}</h1>
            </div>
        @endif

        <div class="contact-detail position-relative p-4 p-md-5">
            <div class="row g-5 mb-5 justify-content-center">
                @if($settings->address)
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Address</h4>
                                <span class="h5">{{ $settings->address }}</span>
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
                                <h4 class="text-primary">Call Us</h4>
                                <a class="h5" href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
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
                                <h4 class="text-primary">Email Us</h4>
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
                            src="{{ $settings->map_embed_url ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd' }}"
                            style="border:0; min-height:300px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-4 p-md-5 rounded contact-form">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" name="name" value="{{ old('name') }}" placeholder="Your Name" required>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control border-0 py-3" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" name="subject" value="{{ old('subject') }}" placeholder="Subject" required>
                            </div>
                            <div class="mb-4">
                                <textarea class="w-100 form-control border-0 py-3" rows="6" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="text-start">
                                <button class="btn bg-primary text-white py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
