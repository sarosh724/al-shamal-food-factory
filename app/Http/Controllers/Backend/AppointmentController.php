<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\AppointmentRequest;
use App\Interfaces\AppointmentInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AppointmentController extends Controller
{
    use ResponseTrait;
    protected AppointmentInterface $customerInquiryInterface;

    public function __construct(AppointmentInterface $customerInquiryInterface)
    {
        $this->customerInquiryInterface = $customerInquiryInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->customerInquiryInterface->list();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('first_name', function ($data) {
                    return @$data->first_name;
                })
                ->addColumn('last_name', function ($data) {
                    return @$data->last_name;
                })
                ->addColumn('email', function ($data) {
                    return @$data->email;
                })
                ->addColumn('reason', function ($data) {
                    return @$data->reason;
                })
                ->addColumn('first_choice_date', function ($data) {
                    return @$data->first_choice_date;
                })
                ->addColumn('first_choice_time', function ($data) {
                    return @$data->first_choice_time;
                })
                ->addColumn('second_choice_date', function ($data) {
                    return @$data->second_choice_date;
                })
                ->addColumn('second_choice_time', function ($data) {
                    return @$data->second_choice_time;
                })
                // ->addColumn('actions', function ($data) {
                //     $actions = '';

                //     // $actions = '<a href="javascript:void(0);" data-id="' . @$data->id . '"
                //     // class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';

                //     // $actions .= '<a href="javascript:void(0);" data-id="' . @$data->id . '"
                //     // class="btn btn-sm btn-delete" ><i class="fa fa-trash color-gray"></i></a>';

                //     return $actions;
                // })
                // ->rawColumns(['actions'])
                ->make(true);
        }

        return view("admin.appointments.listing");
    }

    // public function store(AppointmentRequest $request, $id = null)
    // {
    //     $result = $this->customerInquiryInterface->store($request, $id);

    //     return $this->jsonResponse($result["type"], $result["message"]);
    // }

    public function destroy($id)
    {
        $customerInquiry = $this->customerInquiryInterface->list($id)->first();

        if (!$customerInquiry) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->customerInquiryInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
