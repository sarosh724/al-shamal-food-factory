@include('front.arabic.template.layout.header')
<div role="main" class="main">
				<section class="page-header page-header-modern bg-color-grey page-header-lg">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">

								<h1 class="text-dark"> <strong>{{__('appointment')}}</strong></h1>
								<span class="sub-title text-dark">{{ $appointmentBreadcrumb->subtitle_arabic }}</span>
							</div>
                            <div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end">
									<li><a href="{{route('index')}}">{{__('home')}}</a></li>
									<li class="active">{{__('appointment')}}</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container my-5 pt-4 pb-5">
					<div class="row mb-3">
						<div class="col">
							<p class="text-3-5">{!! $appointment->description_arabic !!}</p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<form class="custom-form-style-1" name="appointment-form" id="appointment-form"  method="POST">
                                @csrf
                                <div class="contact-form-success alert alert-success d-none mt-4">
                                    <strong>{{__('success')}}!</strong> {{__('appointment_alert_success')}}.
                                </div>

                                <div class="contact-form-error alert alert-danger d-none mt-4">
                                    <strong>{{__('error')}}!</strong> {{__('appointment_alert_failed')}}.
                                    <span class="mail-error-message text-1 d-block"></span>
                                </div>

                                <div class="row">
                                	<div class="col">
                                		<h2 class="text-color-dark font-weight-bold text-4-5 mb-3">{{__('personal_information')}}:</h2>
                                	</div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <input type="text" value="" data-msg-required="Please enter your first name." maxlength="100" class="form-control" name="first_name" id="first_name" required placeholder="{{__('first_name')}}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <input type="text" value="" data-msg-required="Please enter your last name." maxlength="100" class="form-control" name="last_name" id="last_name" required placeholder="{{__('last_name')}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6 mb-3">
                                        <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required placeholder="{{__('email_address')}}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <input type="number" value="" data-msg-required="Please enter your phone." maxlength="100" min="0" class="form-control" name="phone" id="phone" required placeholder="{{__('phone')}}">
                                    </div>
                                </div>

	                            <div class="row">
                                	<div class="col">
                                		<h2 class="text-color-dark font-weight-bold text-4-5 mb-3">{{__('tell_us_your_reason_for_shceduling_an_appointment')}}:</h2>
                                	</div>
                                </div>
                                <div class="row mb-3">
	                                <div class="form-group col">
		                                <textarea maxlength="5000" data-msg-required="Please enter your reason." rows="10" class="form-control" name="reason" id="reason" required></textarea>
									</div>
	                            </div>
	                            <div class="row">
                                	<div class="col">
                                		<h2 class="text-color-dark font-weight-bold text-4-5 mb-1">{{__('choose_date_and_time')}}:</h2>
                                	</div>
                                </div>
                                <div class="row mb-2">
                                	<div class="col-lg-6">
                                		<div class="row">
                                			<div class="col">
                                				<p class="font-weight-semibold mb-2">{{__('first_choice')}}</p>
                                			</div>
                                		</div>
                                		<div class="row">
		                                	<div class="form-group col-md-6">
			                                    <input type="date" value="" data-msg-required="Please select a date." maxlength="100" class="form-control" name="first_date" id="first_date" required placeholder="Date">
			                                </div>
			                                <div class="form-group col-md-6">
			                                    <input type="time" value="" data-msg-required="Please select a time." maxlength="100" class="form-control" name="first_time" id="first_time" required placeholder="Time">
			                                </div>
			                            </div>
		                            </div>
		                            <div class="col-lg-6">
                                		<div class="row">
                                			<div class="col">
                                				<p class="font-weight-semibold mb-2">{{__('second_choice')}}</p>
                                			</div>
                                		</div>
                                		<div class="row">
			                                <div class="form-group col-md-6">
			                                    <input type="date" value="" data-msg-required="Please select a date." maxlength="100" class="form-control" name="second_date" id="second_date" required placeholder="Date">
			                                </div>
			                                <div class="form-group col-md-6">
			                                    <input type="time" value="" data-msg-required="Please select a time." maxlength="100" class="form-control" name="second_time" id="second_time" required placeholder="Time">
			                                </div>
			                            </div>
		                            </div>
                                </div>
                                <div class="row pb-2 mb-4">
                                	<div class="col">
                                		<div class="alert alert-warning custom-alert-bg-color-1">
                                			<p class="text-2 mb-0"><i class="fas fa-info-circle me-1"></i> {{__('appointment_message')}}.</p>
                                		</div>
                                	</div>
                                </div>
                                <div class="row">
                                    <div class="form-group col mb-0">
                                        <button type="submit" class="btn btn-primary text-color-light btn-modern font-weight-bold custom-btn-border-radius custom-btn-arrow-effect-1 text-3 px-5 py-3" data-loading-text="Loading...">
                                        	{{__('submit')}}
                                        	<svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 "/>
											</svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
				</div>


			</div>
@include('front.arabic.template.layout.footer')

<script>
    $(document).ready(function() {
        $("#appointment-form").validate({
            rules: {
                first_name: {
                    required: true,
                    maxlength: 100
                },
                last_name: {
                    required: true,
                    maxlength: 100
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 100
                },
                phone: {
                    required: true,
                    maxlength: 15,
                    minlength: 10
                },
                reason: {
                    required: true,
                    maxlength: 5000
                },
                first_date: {
                    required: true
                },
                first_time: {
                    required: true
                },
                second_date: {
                    required: true
                },
                second_time: {
                    required: true
                }
            },
            messages: {
                first_name: {
                    required: "Please enter your first name."
                },
                last_name: {
                    required: "Please enter your last name."
                },
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address."
                },
                phone: {
                    required: "Please enter your phone number."
                },
                reason: {
                    required: "Please enter your reason."
                },
                first_date: {
                    required: "Please select a date."
                },
                first_time: {
                    required: "Please select a time."
                },
                second_date: {
                    required: "Please select a date."
                },
                second_time: {
                    required: "Please select a time."
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '{{ route('store-appointment') }}',
                    method: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.type == 'success') {
                        $(".contact-form-success").removeClass("d-none").show();
                        $(".contact-form-error").addClass("d-none").hide();
                        $("#appointment-form")[0].reset();
                    } else {
                        $(".contact-form-error").removeClass("d-none").show();
                        $(".contact-form-success").addClass("d-none").hide();
                    }
                    },
                    error: function(error) {
                        $(".contact-form-error").removeClass("d-none").show();
                        $(".contact-form-success").addClass("d-none").hide();
                    }
                });
            }
        });
    });
</script>
