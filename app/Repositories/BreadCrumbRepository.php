<?php

namespace App\Repositories;

use App\Interfaces\BreadCrumbInterface;
use App\Models\BreadCrumb;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BreadCrumbRepository implements BreadCrumbInterface
{
    public function list($id = null, $slug = null)
    {
        $data = BreadCrumb::select('*');

        if (isset($slug))
            $data->where("slug", $slug);

        if (isset($id))
            $data->where("id", $id);

        return $data->orderBy("created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $breadcrumb = isset($request->breadcrumb_id) ? BreadCrumb::find($request->breadcrumb_id) : new BreadCrumb();
            $breadcrumb->subtitle_english = $request->subtitle_english;
            $breadcrumb->subtitle_arabic = $request->subtitle_arabic;
            $breadcrumb->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->breadcrumb_id) ? "breadcrumb updated" : "breadcrumb added";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
