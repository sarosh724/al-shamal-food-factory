@include('front.template.layout.header')
<div role="main" class="main">

<section class="page-header page-header-modern bg-color-grey page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 class="text-dark"> <strong>Contact</strong></h1>
				<span class="sub-title text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4 my-5">
    <div class="row align-items-center">
        <div class="col-lg-5 col-xl-4 offset-xl-1 mb-5 mb-lg-0">
            <div class="overflow-hidden">
                <h2 class="text-color-dark font-weight-bold line-height-3 text-5-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250">New Industrial area, Zone 81, Street 15, Building 458</h2>
            </div>
            <div class="overflow-hidden">
                <a  href="https://maps.app.goo.gl/imsAdbNR1Y6giH3W8" target="_blank" class="d-inline-block custom-text-underline-1 font-weight-bold border-color-primary text-decoration-none text-3-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">GET DIRECTIONS</a>
            </div>
            <ul class="list list-unstyled text-color-dark font-weight-bold text-4 py-2 my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
                <li class="d-flex align-items-center mb-2">
                    <i class="icons icon-envelope text-color-dark me-2"></i>
                    Email: <a href="mailto:info@alshamalfood.com" class="text-color-dark text-color-hover-primary text-decoration-none ms-1">info@alshamalfood.com</a>
                </li>
                <li class="d-flex align-items-center mb-0">
                    <i class="icons icon-phone text-color-dark me-2"></i>
                    Phone: <a href="tel:+97444880400 " class="text-color-dark text-color-hover-primary text-decoration-none ms-1">+974 44880400 </a>
                </li>
            </ul>
            <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
        <div class="col-lg-6 col-xl-5 offset-lg-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250">
            <form class=" custom-form-style-1" method="POST">
                <div class="contact-form-success alert alert-success d-none1 mt-4">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="contact-form-error alert alert-danger d-non1e mt-4">
                    <strong>Error!</strong> There was an error sending your message.
                    <span class="mail-error-message text-1 d-block"></span>
                </div>

                <div class="row row-gutter-sm">
                    <div class="form-group col mb-3">
                        <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required placeholder="First Name">
                    </div>
                </div>
                <div class="row row-gutter-sm">
                    <div class="form-group col mb-3">
                        <input type="number" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="name" id="name" required placeholder="Phone Number">
                    </div>
                </div>
                <div class="row row-gutter-sm">
                    <div class="form-group col mb-3">
                        <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required placeholder="E-mail Address">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col mb-3">
                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4" class="form-control" name="message" id="message" required placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="row appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1500">
                    <div class="form-group col mb-0">
                        <button type="submit" class="btn btn-primary text-color-light btn-modern font-weight-bold custom-btn-border-radius custom-btn-arrow-effect-1 text-3 px-5 py-3" data-loading-text="Loading...">
                            SUBMIT
                            <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 "/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
<div class="position-relative appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14446.961628007533!2d51.3934914!3d25.1444658!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45d78272295ce9%3A0x5496eb42c8ec8591!2sAl%20Shamal%20Food%20Factory%20%2F%20Qatar%20Filling%20%26%20packaging%20Co!5e0!3m2!1sen!2sqa!4v1730883826619!5m2!1sen!2sqa" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


</div>
@include('front.template.layout.footer')
