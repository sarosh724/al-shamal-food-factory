<?php

namespace App\Repositories;

use App\Interfaces\SliderInterface;
use App\Models\Slider;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderRepository implements SliderInterface
{
    use ImageTrait;
    public function list($request, $id = null)
    {
        $data = Slider::select('*');

        if ($request->filled('status') && $request->status <> 'all')   $data->where("status", $request->status);

        if (isset($id)) $data->where("sliders.id", $id);

        return $data->orderBy("sliders.created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $slider = isset($request->slider_id) ? Slider::find($request->slider_id) : new Slider();
            $slider->title_english = $request->title_english;
            $slider->title_arabic = $request->title_arabic;
            $slider->subtitle_english = $request->subtitle_english;
            $slider->subtitle_arabic = $request->subtitle_arabic;
            $slider->service_id = $request->service_id;
            $slider->product_id = $request->product_id;
            $slider->url = $request->url;
            if (isset($request->image_arabic) && $request->image_arabic != 'undefined') {
                $response = $this->uploadImage($request->image_arabic, 'sliders');
                if ($response['status']) {
                    $slider->image_arabic = $response['path'];
                }
            }

            if (isset($request->image_english) && $request->image_english != 'undefined') {
                $response = $this->uploadImage($request->image_english, 'sliders');
                if ($response['status']) {
                    $slider->image_english = $response['path'];
                }
            }
            $slider->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->slider_id) ? "slider updated" : "slider added";
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
            $slider = Slider::find($id);
            $slider->status = 'deleted';
            $slider->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Slider Deleted";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }

    public function updateStatus($request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $slider = Slider::find($request->id);
            $slider->status = $request->status == 'active' ? 'inactive' : 'active';
            $slider->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Status Updated";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
