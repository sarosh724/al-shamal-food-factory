<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductRepository implements ProductInterface
{
    use ImageTrait;
    public function list($request, $id = null)
    {
        $data = Product::whereRelation('service', 'status', '=', 1);

        if ($request->filled('status') && $request->status <> 'all')   $data->where("products.status", $request->status);

        if ($request->filled('service') && $request->service <> 'all')   $data->where("service_id", $request->service);

        if (isset($id)) $data->where("products.id", $id);

        return $data->orderBy("products.created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $product = isset($request->product_id) ? Product::find($request->product_id) : new Product();
            $product->service_id = $request->service_id;
            $product->title_english = $request->title_english;
            $product->title_arabic = $request->title_arabic;
            $product->detail_english = $request->detail_english;
            $product->detail_arabic = $request->detail_arabic;
            $product->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->product_id) ? "Product updated" : "Product added";
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
            $product = Product::find($id);
            $product->status = 'deleted';
            $product->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Product Deleted";
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
                    $response = $this->uploadImage($image, 'products');
                    if ($response['status']) {
                        $file[] = [
                            'product_id' => $request->product_id,
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
            ProductImage::insert($file);
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
            $image = ProductImage::find($id);
            $response = $this->deleteImage($image->file_name, 'user-uploads/products');
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
            $product = Product::find($request->id);
            $product->status = $request->status == 'active' ? 'inactive' : 'active';
            $product->save();
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
    public function productsByServiceId($id)
    {
        return Product::where('service_id', $id)->where('status', 1);
    }
}
