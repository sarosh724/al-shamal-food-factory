@include('front.arabic.template.layout.header')
<div role="main" class="main">
				<section class="page-header page-header-modern bg-color-grey page-header-md">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark">{{__('our')}} <strong>{{__('services')}}</strong></h1>
								<span class="sub-title text-dark">{{ $serviceBreadcrumb->subtitle_arabic }}</span>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end">
									<li><a href="{{route('index')}}">{{__('home')}}</a></li>
									<li class="active">{{__('services')}}</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
                <div class="container py-4">

					<div class="row py-3 justify-content-center">
                        @foreach ($services as $service)
						<div class="col-sm-8 col-md-4 mb-4 mb-md-0 appear-animation" data-appear-animation="fadeIn">
							<article>
								<div class="row">
									<div class="col">
										<a href="{{route('service-details', ['slug' => $service->slug])}}" class="text-decoration-none">
                                            @if(@$service->images[0]->path)
											<img src="{{ @$service->images[0]->path }}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                            @endif
										</a>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<h4 class="mb-0"><a href="{{route('service-details', ['slug' => $service->slug])}}" class="text-3 text-uppercase font-weight-bold pt-2 d-block text-dark text-decoration-none">{{ $service->title_arabic }}</a></h4>
										<p class="text-2">{!! $service->detail_arabic !!}</p>
									</div>
								</div>
							</article>
						</div>
                        @endforeach()
					</div>

				</div>
</div>
@include('front.arabic.template.layout.footer')
