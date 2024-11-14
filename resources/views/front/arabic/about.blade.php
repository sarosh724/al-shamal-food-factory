@include('front.arabic.template.layout.header')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-grey page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"> <strong>{{__('about_us')}}</strong></h1>
                    <span class="sub-title text-dark">{{ $aboutBreadcrumb->subtitle_arabic }}</span>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{ route('index') }}">{{__('home')}}</a></li>
                        <li class="active">{{__('about_us')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @if ($whoWeAre)
        <div class="container textAlignRight ">
            <div class="row align-items-center justify-content-center pt-5">
                <div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0 ">
                    <h2 class="text-color-dark font-weight-normal text-6 mb-2">{{__('who')}} <strong
                            class="font-weight-extra-bold">{{__('we_are')}}</strong></h2>
                    <p class="lead">{!! $whoWeAre->description_arabic !!}</p>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 position-relative mt-sm-5"
                    style="top: 1.7rem;">
                    <img src="{{ $whoWeAre->image }}" class="img-fluid position-relative appear-animation mb-2"
                        data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
                </div>
            </div>
        </div>
    @endif
    <div class="container">

        <div class="row pt-5">
            <div class="col">
                <div class="row mt-3 mb-5">
                    @if ($ourMission)
                    <div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter"
                        data-appear-animation-delay="800">
                        <h3 class="font-weight-bold text-4 mb-2">{{ $ourMission->title_arabic }}</h3>
                        <p>{!! $ourMission->description_arabic !!}</p>
                    </div>
                    @endif
                    @if ($ourVision)
                    <div class="col-md-4 appear-animation" data-appear-animation="fadeIn"
                        data-appear-animation-delay="600">
                        <h3 class="font-weight-bold text-4 mb-2">{{ $ourVision->title_arabic }}</h3>
                        <p>{!! $ourVision->description_arabic !!}</p>
                    </div>
                    @endif
                    @if ($whyUs)
                    <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter"
                        data-appear-animation-delay="800">
                        <h3 class="font-weight-bold text-4 mb-2">{{ $whyUs->title_arabic }}</h3>
                        <p>{!! $whyUs->description_arabic !!}</p>
                    </div>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <section class="section section-primary border-0 mb-0 appear-animation" data-appear-animation="fadeIn"
        data-plugin-options="{'accY': -150}">
        <div class="container">
            <div class="row counters counters-sm pb-4 pt-3">
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="counter">
                        <i class="icons icon-user text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="{{ getSetting('happy-clients')->value }}"
                            data-append="+">0</strong>
                        <label class="text-4 mt-1 text-color-light">{{__('happy_clients')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="counter">
                        <i class="icons icon-badge text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="{{ getSetting('years-in-business')->value }}">0</strong>
                        <label class="text-4 mt-1 text-color-light">{{__('years_in_business')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
                    <div class="counter">
                        <i class="icons icon-graph text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="{{ count(fetchServices()) }}">0</strong>
                        <label class="text-4 mt-1 text-color-light">{{__('services')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter">
                        <i class="icons icon-cup text-color-light"></i>
                        <strong class="text-color-light font-weight-extra-bold" data-to="{{ count(fetchProducts()) }}">0</strong>
                        <label class="text-4 mt-1 text-color-light">{{__('products')}}</label>
                    </div>
                </div>
            </div>
        </div>
    </section>


@if ($meetOurTeam)
    <div class="container appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
        <div class="row pt-5 pb-4 my-5">
            <div class="col-md-6 order-2 order-md-1 text-center text-md-start">
                <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0"
                    data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40,'rtl':true}">
                    @foreach ($teamMembers as $teamMember)
                    <div>
                        <img class="img-fluid rounded-0 mb-4" src="{{ $teamMember->image }}" alt="" />
                        <h3 class="font-weight-bold text-color-dark text-4 mb-0 textAlignRight">{{ $teamMember->name_arabic }}</h3>
                        <p class="text-2 mb-0 textAlignRight">{{ $teamMember->designation_arabic }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2 text-center text-md-start mb-5 mb-md-0 textAlignRight">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1 ">{{__('meet')}} <strong
                        class="font-weight-extra-bold">{{__('our_team')}}</strong></h2>
                <p class="lead">{!! $meetOurTeam->description_arabic !!}</p>
            </div>
        </div>
    </div>
@endif
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
</div>
@include('front.arabic.template.layout.footer')
