@include('front.template.layout.header', ['seoTitle' => @$service->seo_title, 'seoKeywords' => @$service->seo_keywords, 'seoDescription' => @$service->seo_description])

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Products
        </h2>
        <p>
          Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris
          iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.
        </p>
      </div>
      <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 col-sm-6 mx-auto ">
          <div class="box">
            <div class="img-box">
              <img height="250" width="250" src="{{@$product->images[0]->path}}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                {{$product->title_english}}
              </h5>
              <h6 class="">

              </h6>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

    <!-- end about section -->

@include('front.template.layout.footer')

