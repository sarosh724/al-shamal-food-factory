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
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class SiteController extends Controller
{

    use ResponseTrait;
    protected SliderInterface $sliderInterface;
    protected ServiceInterface $serviceInterface;
    protected TestimonialInterface $testimonialInterface;
    protected CustomerInquiryInterface $customerInquiryInterface;
    protected PageInterface $pageInterface;
    protected ProductInterface $productInterface;

    public function __construct(SliderInterface $sliderInterface, ServiceInterface $serviceInterface, TestimonialInterface $testimonialInterface, CustomerInquiryInterface $customerInquiryInterface, PageInterface $pageInterface, ProductInterface $productInterface)
    {
        $this->sliderInterface = $sliderInterface;
        $this->serviceInterface = $serviceInterface;
        $this->testimonialInterface = $testimonialInterface;
        $this->customerInquiryInterface = $customerInquiryInterface;
        $this->pageInterface = $pageInterface;
        $this->productInterface = $productInterface;
    }

    public function index(Request $request)
    {
        $sliders = $this->sliderInterface->list($request->merge(['status' => 1]))->get();
        $services = $this->serviceInterface->list($request->merge(['status' => 1]))->get();
        $testimonials = $this->testimonialInterface->list()->get();
        $about = $this->pageInterface->list($request->merge(['status' => 1]), null, 'who-are-we')->first();

        return view('front.index', compact('sliders', 'services', 'testimonials', 'about'));
    }

    public function about(Request $request)
    {
        $about = $this->pageInterface->list($request->merge(['status' => 1]), null, 'who-are-we')->first();

        return view('front.about', compact('about'));
    }

    public function services(Request $request)
    {
        $services = $this->serviceInterface->list($request->merge(['status' => 1]))->get();

        return view('front.service', compact('services'));
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
