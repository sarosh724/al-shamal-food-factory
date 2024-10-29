<?php

namespace App\Repositories;

use App\Interfaces\DashboardInterface;
use App\Models\CustomerInquiry;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;

class DashboardRepository implements DashboardInterface
{
    public function getStats()
    {
        $data = [];
        $data['total_services'] = Service::count();
        $data['total_products'] = Product::count();
        $data['total_sliders'] = Slider::count();
        $data['total_inquiries'] = CustomerInquiry::count();

        return $data;
    }
}

