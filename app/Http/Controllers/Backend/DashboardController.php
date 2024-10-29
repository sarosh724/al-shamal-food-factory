<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\DashboardInterface;
use App\Traits\ResponseTrait;
use GuzzleHttp\Psr7\Request;

class DashboardController extends Controller
{
    use ResponseTrait;

    protected $dashboardInterface;

    public function __construct(DashboardInterface $dashboardInterface)
    {
        $this->dashboardInterface = $dashboardInterface;
    }

    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    public function getStats()
    {
        $data = $this->dashboardInterface->getStats();
        return $this->success("Dashboard Stats", $data);
    }
}
