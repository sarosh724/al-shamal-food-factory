@include('front.template.layout.header')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-grey page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"> <strong>Products</strong></h1>
                    <span class="sub-title text-dark">{{ $productBreadcrumb->subtitle_english }}</span>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">PRODUCTS</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="shop container py-4 my-5">
        <div class="row align-items-center justify-content-between mb-4">
            <div class="col-auto mb-3 mb-md-0 order-md-2">
                <div class="d-flex align-items-center">
                    <span>Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of
                    {{ $products->total() }} products</span>

                </div>
            </div>
            <div class="col-md-6 order-md-1">
                <form method="get" action="{{route('products')}}">
                    <div class="custom-select-1" style="max-width: 280px;">
                        <select name="service" class="form-select form-control border px-3 py-2 h-auto" onchange="this.form.submit()">
                            <option value="all">Sort by Services</option>
                            @foreach(fetchServices() as $service)
                            <option value="{{$service->id}}" {{$serviceId == $service->id ? 'selected' : ''}}>{{Str::title($service->title_english)}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="products row row-gutter-sm mb-4">
            @foreach ($products as $product)
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="product mb-0">
                        <div class="product-thumb-info mb-3">
                            <a href="{{route('product-detail', ['id' => $product->id])}}" class="quick-view text-uppercase font-weight-semibold text-2" data-product-id="{{ $product->id }}">
                                QUICK VIEW
                            </a>
                            <a href="javascript:void(0)">
                                <div class="product-thumb-info-image bg-light">
                                    <img alt="{{ $product->title_english }}" class="img-fluid"
                                        src="{{ @$product->images[0]->path }}">
                                </div>
                            </a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3
                                    class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0">
                                    <a href="javascript:void(0)"
                                        class="text-color-dark text-color-hover-primary">
                                        {{ $product->title_english }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                        {{-- <div title="Rated {{ $product->rating }} out of 5">
                    <input type="text" class="d-none" value="{{ $product->rating }}" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                </div> --}}
                        {{-- <p class="price text-5 mb-3">
                    ${{ number_format($product->price, 2) }}
                </p> --}}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row align-items-center justify-content-md-between mt-4">
            <div class="col-md-auto mb-3 mb-md-0">
                <p class="mb-0">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of
                    {{ $products->total() }} products</p>
            </div>
            <div class="col-md-auto">
                {{ $products->links('pagination::bootstrap-4', ['class' => 'custom-pagination']) }}
            </div>
        </div>
    </div>
    @if($testimonial)
    <section class="section border-0 m-0">
        <div class="container pb-3 my-5">
            <div class="row justify-content-center pb-3 mb-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold text-color-dark line-height-1 mb-0">{{ $testimonial->title_english }}
                    </h2>
                    <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                        <hr class="my-0">
                    </div>
                    <p class="font-weight-bold text-3-5 mb-1">{!! $testimonial->description_english !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="owl-carousel nav-outside nav-style-1 nav-dark nav-arrows-thin nav-font-size-lg custom-carousel-box-shadow-1 mb-0"
                        data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 2}, '1199': {'items': 3}}, 'autoplay': true, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'dots': false, 'nav': true, 'loop': true, 'margin': 15, 'stagePadding': '75'}">
                        @foreach ($testimonials as $testimonial)
                            <div>
                                <div class="card custom-border-radius-1">
                                    <div class="card-body">
                                        <div
                                            class="custom-testimonial-style-1 testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote text-center mb-0">
                                            <blockquote>
                                                <p class="text-color-dark text-3 font-weight-light px-0 mb-2">
                                                    {{ $testimonial->comment }}</p>
                                            </blockquote>
                                            <div class="testimonial-author">
                                                <p><strong
                                                        class="font-weight-extra-bold">{{ $testimonial->name }}</strong>
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
                        class="text-color-light font-weight-medium text-3-5 line-height-2 line-height-sm-1 ls-0 mb-2 mb-lg-2">
                        {{$appointment->title_english}}</h2>
                    <h3
                        class="font-weight-bold text-color-light text-transform-none text-8 line-height-2 line-height-lg-1 mb-1">
                        {!!$appointment->description_english!!}</h3>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                        <div class="feature-box align-items-center mb-3 mb-lg-0">
                            <div class="feature-box-icon bg-transparent">
                                <i class="icons icon-phone text-6 text-color-light"></i>
                            </div>
                            <div class="feature-box-info line-height-2 ps-1">
                                <span class="d-block text-1 font-weight-semibold text-color-light mb-1">CALL US
                                    NOW</span>
                                <strong class="text-4-5"><a href="tel:{{ getSetting('contact-1') }}"
                                        class="text-color-light text-decoration-none">{{ getSetting('contact-1') }}</a></strong>
                            </div>
                        </div>
                        <a href="{{route('appointment')}}"
                            class="btn btn-light btn-outline custom-btn-border-radius border-color-light font-weight-bold text-color-light text-color-hover-dark bg-color-hover-light btn-px-5 btn-py-3">MAKE
                            AN APPOINTMENT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@include('front.template.layout.footer')






