@include('front.template.layout.header')


<div class="hero_area">
    <!-- slider section -->
    <section class=" slider_section ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image:
            url('{{ $slider->image }}');
            background-size: cover;
            background-position:center;
            height: 60vh;" >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            {{ $slider->title_english }}<br>
                                            <span>
                                                {{ $slider->subtitle_english }}
                                            </span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container idicator_container">
                <ol class="carousel-indicators">
                    @foreach ($sliders as $slider)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>
    <!-- end slider section -->
</div>

<!-- about section -->

@if(isset($about))

<section class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="img_container">
                    <div class="img-box">
                        <img src="{{$about->image}}" alt="about-page" />
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="detail-box">
                    <div class="heading_container ">
                        <h2>
                            {{$about->title_english}}
                        </h2>
                    </div>
                    <p>
                        {{$about->description_english}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

<!-- end about section -->

<!-- service section -->

<section class="service_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our services
            </h2>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img height="100" width="100" src="{{ @$service->images[0]->path }}">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{ $service->title_english }}
                            </h6>
                            <p>
                                {!! $service->detail_english !!}
                            </p>
                            <a href="{{route('service-products', ['id' => $service->id])}}">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- end service section -->


<!-- client section -->

<section class="client_section layout_padding">
    <div class="container ">
        <div class="heading_container heading_center">
            <h2>
                What is says our clients
            </h2>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonials as $testimonial)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="box">
                            <div class="detail-box">
                                <h4>
                                    {{ $testimonial->name }}
                                </h4>
                                <br>
                                <span class='text-secondary'>{{ $testimonial->designation }}</span>
                                <p>
                                    {{ $testimonial->comment }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- end client section -->

<!-- contact section -->

<section class="contact_section layout_padding">
    <div class="contact_bg_box">
        <div class="img-box">
            <img src="{{ asset('assets/front/images/contact-bg.jpg') }}" alt="">
        </div>
    </div>
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Get In touch
            </h2>
        </div>
        <div class="">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div id="alert" class="alert mt-1" style="display: none;"></div>
                    <form method="post" name="contact-form" id="contact-form"
                        action="{{ route('store-customer-inquiry') }}">
                        @csrf
                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input name="name" type="text" placeholder="Full Name" />
                                </div>
                                <div>
                                    <input name="email" type="email" placeholder="Email " />
                                </div>
                                <div>
                                    <input name="phone_number" type="text" placeholder="Phone Number" />
                                </div>
                                <div class="">
                                    <input name="message" type="text" placeholder="Message" class="message_input" />
                                </div>
                                <div class="btn-box ">
                                    <button type="submit">
                                        Send
                                    </button>
                                </div
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->

@include('front.template.layout.footer')

<script>
    $("#contact-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            email: {
                required: true,
                email: true,
                maxlength: 255
            },
            phone_number: {
                required: true,
                maxlength: 255
            },
            message: {
                required: true
            }
        },
        submitHandler: function(form) {
            submitContactFormAjax();
        }
    });

    function submitContactFormAjax() {
        var formData = new FormData($('#contact-form')[0]);
        $.ajax({
            url: $('#contact-form').attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.type == 'success') {
                    $('#alert').text(res.message).fadeIn();
                    $('#alert').addClass('alert-success');
                    // Hide alert after 5 seconds
                    setTimeout(function() {
                        $('#alert').fadeOut();
                        $('#alert').removeClass('alert-success');
                    }, 5000);
                } else {
                    $('#alert').text(res.message).fadeIn();
                    $('#alert').addClass('alert-danger');
                    // Hide alert after 5 seconds
                    setTimeout(function() {
                        $('#alert').fadeOut();
                        $('#alert').removeClass('alert-danger');
                    }, 5000);
                }
            },
            error: function(xhr, error, thrown) {
                if (xhr.status === 401) {
                    $('#alert').text('something went wrong!').fadeIn();
                    setTimeout(function() {
                        window.location.href = "/";
                    }, 3000);
                } else {
                    toast('Server error loading dialog', 'error');
                }
            }
        });
    }
</script>
