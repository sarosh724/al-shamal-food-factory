<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageUploadRequest;
use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ServiceInterface;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use ResponseTrait;
    protected ProductInterface $productInterface;
    protected ServiceInterface $serviceInterface;

    public function __construct(ProductInterface $productInterface, ServiceInterface $serviceInterface)
    {
        $this->productInterface = $productInterface;
        $this->serviceInterface = $serviceInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productInterface->list($request)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('service', function ($data) {
                    return @$data->service->title_english . '-' . $data->service->title_arabic;
                })
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
                        class="btn btn-sm btn-status me-1"><i class="fa ' . $statusIcon . ' color-gray"></i></a>';


                        $actions .= '<a href="javascript:void(0);" title="Delete" data-id="' . @$data->id . '"
                        class="btn btn-sm btn-delete" ><i class="fa fa-trash color-gray"></i></a>';
                    }

                    return $actions;
                })
                ->rawColumns(['actions', 'status', 'detail_english', 'detail_arabic'])
                ->make(true);
        }

        return view('admin.products.listing');
    }

    public function modal(Request $request)
    {
        $title = "Add Product";
        $product = new stdClass();

        if (isset($request->id)) {
            $title = "Edit Product";
            $product = $this->productInterface->list($request, $request->id)->first();
        }

        return $this->formModal($title, "admin.products.form", ["product" => $product]);
    }

    public function imageModal(Request $request, $id)
    {
        $product = $this->productInterface->list($request, $id)->first();

        return $this->formModal('Product Images', "admin.products.image-modal", ["product" => $product]);
    }

    public function uploadImage(ProductImageUploadRequest $request)
    {
        $result = $this->productInterface->imageUpload($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function deleteImage($id)
    {
        $result = $this->productInterface->imageDelete($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }


    public function store(ProductRequest $request)
    {
        $result = $this->productInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function updateStatus(Request $request)
    {
        $result = $this->productInterface->updateStatus($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy(Request $request, $id)
    {
        $product = $this->productInterface->list($request, $id)->first();

        if (!$product) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->productInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
