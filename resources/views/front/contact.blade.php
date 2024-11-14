@include('front.template.layout.header')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-grey page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"> <strong>{{Str::title(__('contact'))}}</strong></h1>
                    <span class="sub-title text-dark">{{ $contactBreadcrumb->subtitle_english }}</span>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{ route('index') }}">{{Str::title(__('home'))}}</a></li>
                        <li class="active">{{Str::title(__('contact'))}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4 my-5">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-4 offset-xl-1 mb-5 mb-lg-0">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold line-height-3 text-5-5 mb-0 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="250">{{ getSetting('location')->value }}
                    </h2>
                </div>
                <div class="overflow-hidden">
                    <a href="{{ getSetting('map-link')->value }}" target="_blank"
                        class="d-inline-block custom-text-underline-1 font-weight-bold border-color-primary text-decoration-none text-3-5 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="500">{{Str::upper(__('get_directions'))}}</a>
                </div>
                <ul class="list list-unstyled text-color-dark font-weight-bold text-4 py-2 my-4 appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
                    <li class="d-flex align-items-center mb-2">
                        <i class="icons icon-envelope text-color-dark me-2"></i>
                        {{Str::title(__('email'))}}: <a href="mailto:{{ getSetting('email')->value }}"
                            class="text-color-dark text-color-hover-primary text-decoration-none ms-1">{{ getSetting('email')->value }}</a>
                    </li>
                    <li class="d-flex align-items-center mb-0">
                        <i class="icons icon-phone text-color-dark me-2"></i>
                        {{Str::title(__('phone'))}}: <a href="tel:{{ getSetting('contact-1')->value }} "
                            class="text-color-dark text-color-hover-primary text-decoration-none ms-1">{{ getSetting('contact-1')->value }}</a>
                    </li>
                </ul>
                <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="1000">{!! $contact->description_english !!}</p>
            </div>
            <div class="col-lg-6 col-xl-5 offset-lg-1 appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="1250">
                <form id="contact-form" class="custom-form-style-1" method="POST">
                    @csrf <!-- CSRF token to secure the request -->
                    <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>{{Str::title(__('success'))}}!</strong> {{Str::title(__('contact_alert_success'))}}.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>{{Str::title(__('error'))}}!</strong> {{Str::title(__('contact_alert_failed'))}}.
                        <span class="mail-error-message text-1 d-block"></span>
                    </div>

                    <div class="row row-gutter-sm">
                        <div class="form-group col mb-3">
                            <input type="text" value="" data-msg-required="Please enter your name."  class="form-control" name="name" id="name" required
                                placeholder="{{Str::title(__('name'))}}">
                        </div>
                    </div>
                    <div class="row row-gutter-sm">
                        <div class="form-group col mb-3">
                            <input type="number" value="" data-msg-required="Please enter your phone number."
                             class="form-control" min="0" name="phone" id="phone" required
                                placeholder="{{Str::title(__('phone_number'))}}">
                        </div>
                    </div>
                    <div class="row row-gutter-sm">
                        <div class="form-group col mb-3">
                            <input type="email" value="" data-msg-required="Please enter your email address."
                                data-msg-email="Please enter a valid email address."
                                class="form-control" name="email" id="email" required
                                placeholder="{{Str::title(__('email_address'))}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-3">
                            <textarea data-msg-required="Please enter your message." rows="4" class="form-control"
                                name="message" id="message" required placeholder="{{Str::title(__('message'))}}"></textarea>
                        </div>
                    </div>
                    <div class="row appear-animation" data-appear-animation="fadeInUpShorterPlus"
                        data-appear-animation-delay="1500">
                        <div class="form-group col mb-0">
                            <button type="submit"
                                class="btn btn-primary text-color-light btn-modern font-weight-bold custom-btn-border-radius custom-btn-arrow-effect-1 text-3 px-5 py-3"
                                data-loading-text="Loading...">
                                {{Str::upper(__('submit'))}}
                                <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17"
                                    xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF"
                                        points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    <div class="position-relative appear-animation" data-appear-animation="fadeInUpShorterPlus"
        data-appear-animation-delay="750">
        {!! getSetting('map-iframe')->value !!}
    </div>


</div>
@include('front.template.layout.footer')
<script>
$(document).ready(function() {
    $("#contact-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 15
            },
            email: {
                required: true,
                email: true,
                maxlength: 255
            },
            message: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter your name."
            },
            phone: {
                required: "Please enter your phone number."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            message: {
                required: "Please enter your message."
            }
        },
        submitHandler: function(form) {
            var formData = $(form).serialize();

            $.ajax({
                url: "{{ route('store-customer-inquiry') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.type == 'success') {
                        $(".contact-form-success").removeClass("d-none").show();
                        $(".contact-form-error").addClass("d-none").hide();
                        $("#contact-form")[0].reset();
                    } else {
                        $(".contact-form-error").removeClass("d-none").show();
                        $(".contact-form-success").addClass("d-none").hide();
                    }
                },
                error: function(xhr, status, error) {
                    $(".contact-form-error").removeClass("d-none").show();
                    $(".contact-form-success").addClass("d-none").hide();
                }
            });
        }
    });
});

</script>
