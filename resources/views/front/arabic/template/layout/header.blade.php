<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Al Shamal Food Factory</title>

		<meta name="keywords" content="Al Shamal Food Factory" />
		<meta name="description" content="Al Shamal Food Factory">
		<meta name="author" content="www.technologylab.qa">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset("assets/front/arabic/img/demos/auto-services/al_shamal_food_logo.png")}}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{asset("assets/front/arabic/img/demos/auto-services/al_shamal_food_logo.png")}}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/bootstrap/css/bootstrap.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/fontawesome-free/css/all.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/animate/animate.compat.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/simple-line-icons/css/simple-line-icons.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/owl.carousel/assets/owl.carousel.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/owl.carousel/assets/owl.theme.default.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/magnific-popup/magnific-popup.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/bootstrap-star-rating/css/star-rating.min.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css")}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/theme.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/theme-elements.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/theme-blog.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/theme-shop.css")}}">
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/styleAr.css")}}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/demos/demo-auto-services.css")}}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{asset("assets/front/arabic/css/skins/skin-auto-services.css")}}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset("assets/front/arabic/css/custom.css")}}">

	</head>
	<body>

		<div class="body">
			<div class="notice-top-bar bg-primary" data-sticky-start-at="100">
				<button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
					<span class="close">
						<span></span>
						<span></span>
					</span>
				</button>
				<div class="container">
					<div class="row justify-content-center py-2">
						<div class="col-9 col-md-12 text-center">
							<p class="text-color-light mb-0">{!!fetchPage('announcement-bar')->description_arabic!!}</p>
						</div>
					</div>
				</div>
			</div>
			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 54, 'stickySetTop': '-54px', 'stickyChangeLogo': false}">
				<div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
					<div class="header-top header-top-small-minheight header-top-simple-border-bottom">
						<div class="container py-2">
							<div class="header-row justify-content-between">
								<div class="header-column col-auto px-0">
									<div class="header-row">
										<div class="header-nav-top">
											<ul class="nav nav-pills position-relative">
												<li class="nav-item d-none d-sm-block">
													<span class="d-flex align-items-center font-weight-medium ws-nowrap text-3 ps-0">
														<a href="mailto:{{getSetting('email')}}" class="text-decoration-none text-color-dark text-color-hover-primary">
															{{getSetting('email')}}
															<i class="icons icon-envelope font-weight-bold position-relative text-4 top-3 me-1 px-2"></i>
														</a>
													</span>
												</li>
												<li class="nav-item nav-item-right-border nav-item-left-border-remove nav-item-left-border-sm-show">
													<span class="d-flex align-items-center font-weight-medium text-color-dark ws-nowrap text-3">
														<i class="icons icon-clock font-weight-bold position-relative text-3 top-1 me-2  px-2"></i>
														 {{getSetting('working-days')}}</span>
													</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="header-column justify-content-end col-auto px-0 d-none d-md-flex">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-gray social-icons-medium custom-social-icons-divider">
												<li class="social-icons-facebook">
													<a href="{{getSetting('facebook-link')}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
												</li>
												<li class="social-icons-linkedin">
													<a href="{{getSetting('linkedin-link')}}" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column w-100">
								<div class="header-row justify-content-between">
									<div class="header-logo z-index-2 col-lg-2 px-0">
										<a href="{{route('index')}}">
											<img alt="Porto" style="width: 100%;" src="{{asset("assets/front/arabic/img/demos/auto-services/al_shamal_food_logo.png")}}">
										</a>
									</div>
									<div class="header-nav header-nav-links justify-content-end pe-lg-4 me-lg-3">
										<div class="header-nav-main header-nav-main-arrows header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li><a href="{{route('index')}}" class="nav-link {{is_active_menu(route('index'))}}">Home</a></li>
													<li><a href="{{route('about')}}" class="nav-link {{is_active_menu(route('about'))}}">About</a></li>
													<li class="dropdown">
														<a href="{{route('services')}}" class="nav-link {{is_active_menu(route('services'))}} dropdown-toggle">Services</a>
														<ul class="dropdown-menu">
                                                            @foreach(fetchServices() as $service)
															<li><a href="{{route('service-details', ['slug' => $service->slug])}}" class="dropdown-item textAlignRight">{{ Str::title($service->title_arabic)}}</a></li>
                                                            @endforeach
														</ul>
													</li>
													<li><a href="{{route('products')}}" class="nav-link {{is_active_menu(route('products'))}}">Products</a></li>
													<li><a href="{{route('contact-us')}}" class="nav-link {{is_active_menu(route('contact-us'))}}">Contact</a></li>
												</ul>
											</nav>
										</div>
									</div>
									<ul class="header-extra-info custom-left-border-1 d-none d-xl-block">
										<li class="d-none d-sm-inline-flex ms-0">
											<div class="header-extra-info-icon">
												<i class="icons icon-phone text-3 text-color-dark position-relative top-3  pe-3 ps-3"></i>
											</div>
											<div class="header-extra-info-text line-height-2">
												<span class="text-1 font-weight-semibold text-color-default">CALL US NOW</span>
												<strong class="text-4" style="direction: ltr;"><a href="tel:{{ getSetting('contact-1') }}" class="text-color-hover-primary text-decoration-none">{{ getSetting('contact-1') }}</a></strong>
											</div>
										</li>
									</ul>
									<div class="d-flex col-auto pe-3 ps-3 ps-xl-0">
										<div class="header-nav-features ps-0 ms-1">
											<div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2 pe-3 ps-3">
												<a href="{{ route('language', app()->getLocale() === 'en' ? 'ar' : 'en') }}"  aria-label="" title="English Website">
													<img src="{{asset("assets/front/arabic/img/eng_ar.png")}}" height="35" alt="" class="header-nav-top-icon-img">
												</a>
											</div>
										</div>
									</div>
									<button class="btn header-btn-collapse-nav ms-4" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
