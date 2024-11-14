
			<footer id="footer" class="border-0 mt-0">
				<div class="container py-5">
					<div class="row py-3">
						<div class="col-md-4 mb-5 mb-md-0">
							<div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
								<div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
									<img width="45" src="{{asset("assets/front/img/demos/auto-services/icons/icon-location.svg")}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light position-relative bottom-3'}" />
								</div>
								<div class="feature-box-info line-height-1 ps-2">
									<span class="d-block font-weight-bold text-color-light text-5 mb-2">{{Str::title(__('address'))}}</span>
									<p class="text-color-light text-4 line-height-4 font-weight-light mb-0">{{getSetting('location')->value}}</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-5 mb-md-0">
							<div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
								<div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
									<i class="icons icon-phone text-9 text-color-light position-relative top-4"></i>
								</div>
								<div class="feature-box-info line-height-1 ps-2">
									<span class="d-block font-weight-bold text-color-light text-5 pb-1 mb-1">{{Str::title(__('call_us_now'))}}</span>
									<a href="tel:{{getSetting('contact-1')->value}}" class="text-color-light text-4 line-height-7 text-decoration-none">{{getSetting('contact-1')->value}}</a>
									<span class="text-color-light text-4 px-2">/</span>
									<a href="tel:{{getSetting('contact-2')->value}}" class="text-color-light text-4 line-height-7 text-decoration-none">{{getSetting('contact-2')->value}}</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
								<div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
									<!-- <img width="45" src="img/demos/auto-services/icons/car-winch.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light position-relative bottom-3'}" /> -->
									<i class="icons icon-envelope text-9 text-color-light position-relative top-4"></i>
								</div>
								<div class="feature-box-info line-height-1 ps-xl-3">
									<span class="d-block font-weight-bold text-color-light text-5 pb-1 mb-1">24/7 {{Str::title(__('assistance'))}}</span>
									<a href="mailto:{{getSetting('email')->value}}" class="text-color-light text-4 line-height-7 text-decoration-none">{{getSetting('email')->value}}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr class="bg-light opacity-2 my-0">
				<div class="container pb-5">
					<div class="row text-center text-md-start py-4 my-5">
						<div class="col-md-6 col-lg-3 align-self-center text-center text-md-start text-lg-center mb-5 mb-lg-0">
							<a href="{{route('index')}}" class="text-decoration-none">
								<img src="{{asset("assets/front/img/demos/auto-services/white_al_shamal_food_logo.png")}}" class="img-fluid" alt="" />
							</a>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">{{Str::title(__('about_us'))}}</h5>
							<ul class="list list-unstyled">
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5">{{Str::upper(__('address'))}}</span>
									<a href="{{getSetting('map-link')->value}}" target="_blank" class="text-color-light custom-text-underline-1 font-weight-medium text-3-5">{{Str::upper(__('get_directions'))}}</a>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5 mb-1">{{Str::upper(__('phone'))}}</span>
									<ul class="list list-unstyled font-weight-light text-3-5 mb-0">
										<li class="text-color-light line-height-3 mb-0">
											{{Str::title(__('sales'))}}: <a href="tel:{{getSetting('contact-1')->value}}" class="text-decoration-none text-color-light text-color-hover-default">{{getSetting('contact-1')->value}}</a>
										</li>
									</ul>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5">{{Str::upper(__('email'))}}</span>
									<a href="mailto:{{getSetting('email')->value}}" class="text-decoration-none font-weight-light text-3-5 text-color-light text-color-hover-default">{{getSetting('email')->value}}</a>
								</li>
							</ul>
							<ul class="social-icons social-icons-medium">
								<li class="social-icons-instagram">
									<a href="{{getSetting('instagram-link')->value}}" class="no-footer-css" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
								</li>
								<li class="social-icons-facebook">
									<a href="{{getSetting('facebook-link')->value}}" class="no-footer-css" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-2 mb-5 mb-md-0">
							<h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">{{Str::title(__('services'))}}</h5>
							<ul class="list list-unstyled mb-0">
                                @foreach(fetchServices() as $service)
								<li class="mb-0"><a href="{{route('service-details', ['slug' => $service->slug])}}">{{ Str::title($service->title_english)}}</a></li>
                                @endforeach
							</ul>
						</div>
						<div class="col-md-6 col-lg-3 offset-lg-1">
							<h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">{{Str::title(__('opening_hours'))}}</h5>
							<ul class="list list-unstyled list-inline custom-list-style-1 mb-0">
								<li>{{getSetting('working-days')->value}}</li>
								<li>{{getSetting('closed-days')->value}}: {{Str::title(__('closed'))}}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright bg-light py-4">
					<div class="container py-2">
						<div class="row">
							<div class="col">
								<p class="text-center text-3 mb-0">© {{Str::title(__('copyright'))}} <a href="{{route('index')}}">{{Str::title(__('al_shamal_food_factory'))}}</a>. {{Str::title(__('all_rights_reserved'))}},
                                {{Str::title(__('powered_by'))}} <a href="https://www.technologylab.qa/" target="__blank">{{Str::title(__('technology_lab'))}}</a>
                                </p>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>


		<!-- Vendor -->
		<script src="{{asset("assets/front/vendor/plugins/js/plugins.min.js")}}"></script>
		<script src="{{asset("assets/front/vendor/bootstrap-star-rating/js/star-rating.min.js")}}"></script>
		<script src="{{asset("assets/front/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js")}}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{asset("assets/front/js/theme.js")}}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{asset("assets/front/js/views/view.contact.js")}}"></script>
		<script src="{{asset("assets/front/js/views/view.shop.js")}}"></script>

		<!-- Demo -->
		<script src="{{asset("assets/front/js/demos/demo-auto-services.js")}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset("assets/front/js/custom.js")}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{asset("assets/front/js/theme.init.js")}}"></script>

	</body>
</html>
