<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\PageInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    use ResponseTrait;
    protected PageInterface $pageInterface;

    public function __construct(PageInterface $pageInterface)
    {
        $this->pageInterface = $pageInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->pageInterface->list($request)->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('slug', function ($data) {
                    return @$data->slug;
                })
                ->addColumn('title_english', function ($data) {
                    return @$data->title_english;
                })
                ->addColumn('title_arabic', function ($data) {
                    return @$data->title_arabic;
                })
                ->addColumn('description_english', function ($data) {
                    return @$data->description_english;
                })
                ->addColumn('description_arabic', function ($data) {
                    return @$data->description_arabic;
                })
                ->addColumn('image', function ($data) {
                    return '<a href="' . @$data->image . '" target="_blank" title="View Image" data-fancybox="gallery" data-id="' . @$data->id . '"
                    class="btn btn-sm" ><i class="fa fa-image color-gray"></i></a>';
                })
                ->addColumn('status', function ($data) {
                    return badge($data->status);
                })
                ->addColumn('actions', function ($data) {
                    $actions = '';

                        $actions .= '<a href="javascript:void(0);" title="Edit" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';

                        $statusIcon = $data->status == 'active' ? 'fa-lock' : 'fa-unlock';
                        $statusTitleText = $data->status == 'active' ? 'Deactivate' : 'Activate';

                        $actions .= '<a href="javascript:void(0);" title="' . $statusTitleText . '" data-id="' . @$data->id . '" data-status="' . @$data->status . '"
                    class="btn btn-sm btn-status me-1" ><i class="fa ' . $statusIcon . ' color-gray"></i></a>';


                    return $actions;
                })
                ->rawColumns(['actions', 'status', 'image'])
                ->make(true);
        }

        return view('admin.pages.listing');
    }

    public function modal(Request $request)
    {
        $title = "Add Page";
        $page = new stdClass();

        if (isset($request->id)) {
            $title = "Edit Page";
            $page = $this->pageInterface->list($request, $request->id)->first();
        }

        return $this->formModal($title, "admin.pages.form", ["page" => $page]);
    }

    public function store(PageRequest $request)
    {
        $result = $this->pageInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function updateStatus(Request $request)
    {
        $result = $this->pageInterface->updateStatus($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy(Request $request, $id)
    {
        $page = $this->pageInterface->list($request, $id)->first();

        if (!$page) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->pageInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
