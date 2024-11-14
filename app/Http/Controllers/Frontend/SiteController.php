<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\CustomerInquiryRequest;
use App\Interfaces\CustomerInquiryInterface;
use App\Interfaces\PageInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\ServiceInterface;
use App\Interfaces\SliderInterface;
use App\Interfaces\TestimonialInterface;
use App\Interfaces\OurTeamInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Interfaces\BreadCrumbInterface;
use App\Interfaces\AppointmentInterface;

class SiteController extends Controller
{

    use ResponseTrait;
    protected SliderInterface $sliderInterface;
    protected ServiceInterface $serviceInterface;
    protected TestimonialInterface $testimonialInterface;
    protected CustomerInquiryInterface $customerInquiryInterface;
    protected PageInterface $pageInterface;
    protected ProductInterface $productInterface;
    protected OurTeamInterface $ourTeamInterface;
    protected BreadCrumbInterface $breadCrumbInterface;
    protected AppointmentInterface $appointmentInterface;

    public function __construct(SliderInterface $sliderInterface, ServiceInterface $serviceInterface, TestimonialInterface $testimonialInterface, CustomerInquiryInterface $customerInquiryInterface, PageInterface $pageInterface, ProductInterface $productInterface, OurTeamInterface $ourTeamInterface, BreadCrumbInterface $breadCrumbInterface, AppointmentInterface $appointmentInterface)
    {
        $this->sliderInterface = $sliderInterface;
        $this->serviceInterface = $serviceInterface;
        $this->testimonialInterface = $testimonialInterface;
        $this->appointmentInterface = $appointmentInterface;
        $this->pageInterface = $pageInterface;
        $this->productInterface = $productInterface;
        $this->ourTeamInterface = $ourTeamInterface;
        $this->breadCrumbInterface = $breadCrumbInterface;
        $this->customerInquiryInterface = $customerInquiryInterface;
    }

    public function index(Request $request)
    {
        $slider = $this->sliderInterface->list($request->merge(['status' => 'active']))->first();
        $services = $this->serviceInterface->list($request->merge(['status' => 'active']))->get();
        $testimonials = $this->testimonialInterface->list()->get();
        $companyHistory = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'company-history')->first();
        $ourMission = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'our-mission')->first();
        $anyQuestion = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'any-question')->first();
        $service = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'service')->first();
        $testimonial = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'testimonial')->first();
        $appointment = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'appointment')->first();

        if (app()->getLocale() == 'en') {

            return view('front.index', compact('slider', 'services', 'testimonials', 'companyHistory', 'ourMission', 'anyQuestion', 'service', 'testimonial', 'appointment'));

        }
        else{
            return view('front.arabic.index', compact('slider', 'services', 'testimonials', 'companyHistory', 'ourMission', 'anyQuestion', 'service', 'testimonial', 'appointment'));
        }
    }

    public function about(Request $request)
    {
        $whoWeAre = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'who-are-we')->first();
        $ourMission = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'our-mission')->first();
        $ourVision = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'our-vision')->first();
        $whyUs = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'why-us')->first();
        $meetOurTeam = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'meet-our-team')->first();
        $testimonial = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'testimonial')->first();
        $testimonials = $this->testimonialInterface->list()->get();
        $teamMembers = $this->ourTeamInterface->list($request->merge(['status' => 'active']))->get();
        $aboutBreadcrumb = $this->breadCrumbInterface->list(null, 'about')->first();

        if (app()->getLocale() == 'en') {

            return view('front.about', compact('aboutBreadcrumb', 'whoWeAre', 'ourMission', 'ourVision', 'whyUs', 'meetOurTeam', 'testimonial', 'testimonials', 'teamMembers'));
        }
        else{
            return view('front.arabic.about', compact('aboutBreadcrumb', 'whoWeAre', 'ourMission', 'ourVision', 'whyUs', 'meetOurTeam', 'testimonial', 'testimonials', 'teamMembers'));
        }
    }

    public function services(Request $request)
    {
        $serviceBreadcrumb = $this->breadCrumbInterface->list(null, 'service')->first();
        $services = $this->serviceInterface->list($request->merge(['status' => 'active']))->get();

        if (app()->getLocale() == 'en') {
            return view('front.services', compact('services', 'serviceBreadcrumb'));
        }
        else{
            return view('front.arabic.services', compact('services', 'serviceBreadcrumb'));
        }
    }

    public function serviceDetails(Request $request, $slug)
    {
        $service = $this->serviceInterface->list($request->merge(['status' => 'active', 'slug' => $slug]))->first();
        if(is_null($service))
        {
            abort('404');
        }
        $appointment = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'appointment')->first();

        if (app()->getLocale() == 'en') {
            return view('front.services-details', compact('service', 'appointment'));
        }
        else{
            return view('front.arabic.services-details', compact('service', 'appointment'));
        }
    }

    public function products(Request $request)
    {
        $serviceId = $request->service;
        $productBreadcrumb = $this->breadCrumbInterface->list(null, 'product')->first();
        $products = $this->productInterface->list($request->merge(['status' => 'active']))->paginate(8);
        $testimonial = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'testimonial')->first();
        $testimonials = $this->testimonialInterface->list()->get();
        $appointment = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'appointment')->first();

        if (app()->getLocale() == 'en') {
            return view('front.products', compact('products', 'productBreadcrumb', 'serviceId', 'testimonial', 'testimonials', 'appointment'));
        }
        else{
            return view('front.arabic.products', compact('products', 'productBreadcrumb', 'serviceId', 'testimonial', 'testimonials', 'appointment'));
        }
    }

    public function productDetail(Request $request, $id)
    {
        $product = $this->productInterface->list($request->merge(['status' => 'active']), $id)->first();
        if (app()->getLocale() == 'en') {
            return view('front.product-quick-view', compact('product'));
        }
        else{
            return view('front.arabic.product-quick-view', compact('product'));
        }
    }

    public function contactUs(Request $request)
    {
        $contactBreadcrumb = $this->breadCrumbInterface->list(null, 'contact')->first();
        $contact = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'contact')->first();

        if (app()->getLocale() == 'en') {
            return view('front.contact', compact('contactBreadcrumb', 'contact'));
        }
        else {
            return view('front.arabic.contact', compact('contactBreadcrumb', 'contact'));
        }
    }

    public function storeCustomerInquiry(CustomerInquiryRequest $customerInquiryRequest)
    {
        $result = $this->customerInquiryInterface->store($customerInquiryRequest);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function appointment(Request $request)
    {
        $appointmentBreadcrumb = $this->breadCrumbInterface->list(null, 'appointment')->first();
        $appointment = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'appointment')->first();

        if (app()->getLocale() == 'en') {
            return view('front.appointment', compact('appointmentBreadcrumb', 'appointment'));
        }
        else{
            return view('front.arabic.appointment', compact('appointmentBreadcrumb', 'appointment'));
        }
    }

    public function storeAppointment(AppointmentRequest $appointmentRequest)
    {
        $result = $this->appointmentInterface->store($appointmentRequest);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function changeLocale(Request $request, $locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]);
        }

        return to_route('index');
    }
}
