@include('front.template.layout.header')

@if(isset($about))

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img_container">
            <div class="img-box">
              <img src="{{$about->image}}" alt="about-image"/>
            </div>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                {{$about->title_english}}
              </h2>
            </div>
            <p>
              {{$about->description_english}}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endif

  <!-- end about section -->

@include('front.template.layout.footer')
