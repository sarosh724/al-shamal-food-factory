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
    protected AppointmentInterface $appointmentInterface;

    public function __construct(AppointmentInterface $appointmentInterface)
    {
        $this->appointmentInterface = $appointmentInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->appointmentInterface->list();

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
                ->addColumn('phone', function ($data) {
                    return @$data->phone;
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
                ->addColumn('actions', function ($data) {
                    $actions = '';

                    $actions = '<a href="javascript:void(0);" data-id="' . @$data->id . '"
                    class="btn btn-primary btn-sm btn-comment me-1" ><i class="fa fa-pencil mr-1 color-gray"></i>Comment</a>';

                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view("admin.appointments.listing");
    }

    public function commentModal(Request $request)
    {
        $title = "Add Comment";
        $appointment = $this->appointmentInterface->list($request->id)->first();

        return $this->formModal($title, "admin.appointments.comment-form", ["appointment" => $appointment]);
    }

    public function storeComment(Request $request)
    {
        $result = $this->appointmentInterface->storeComment($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy($id)
    {
        $appointment = $this->appointmentInterface->list()->first();

        if (!$appointment) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->appointmentInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}
