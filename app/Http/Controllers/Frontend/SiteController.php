<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

    public function __construct(SliderInterface $sliderInterface, ServiceInterface $serviceInterface, TestimonialInterface $testimonialInterface, CustomerInquiryInterface $customerInquiryInterface, PageInterface $pageInterface, ProductInterface $productInterface, OurTeamInterface $ourTeamInterface, BreadCrumbInterface $breadCrumbInterface)
    {
        $this->sliderInterface = $sliderInterface;
        $this->serviceInterface = $serviceInterface;
        $this->testimonialInterface = $testimonialInterface;
        $this->customerInquiryInterface = $customerInquiryInterface;
        $this->pageInterface = $pageInterface;
        $this->productInterface = $productInterface;
        $this->ourTeamInterface = $ourTeamInterface;
        $this->breadCrumbInterface = $breadCrumbInterface;
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

        return view('front.index', compact('slider', 'services', 'testimonials', 'companyHistory', 'ourMission', 'anyQuestion', 'service', 'testimonial', 'appointment'));
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


        return view('front.about', compact('aboutBreadcrumb', 'whoWeAre', 'ourMission', 'ourVision', 'whyUs', 'meetOurTeam', 'testimonial', 'testimonials', 'teamMembers'));
    }

    public function services(Request $request)
    {
        $serviceBreadcrumb = $this->breadCrumbInterface->list(null, 'service')->first();
        $services = $this->serviceInterface->list($request->merge(['status' => 'active']))->get();

        return view('front.services', compact('services', 'serviceBreadcrumb'));
    }

    public function serviceDetails(Request $request, $slug)
    {
        $service = $this->serviceInterface->list($request->merge(['status' => 'active', 'slug' => $slug]))->first();
        if(is_null($service))
        {
            abort('404');
        }
        $appointment = $this->pageInterface->list($request->merge(['status' => 'active']), null, 'appointment')->first();

        return view('front.services-details', compact('service', 'appointment'));
    }

    public function serviceProducts(Request $request, $id)
    {
        $service = $this->serviceInterface->list($request->merge(['status' => 1]), $id)->first();
        $products = $this->productInterface->productsByServiceId($id)->get();

        return view('front.products', compact('products', 'service'));
    }

    public function contactUs()
    {
        return view('front.contact');
    }

    public function storeCustomerInquiry(CustomerInquiryRequest $customerInquiryRequest)
    {
        $result = $this->customerInquiryInterface->store($customerInquiryRequest);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

}
