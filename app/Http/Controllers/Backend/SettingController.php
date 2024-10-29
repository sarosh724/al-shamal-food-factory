<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\SettingInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    use ResponseTrait;
    protected SettingInterface $settingInterface;

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index(Request $request)
    {
        $settings = $this->settingInterface->list()->get();

        return view('admin.settings.listing', compact('settings'));
    }

    public function store(Request $request)
    {
        $result = $this->settingInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
