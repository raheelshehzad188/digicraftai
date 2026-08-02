<div class="container-fluid py-5 px-0">
    @if(!empty($showTitle))
        <h1 class="display-4 text-uppercase text-center mt-5 mb-5">{{ $section?->title ?? 'Contact Us' }}</h1>
    @endif
    <div class="row mx-0">
        <div class="col-12 px-0" style="height: 500px;">
            <div class="position-relative h-100">
                <iframe class="position-relative w-100 h-100"
                    src="{{ $settings->map_embed_url ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd' }}"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <div class="row mx-0 justify-content-center" style="margin-top: -200px;">
        <div class="col-lg-6 col-md-8 col-sm-10 px-0">
            <div class="contact-form bg-white rounded p-5">
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
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="control-group">
                                <input type="text" class="form-control bg-light border-0 p-4" name="name" value="{{ old('name') }}" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <input type="email" class="form-control bg-light border-0 p-4" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control bg-light border-0 p-4" name="subject" value="{{ old('subject') }}" placeholder="Subject" required>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control bg-light border-0 py-3 px-4" rows="5" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary text-uppercase py-3 px-5" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
