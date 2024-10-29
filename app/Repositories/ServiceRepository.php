<?php

namespace App\Repositories;

use App\Interfaces\ServiceInterface;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceRepository implements ServiceInterface
{
    use ImageTrait;
    public function list($request, $id = null)
    {
        $data = Service::select('*');

        if ($request->filled('status') && $request->status <> 'all')   $data->where("status", $request->status);

        if (isset($id)) $data->where("services.id", $id);

        return $data->orderBy("services.created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $service = isset($request->service_id) ? Service::find($request->service_id) : new Service();
            $service->title_english = $request->title_english;
            $service->title_arabic = $request->title_arabic;
            $service->detail_english = $request->detail_english;
            $service->detail_arabic = $request->detail_arabic;
            $service->seo_title = $request->seo_title;
            $service->seo_keywords = $request->seo_keywords;
            $service->seo_description = $request->seo_description;
            $service->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->service_id) ? 'Service Update' : 'Service Added';
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
            $service = Service::find($id);
            $service->status = 'deleted';
            $service->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Service Deleted";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }

    public function imageUpload($request)
    {
        $result["type"] = "error";
        $file = [];
        try {
            DB::beginTransaction();
            foreach ($request->images as $image) {
                if (isset($image) && $image != 'undefined') {
                    $response = $this->uploadImage($image, 'services');
                    if ($response['status']) {
                        $file[] = [
                            'service_id' => $request->service_id,
                            'file_name' => $response['filename'],
                            'path' => $response['path']
                        ];
                    }
                } else {
                    $result["type"] = "error";
                    $result["message"] = "No file was found, please attach a valid file";
                    return $result;
                }
            }
            ServiceImage::insert($file);
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Image upload successful";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = "Something went wrong, please contact your system administrator";
            Log::debug($exception->getMessage());
        }

        return $result;
    }

    public function imageDelete($id)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $image = ServiceImage::find($id);
            $response = $this->deleteImage($image->file_name, 'user-uploads/services');
            if ($response['status']) {
                $image->forceDelete();
            }
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Image Deleted Successful";
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
            $service = Service::find($request->id);
            $service->status = $request->status == 'active' ? 'inactive' : 'active';
            $service->save();
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
