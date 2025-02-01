<?php

namespace App\Repositories;


use App\Interfaces\CustomerInquiryInterface;
use App\Models\CustomerInquiry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerInquiryRepository implements CustomerInquiryInterface
{
    public function list($id = null)
    {
        if (isset($id)) $data = CustomerInquiry::where("id", $id)->get();

        else $data = CustomerInquiry::all();

        return $data;
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $customerInquiry = new CustomerInquiry();
            $customerInquiry->name = $request->name;
            $customerInquiry->email = $request->email;
            $customerInquiry->phone_number = $request->phone;
            $customerInquiry->message = $request->message;
            $customerInquiry->save();
            DB::commit();
            sendEmail($request->email, 'Customer Inquiry', ['userName' => $request->name], 'customer-inquiry');
            sendEmail(getAdmin()->email, 'New Customer Inquiry', ['name' => $customerInquiry->name, 'email' => $customerInquiry->email, 'phone' => $customerInquiry->phone_number, 'msg' => $customerInquiry->message], 'customer-inquiry-admin');
            $result["type"] = "success";
            $result["message"] = "Thanks for contacting us, We will respond soon!";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }

    public function destroy($id)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            CustomerInquiry::destroy($id);
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Customer inquiry Deleted";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }

    public function storeComment(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $customerInquiry = CustomerInquiry::find($request->customer_inquiry_id);
            $customerInquiry->comment = $request->comment;
            $customerInquiry->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Comment is updated";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
