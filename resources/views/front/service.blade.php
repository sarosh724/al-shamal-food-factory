@include('front.template.layout.header')

  <!-- service section -->

  <section class="service_section layout_padding ">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our services
        </h2>
      </div>
      <div class="row">
        @foreach ($services as $service)
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img height="100" width="100" src="{{@$service->images[0]->path}}">
            </div>
            <div class="detail-box">
              <h6>
                {{$service->title_english}}
              </h6>
              <p>
              {!!$service->detail_english!!}
              </p>
              <a href="{{route('service-products', ['id' => $service->id])}}">
                Read More
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- end service section -->

@include('front.template.layout.footer')
