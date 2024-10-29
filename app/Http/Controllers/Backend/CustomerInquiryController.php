<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\CustomerInquiryRequest;
use App\Interfaces\CustomerInquiryInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerInquiryController extends Controller
{
    use ResponseTrait;
    protected CustomerInquiryInterface $customerInquiryInterface;

    public function __construct(CustomerInquiryInterface $customerInquiryInterface)
    {
        $this->customerInquiryInterface = $customerInquiryInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->customerInquiryInterface->list();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return @$data->name;
                })
                ->addColumn('email', function ($data) {
                    return @$data->email;
                })
                ->addColumn('phone_number', function ($data) {
                    return @$data->phone_number;
                })
                ->addColumn('message', function ($data) {
                    return @$data->message;
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

        return view("admin.customer-inquiries.listing");
    }

    public function store(CustomerInquiryRequest $request, $id = null)
    {
        $result = $this->customerInquiryInterface->store($request, $id);

        // return $result;
    }

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
