<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\TestimonialInterface;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    use ResponseTrait;
    protected TestimonialInterface $testimonialInterface;

    public function __construct(TestimonialInterface $testimonialInterface)
    {
        $this->testimonialInterface = $testimonialInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->testimonialInterface->list()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return @$data->name;
                })
                ->addColumn('designation', function ($data) {
                    return @$data->designation;
                })
                ->addColumn('comment', function ($data) {
                    return @$data->comment;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '';

                    $actions .= '<a href="javascript:void(0);" title="Edit" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';

                    $actions .= '<a href="javascript:void(0);" title="Delete" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-delete" ><i class="fa fa-trash color-gray"></i></a>';

                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.testimonials.listing');
    }

    public function modal(Request $request)
    {
        $title = "Add Testimonial";
        $testimonial = new stdClass();

        if (isset($request->id)) {
            $title = "Edit Testimonial";
            $testimonial = $this->testimonialInterface->list($request->id)->first();
        }

        return $this->formModal($title, "admin.testimonials.form", ["testimonial" => $testimonial]);
    }

    public function store(TestimonialRequest $request)
    {
        $result = $this->testimonialInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy(Request $request, $id)
    {
        $testimonial = $this->testimonialInterface->list($id)->first();

        if (!$testimonial) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->testimonialInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
