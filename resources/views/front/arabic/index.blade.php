@include('front.arabic.template.layout.header')

<div role="main" class="main">

    <section class="section custom-section-background position-relative border-0 overflow-hidden m-0 p-0">
        <div class="position-absolute top-0 left-0 right-0 bottom-0 animated fadeIn" style="animation-delay: 600ms;">
            <div class="background-image-wrapper custom-background-style-1 position-absolute top-0 left-0 right-0 bottom-0 animated kenBurnsToRight"
                style="background-image: url(img/demos/auto-services/backgrounds/background-1.jpg); background-position: center right; animation-duration: 30s;">
            </div>
        </div>
        <div class="container position-relative py-sm-5 my-5">
            <svg class="custom-svg-1 d-none d-sm-block" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
                <path fill="#FFF" d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
        L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z" />
                <path class="animated customLineAnim svg-stroke-color-primary" fill="none" stroke-width="1.5"
                    stroke-miterlimit="10" d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603"
                    style="animation-delay: 300ms; animation-duration: 5s;" />
            </svg>
            <div class="row mb-5 p-relative z-index-1" style="direction: ltr;">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="overflow-hidden mb-1">
                        <h2 class="font-weight-bold text-color-grey text-4-5 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="800">{{ $slider->title_arabic }}
                        </h2>
                    </div>
                    <h1 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">
                        {{ $slider->subtitle_arabic }}</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="container my-5 pt-md-4 pt-xl-0">
        <div class="row align-items-center justify-content-center pb-4 mb-5">
            @if ($companyHistory)
                <div class="col-lg-6 pb-sm-4 pb-lg-0 mb-5 mb-lg-0">
                    <div class="overflow-hidden">
                        <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="300">
                            {{ $companyHistory->title_arabic }}</h2>
                    </div>
                    <div class="custom-divider divider divider-primary divider-small my-3">
                        <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim"
                            data-appear-animation-delay="700">
                    </div>
                    {{-- <p class="font-weight-light text-3-5 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                    <p class="pb-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="700">{!! $companyHistory->description_arabic !!}</p>
                    <div class="d-flex align-items-start align-items-sm-center flex-column flex-sm-row">
                        <a href="{{ route('about') }}"
                            class="btn btn-primary text-color-light custom-btn-border-radius font-weight-bold text-3 px-5 btn-py-3 me-sm-2 mb-3 mb-sm-0 appear-animation"
                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="950">{{__('view_more')}}</a>
                        <div class="feature-box align-items-center border border-top-0 border-end-0 border-bottom-0 custom-remove-mobile-xs-border-left ms-sm-4 ps-sm-4 appear-animation"
                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1200">
                            <div class="feature-box-icon bg-transparent">
                                <i class="icons icon-phone text-6 text-color-dark"></i>
                            </div>
                            <div class="feature-box-info line-height-2 ps-1">
                                <span class="d-block text-1 font-weight-semibold text-color-default">{{__('call_us_now')}}</span>
                                <strong class="text-4-5"><a href="tel:{{ getSetting('contact-1')->value }}"
                                        class="text-color-dark text-color-hover-primary text-decoration-none">{{ getSetting('contact-1')->value }}</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-10 col-md-9 col-lg-6 ps-lg-5 pe-5 appear-animation"
                data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1450"
                data-plugin-options="{'accY': -200}">
                <div class="position-relative">
                    <div data-plugin-float-element
                        data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                        <img src="{{ $companyHistory->image }}" class="img-fluid" alt="" />
                    </div>
                    {{-- <div class="position-absolute transform3dxy-n50" style="top: 25%; left: 7%;">
                        <div data-plugin-float-element
                            data-plugin-options="{'startPos': 'top', 'speed': 0.5, 'transition': true, 'transitionDuration': 2000, 'isInsideSVG': false}">
                            <img src="img/demos/auto-services/generic-1-1.png" class="appear-animation" alt=""
                                data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1700" />
                        </div>
                    </div>
                    <div class="position-absolute transform3dxy-n50 ms-5 pb-5 ms-xl-0" style="top: 32%; left: 85%;">
                        <div data-plugin-float-element
                            data-plugin-options="{'startPos': 'top', 'speed': 1, 'transition': true, 'transitionDuration': 1500, 'isInsideSVG': false}">
                            <img src="img/demos/auto-services/generic-1-2.png" class="appear-animation" alt=""
                                data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1900" />
                        </div>
                    </div>
                    <div class="position-absolute transform3dxy-n50" style="top: 90%; left: 19%;">
                        <div data-plugin-float-element
                            data-plugin-options="{'startPos': 'top', 'speed': 2, 'transition': true, 'transitionDuration': 2500, 'isInsideSVG': false}">
                            <img src="img/demos/auto-services/generic-1-3.png" class="appear-animation" alt=""
                                data-appear-animation="fadeInDownShorterPlus" data-appear-animation-delay="2100" />
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
        <div class="row align-items-center justify-content-center pb-4 mb-5">
            @if ($ourMission)
                <div class="col-md-6 col-lg-6 text-center text-md-start">
                    <div class="appear-animation textAlignRight" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="1000">
                        <h3 class="font-weight-bold text-color-dark text-transform-none text-5-5 mb-3">
                            {{ $ourMission->title_arabic }}</h3>
                        <p class="pb-1 mb-2">{!! $ourMission->description_arabic !!}</p>
                        <a href="{{ route('about') }}"
                            class="btn btn-primary text-color-light custom-btn-border-radius font-weight-bold btn-px-5 py-3 mb-2">{{__('view_more')}}</a>
                    </div>
                </div>
            @endif
            @if ($anyQuestion)
                <div class="col-md-6 col-lg-6 text-center text-md-start">
                    <div class="appear-animation textAlignRight" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="1100">
                        <h3 class="font-weight-bold text-color-dark text-transform-none text-5-5 pt-2 mb-3">
                            {{ $anyQuestion->title_arabic }}</h3>
                        <p class="pb-1 mb-2">{!! $anyQuestion->description_arabic !!}</p>
                        <a href="{{ route('contact-us') }}"
                            class="btn btn-primary text-color-light custom-btn-border-radius font-weight-bold btn-px-5 py-3">{{__('contact_us')}}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8 text-center">
                <div class="overflow-hidden">
                    <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="250">{{__('services')}}</h2>
                </div>
                <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                    <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim"
                        data-appear-animation-delay="600">
                </div>
                <p class="font-weight-light text-3-5 mb-5 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="500">{!! $service->description_arabic !!}</p>
            </div>
        </div>
        <div class="row row-gutter-sm mb-5 appear-animation justify-content-center"
            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
            @foreach ($services as $service)
                <div class="col-sm-6 col-lg-3 text-center mb-4 mb-lg-0">
                    <a href="{{ route('service-details', ['slug' => $service->slug]) }}"
                        class="text-decoration-none">
                        <div
                            class="custom-thumb-info-style-1 thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten">
                            <div class="thumb-info-wrapper">
                                @if(@$service->images[0]->path)
                                <img src="{{ @$service->images[0]->path }}" class="img-fluid" alt="service image">
                                @if(@$service->images[0]->path)
                            </div>
                            <h3 class="text-transform-none font-weight-bold text-5 mt-2 mb-0">
                                {{ $service->title_arabic }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="{{ route('services') }}"
                    class="btn btn-primary text-color-light custom-btn-border-radius font-weight-bold text-3 btn-px-5 btn-py-3 appear-animation"
                    data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="850">{{__('view_all_services')}}</a>
            </div>
        </div>
    </div>
    @if ($testimonial)
        <section class="section border-0 m-0">
            <div class="container pb-3 my-5">
                <div class="row justify-content-center pb-3 mb-4">
                    <div class="col text-center">
                        <h2 class="font-weight-bold text-color-dark line-height-1 mb-0">
                            {{ $testimonial->title_arabic }}</h2>
                        <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                            <hr class="my-0">
                        </div>
                        <p class="font-weight-bold text-3-5 mb-1">{!! $testimonial->description_arabic !!}</p>
                        {{-- <p class="font-weight-light text-3-5 mb-0">Read our testimonials from our happy customers.</p> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="owl-carousel nav-outside nav-style-1 nav-dark nav-arrows-thin nav-font-size-lg custom-carousel-box-shadow-1 mb-0"
                            data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'autoplay': true, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'dots': false, 'nav': true, 'loop': true, 'margin': 15, 'stagePadding': '75','rtl':true}">
                            @foreach ($testimonials as $testimonial)
                                <div>
                                    <div class="card custom-border-radius-1">
                                        <div class="card-body">
                                            <div
                                                class="custom-testimonial-style-1 testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote text-center mb-0">
                                                <blockquote>
                                                    <p class="text-color-dark text-3 font-weight-light px-0 mb-2">
                                                        {{ $testimonial->comment_arabic }}</p>
                                                </blockquote>
                                                <div class="testimonial-author">
                                                    <p><strong
                                                            class="font-weight-extra-bold">{{ $testimonial->name_arabic }}</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="section section-height-3 bg-primary border-0 m-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-7 text-center text-lg-start mb-4 mb-lg-0">
                    <h2
                        class="text-color-light font-weight-medium text-3-5 line-height-2 line-height-sm-1 ls-0 mb-2 mb-lg-2 textAlignRight">
                        {{ $appointment->title_arabic }}</h2>
                    <h3
                        class="font-weight-bold text-color-light text-transform-none text-8 line-height-2 line-height-lg-1 mb-1 textAlignRight">
                        {!! $appointment->description_arabic !!}</h3>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                        <div class="feature-box align-items-center mb-3 mb-lg-0">
                            <div class="feature-box-icon bg-transparent">
                                <i class="icons icon-phone text-6 text-color-light"></i>
                            </div>
                            <div class="feature-box-info line-height-2 ps-1">
                                <span class="d-block text-1 font-weight-semibold text-color-light mb-1">{{__('call_us_now')}}</span>
                                <strong class="text-4-5 directionltr"><a href="tel:{{ getSetting('contact-1')->value }}" class="text-color-light  ">{{ getSetting('contact-1')->value }}</a></strong>
                            </div>
                        </div>
                        <a href="{{ route('appointment') }}"
                            class="btn btn-light btn-outline custom-btn-border-radius border-color-light font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3">{{__('make_an_appointment')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('front.arabic.template.layout.footer')
