
@include('front.arabic.template.layout.header')
<div role="main" class="main">
				<section class="page-header page-header-modern bg-color-grey page-header-md">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark"><strong>{{$service->title_arabic}}</strong></h1>
								{{-- <span class="sub-title text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span> --}}
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end">
									<li><a href="{{route('index')}}">{{__('home')}}</a></li>
									<li><a href="{{route('services')}}">{{__('services')}}</a></li>
									<li class="active">{{$service->title_arabic}}</li>
								</ul>
							</div>
						</div>
					</div>
				</section>


                <div class="container my-5 pt-4 pb-5">
					<div class="row">
						<div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                        <img src="{{@$service->images[0]->path}}" class="img-fluid hover-effect-2 mb-3" alt="" />
							<p class="text-3-5">{!!$service->detail_arabic!!}</p>
						</div>
						<div class="col-lg-4 order-lg-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">
							<div class="card box-shadow-1 custom-border-radius-1 mb-5">
								<div class="card-body z-index-1 py-4 my-3">
									<h2 class="text-color-dark font-weight-bold text-6 mb-4">{{__('all_services')}}</h2>
									<ul class="custom-nav-list-effect-1 list list-unstyled mb-0">
                                        @foreach(fetchServices() as $item)
										<li class="{{is_active_menu(route('service-details', ['slug' => $item->slug]))}}">
											<a href="{{route('service-details', ['slug' => $item->slug])}}" class="text-decoration-none text-color-dark text-color-hover-primary text-3-5">{{Str::title($item->title_arabic)}}</a>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="card bg-primary custom-border-radius-1">
								<div class="card-body text-center py-5 my-2">
									<h2 class="text-color-light font-weight-medium text-3 line-height-2 line-height-sm-1 mb-3 pb-1">{{$appointment->title_arabic}}</h2>
									<h3 class="font-weight-bold text-color-light text-transform-none text-8 line-height-3 mb-3">{!!$appointment->description_arabic!!}</h3>

									<div class="feature-box custom-feature-box-justify-center align-items-center text-start mb-4">
										<div class="feature-box-icon bg-transparent">
											<i class="icons icon-phone text-8 text-color-light"></i>
										</div>
										<div class="feature-box-info line-height-2 ps-1">
											<span class="d-block text-4 font-weight-medium text-color-light mb-1">{{__('call_us_now')}}</span>
											<strong class="text-6 directionltr"><a href="tel:{{getSetting('contact-1')->value}}" class="text-color-light text-decoration-none">{{getSetting('contact-1')->value}}</a></strong>
										</div>
									</div>
									<a href="{{route('appointment')}}" class="btn btn-light btn-outline custom-btn-border-radius font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3">{{__('make_an_appointment')}}</a>
								</div>
							</div>
						</div>
					</div>
				</div>

</div>
@include('front.arabic.template.layout.footer')
