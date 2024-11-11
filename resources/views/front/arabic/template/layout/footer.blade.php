
			<footer id="footer" class="border-0 mt-0">
				<div class="container py-5">
					<div class="row py-3">
						<div class="col-md-4 mb-5 mb-md-0">
							<div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
								<div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
									<img width="45" src="{{asset("assets/front/arabic/img/demos/auto-services/icons/icon-location.svg")}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light position-relative bottom-3'}" />
								</div>
								<div class="feature-box-info line-height-1 ps-2 textAlignRight">
									<span class="d-block font-weight-bold text-color-light text-5 mb-2">Address</span>
									<p class="text-color-light text-4 line-height-4 font-weight-light mb-0">{{getSetting('location')}}</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-5 mb-md-0 ">
							<div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
								<div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
									<i class="icons icon-phone text-9 text-color-light position-relative top-4"></i>
								</div>
								<div class="feature-box-info line-height-1 ps-2 textAlignRight">
									<span class="d-block font-weight-bold text-color-light text-5 pb-1 mb-1">Call Us Now</span>
									<a href="tel:{{getSetting('contact-1')}}" class="text-color-light text-4 line-height-7 text-decoration-none">{{getSetting('contact-1')}}</a>
									<span class="text-color-light text-4 px-2">/</span>
									<a href="tel:{{getSetting('contact-2')}}" class="text-color-light text-4 line-height-7 text-decoration-none">{{getSetting('contact-2')}}</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature-box flex-column flex-xl-row align-items-center align-items-lg-start text-center text-lg-start">
								<div class="feature-box-icon bg-transparent mb-4 mb-xl-0 p-0">
									<!-- <img width="45" src="img/demos/auto-services/icons/car-winch.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light position-relative bottom-3'}" /> -->
									<i class="icons icon-envelope text-9 text-color-light position-relative top-4"></i>
								</div>
								<div class="feature-box-info line-height-1 ps-xl-3 textAlignRight">
									<span class="d-block font-weight-bold text-color-light text-5 pb-1 mb-1">24/7 Assistance</span>
									<a href="mailto:{{getSetting('email')}}" class="text-color-light text-4 line-height-7 text-decoration-none">{{getSetting('email')}}</a>
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
								<img src="{{asset("assets/front/arabic/img/demos/auto-services/white_al_shamal_food_logo.png")}}" class="img-fluid" alt="" />
							</a>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0 textAlignRight">
							<h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">About Us</h5>
							<ul class="list list-unstyled">
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5">ADDRESS</span>
									<a href="{{getSetting('map-link')}}" target="_blank" class="text-color-light custom-text-underline-1 font-weight-medium text-3-5">GET DIRECTIONS</a>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5 mb-1">PHONE</span>
									<ul class="list list-unstyled font-weight-light text-3-5 mb-0">
										<li class="text-color-light line-height-3 mb-0">
											Sales: <a href="tel:{{getSetting('contact-1')}}" class="text-decoration-none text-color-light text-color-hover-default">{{getSetting('contact-1')}}</a>
										</li>
									</ul>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-semibold line-height-1 text-color-grey text-3-5">EMAIL</span>
									<a href="mailto:{{getSetting('email')}}" class="text-decoration-none font-weight-light text-3-5 text-color-light text-color-hover-default">{{getSetting('email')}}</a>
								</li>
							</ul>
							<ul class="social-icons social-icons-medium">
								<li class="social-icons-instagram">
									<a href="{{getSetting('instagram-link')}}" class="no-footer-css" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
								</li>
								<li class="social-icons-facebook">
									<a href="{{getSetting('facebook-link')}}" class="no-footer-css" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-2 mb-5 mb-md-0 textAlignRight">
							<h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">Services</h5>
							<ul class="list list-unstyled mb-0">
                                @foreach(fetchServices() as $service)
								<li class="mb-0"><a href="{{route('service-details', ['slug' => $service->slug])}}">{{ Str::title($service->title_arabic)}}</a></li>
                                @endforeach

							</ul>
						</div>
						<div class="col-md-6 col-lg-3 offset-lg-1 textAlignRight" style="margin-left: 0%;margin-right: 8.33333333%;">
							<h5 class="text-transform-none font-weight-bold text-color-light text-4-5 mb-4">Opening Hours</h5>
							<ul class="list list-unstyled list-inline custom-list-style-1 mb-0">
								<li>{{getSetting('working-days')}}</li>
								<li>{{getSetting('closed-days')}}: Closed</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright bg-light py-4">
					<div class="container py-2">
						<div class="row">
							<div class="col">
								<p class="text-center text-3 mb-0">© Copyright <a href="#">Al Shamal Food Factory</a>. All Rights Reserved,
                                Powered by <a href="https://www.technologylab.qa/" target="__blank">Technology Lab</a>
                                </p>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>


		<!-- Vendor -->
		<script src="{{asset("assets/front/arabic/vendor/plugins/js/plugins.min.js")}}"></script>
		<script src="{{asset("assets/front/arabic/vendor/bootstrap-star-rating/js/star-rating.min.js")}}"></script>
		<script src="{{asset("assets/front/arabic/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js")}}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{asset("assets/front/arabic/js/theme.js")}}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{asset("assets/front/arabic/js/views/view.contact.js")}}"></script>
		<script src="{{asset("assets/front/arabic/js/views/view.shop.js")}}"></script>

		<!-- Demo -->
		<script src="{{asset("assets/front/arabic/js/demos/demo-auto-services.js")}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset("assets/front/arabic/js/custom.js")}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{asset("assets/front/arabic/js/theme.init.js")}}"></script>

	</body>
</html>
