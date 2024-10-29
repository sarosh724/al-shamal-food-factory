@include('front.template.layout.header')

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

