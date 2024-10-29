<?php

namespace App\Repositories;

use App\Interfaces\PageInterface;
use App\Models\Page;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageRepository implements PageInterface
{
    use ImageTrait;
    public function list($request, $id = null, $slug = null)
    {
        $data = Page::select('*');

        if ($request->filled('status') && $request->status <> 'all')   $data->where("status", $request->status);

        if (isset($slug)) $data->where("pages.slug", $slug);

        if (isset($id)) $data->where("pages.id", $id);

        return $data->orderBy("pages.created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $page = isset($request->page_id) ? Page::find($request->page_id) : new Page();
            $page->title_english = $request->title_english;
            $page->title_arabic = $request->title_arabic;
            $page->description_english = $request->description_english;
            $page->description_arabic = $request->description_arabic;
            if (isset($request->image) && $request->image != 'undefined') {
                $response = $this->uploadImage($request->image, 'pages');
                if ($response['status']) {
                    $page->image = $response['path'];
                }
            }
            $page->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->page_id) ? "page updated" : "page added";
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
            $page = Page::find($id);
            $page->status = 'deleted';
            $page->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Page Deleted";
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
            $page = Page::find($request->id);
            $page->status = $request->status == 'active' ? 'inactive' : 'active';
            $page->save();
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
