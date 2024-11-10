<?php

namespace App\Repositories;

use App\Interfaces\AppointmentInterface;
use App\Models\Appointment;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppointmentRepository implements AppointmentInterface
{
    public function list($id = null)
    {
        if (isset($id)) Appointment::where("id", $id)->get();

        else $data = Appointment::all();

        return $data;
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $appointment = new Appointment();
            $appointment->first_name = $request->first_name;
            $appointment->last_name = $request->last_name;
            $appointment->email = $request->email;
            $appointment->phone = $request->phone;
            $appointment->reason = $request->reason;
            $appointment->first_choice_date = $request->first_date;
            $appointment->first_choice_time = $request->first_time;
            $appointment->second_choice_date = $request->second_date;
            $appointment->second_choice_time = $request->second_time;
            $appointment->save();
            DB::commit();
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
            Appointment::destroy($id);
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Appointment Deleted";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
