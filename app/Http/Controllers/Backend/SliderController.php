<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\SliderInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    use ResponseTrait;
    protected SliderInterface $sliderInterface;

    public function __construct(SliderInterface $sliderInterface)
    {
        $this->sliderInterface = $sliderInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->sliderInterface->list($request)->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title_english', function ($data) {
                    return @$data->title_english;
                })
                ->addColumn('title_arabic', function ($data) {
                    return @$data->title_arabic;
                })
                ->addColumn('subtitle_english', function ($data) {
                    return @$data->subtitle_english;
                })
                ->addColumn('subtitle_arabic', function ($data) {
                    return @$data->subtitle_arabic;
                })
                ->addColumn('image_arabic', function ($data) {
                    return '<a href="' . @$data->image_arabic . '" target="_blank" title="View Image" data-fancybox="gallery" data-id="' . @$data->id . '"
                    class="btn btn-sm" ><i class="fa fa-image color-gray"></i></a>';
                })
                ->addColumn('image_english', function ($data) {
                    return '<a href="' . @$data->image_english . '" target="_blank" title="View Image" data-fancybox="gallery" data-id="' . @$data->id . '"
                    class="btn btn-sm" ><i class="fa fa-image color-gray"></i></a>';
                })
                // ->addColumn('status', function ($data) {
                //     return badge($data->status);
                // })
                ->addColumn('actions', function ($data) {
                    $actions = '';

                    // if ($data->status <> 'deleted') {

                        $actions .= '<a href="javascript:void(0);" title="Edit" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';

                        // $statusIcon = $data->status == 'active' ? 'fa-lock' : 'fa-unlock';
                        // $statusTitleText = $data->status == 'active' ? 'Deactivate' : 'Activate';

                    //     $actions .= '<a href="javascript:void(0);" title="' . $statusTitleText . '" data-id="' . @$data->id . '" data-status="' . @$data->status . '"
                    // class="btn btn-sm btn-status me-1" ><i class="fa ' . $statusIcon . ' color-gray"></i></a>';


                    //     $actions .= '<a href="javascript:void(0);" title="Delete" data-id="' . @$data->id . '"
                    // class="btn btn-sm btn-delete" ><i class="fa fa-trash color-gray"></i></a>';
                    // }

                    return $actions;
                })
                ->rawColumns(['actions', 'image_arabic', 'image_english'])
                ->make(true);
        }

        return view('admin.sliders.listing');
    }

    public function modal(Request $request)
    {
        $title = "Add Slider";
        $slider = new stdClass();

        if (isset($request->id)) {
            $title = "Edit Slider";
            $slider = $this->sliderInterface->list($request, $request->id)->first();
        }

        return $this->formModal($title, "admin.sliders.form", ["slider" => $slider]);
    }

    public function store(SliderRequest $request)
    {
        $result = $this->sliderInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function updateStatus(Request $request)
    {
        $result = $this->sliderInterface->updateStatus($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy(Request $request, $id)
    {
        $slider = $this->sliderInterface->list($request, $id)->first();

        if (!$slider) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->sliderInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
