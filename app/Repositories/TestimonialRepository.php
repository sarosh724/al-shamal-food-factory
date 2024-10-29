<?php

namespace App\Repositories;

use App\Interfaces\TestimonialInterface;
use App\Models\Testimonial;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestimonialRepository implements TestimonialInterface
{
    use ImageTrait;
    public function list($id = null)
    {
        $data = Testimonial::select('*');

        if (isset($id)) $data->where("testimonials.id", $id);

        return $data->orderBy("testimonials.created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $testimonial = isset($request->testimonial_id) ? Testimonial::find($request->testimonial_id) : new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->comment = $request->comment;
            $testimonial->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->testimonial_id) ? "testimonial updated" : "testimonial added";
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
            $testimonial = Testimonial::find($id);
            $testimonial->delete();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Testimonial Deleted";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
