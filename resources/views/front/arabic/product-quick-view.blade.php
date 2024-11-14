<div class="shop dialog dialog-lg fadeIn animated" style="animation-duration: 300ms;">
    <div class="row">
        <div class="col-lg-6">
            <div class="thumb-gallery-wrapper">
                <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                    @foreach ($product->images as $image)
                        <div>
                            <img alt="" class="img-fluid" src="{{ $image->path }}">
                        </div>
                    @endforeach
                </div>
                <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                    @foreach ($product->images as $image)
                        <div class="cur-pointer">
                            <img alt="" class="img-fluid" src="{{ $image->path }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="summary entry-summary position-relative">
                <h1 class="font-weight-bold text-7 mb-0"><a href="javascript:;"
                        class="text-decoration-none text-color-dark text-color-hover-primary">{{ $product->title_arabic }}</a>
                </h1>
                <div class="divider divider-small">
                    <hr class="bg-color-grey-400">
                </div>
                <ul class="list list-unstyled text-2">
                    {{-- <li class="mb-0">AVAILABILITY: <strong class="text-color-dark">AVAILABLE</strong></li>
                    <li class="mb-0">SKU: <strong class="text-color-dark">1234567890</strong></li> --}}
                </ul>
                <p class="text-3-5 mb-3">{!! $product->detail_arabic !!}</p>
            </div>
        </div>
    </div>
</div>
