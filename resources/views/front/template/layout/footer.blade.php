   <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="info_logo">
            <a class="navbar-brand" href="index.html">
              <span>
                Star Trading Service
              </span>
            </a>
            <p>
              {{getSetting('description')}}
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="{{route('index')}}">
                  Home
                </a>
              </li>
              <li>
                <a href="{{route('about')}}">
                  About
                </a>
              </li>
              <li>
                <a href="{{route('services')}}">
                  Services
                </a>
              </li>
              <li>
                <a href="{{route('contact-us')}}">
                  Contact Us
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_info">
            <h5>
              Contact Us
            </h5>
          </div>
          <div class="info_contact">
            <a href="" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                {{getSetting('location')}}
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : {{getSetting('contact')}}
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                {{getSetting('email')}}
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



 <!-- footer section -->
 <footer class="container-fluid footer_section">
     <p>
         &copy; <span id="currentYear"></span> All Rights Reserved. Design by Technology Lab
     </p>
 </footer>
 <!-- footer section -->
 <script src="{{ asset('assets/front/js/jquery-3.4.1.min.js') }}"></script>
 <script src="{{ asset('assets/front/js/bootstrap.js') }}"></script>
 <script src="{{ asset('assets/front/js/custom.js') }}"></script>
 <script src='{{ asset("assets/plugins/jquery-validate/jquery.validate.min.js") }}'></script>
 <script>
     @include('template.partials.response')

     $(document).ready(function() {});
 </script>
 @yield('scripts')
 </body>

 </html>
