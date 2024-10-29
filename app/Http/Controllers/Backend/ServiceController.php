<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceImageUploadRequest;
use App\Interfaces\ServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    use ResponseTrait;
    protected ServiceInterface $serviceInterface;

    public function __construct(ServiceInterface $serviceInterface)
    {
        $this->serviceInterface = $serviceInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->serviceInterface->list($request)->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title_english', function ($data) {
                    return @$data->title_english;
                })
                ->addColumn('title_arabic', function ($data) {
                    return @$data->title_arabic;
                })
                ->addColumn('status', function ($data) {
                    return badge($data->status);
                })
                ->addColumn('actions', function ($data) {
                    $actions = '';
                    if ($data->status <> 'deleted') {

                        $actions .= '<a href="javascript:void(0);" title="View/Upload Images" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-images me-1" ><i class="fa fa-image color-gray"></i></a>';

                        $actions .= '<a href="javascript:void(0);" title="Edit" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';


                        $statusIcon = $data->status == 'active' ? 'fa-lock' : 'fa-unlock';
                        $statusTitleText = $data->status == 'active' ? 'Deactivate' : 'Activate';

                        $actions .= '<a href="javascript:void(0);" title="' . $statusTitleText . '" data-id="' . @$data->id . '" data-status="' . @$data->status . '"
                    class="btn btn-sm btn-status me-1" ><i class="fa ' . $statusIcon . ' color-gray"></i></a>';

                        $actions .= '<a href="javascript:void(0);" title="Delete" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-delete" ><i class="fa fa-trash color-gray"></i></a>';
                    }

                    return $actions;
                })
                ->rawColumns(['actions', 'status'])
                ->make(true);
        }

        return view('admin.services.listing');
    }

    public function modal(Request $request)
    {
        $title = "Add Service";
        $service = new stdClass();

        if (isset($request->id)) {
            $title = "Edit Service";
            $service = $this->serviceInterface->list($request, $request->id)->first();
        }

        return $this->formModal($title, "admin.services.form", ["service" => $service]);
    }

    public function imageModal(Request $request, $id)
    {
        $service = $this->serviceInterface->list($request, $id)->first();

        return $this->formModal('Service Images', "admin.services.image-modal", ["service" => $service]);
    }

    public function uploadImage(ServiceImageUploadRequest $request)
    {
        $result = $this->serviceInterface->imageUpload($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function deleteImage($id)
    {
        $result = $this->serviceInterface->imageDelete($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }


    public function store(ServiceRequest $request)
    {
        $result = $this->serviceInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function updateStatus(Request $request)
    {
        $result = $this->serviceInterface->updateStatus($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy(Request $request, $id)
    {
        $service = $this->serviceInterface->list($request, $id)->first();

        if (!$service) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->serviceInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
