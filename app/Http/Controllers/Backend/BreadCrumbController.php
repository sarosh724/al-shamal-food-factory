<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\BreadCrumbInterface;
use Illuminate\Http\Request;
use App\Http\Requests\BreadCrumbRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class BreadCrumbController extends Controller
{
    use ResponseTrait;
    protected BreadCrumbInterface $breadCrumbInterface;

    public function __construct(BreadCrumbInterface $breadCrumbInterface)
    {
        $this->breadCrumbInterface = $breadCrumbInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->breadCrumbInterface->list()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('slug', function ($data) {
                    return @$data->slug;
                })
                ->addColumn('subtitle_english', function ($data) {
                    return @$data->subtitle_english;
                })
                ->addColumn('subtitle_arabic', function ($data) {
                    return @$data->subtitle_arabic;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '';
                    $actions .= '<a href="javascript:void(0);" title="Edit" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';
                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.breadcrumbs.listing');
    }

    public function modal(Request $request)
    {
        if (isset($request->id)) {
            $title = "Edit Breadcrumb";
            $breadCrumb = $this->breadCrumbInterface->list($request->id)->first();
        }

        return $this->formModal($title, "admin.breadcrumbs.form", ["breadCrumb" => $breadCrumb]);
    }

    public function store(BreadCrumbRequest $request)
    {
        $result = $this->breadCrumbInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
