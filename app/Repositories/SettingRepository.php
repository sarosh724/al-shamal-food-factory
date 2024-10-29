<?php

namespace App\Repositories;

use App\Interfaces\SettingInterface;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingRepository implements SettingInterface
{
    public function list($id = null)
    {
        $data = Setting::select('*');

        if (isset($id)) $data->where("id", $id);

        return $data;
    }

    public function store($request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            Setting::where('id', $request->id)->update(['value' => $request->value]);
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "setting updated";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
