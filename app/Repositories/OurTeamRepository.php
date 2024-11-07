<?php

namespace App\Repositories;

use App\Interfaces\OurTeamInterface;
use App\Models\OurTeam;
use App\Traits\ImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OurTeamRepository implements OurTeamInterface
{
    use ImageTrait;
    public function list($request, $id = null)
    {
        $data = OurTeam::select('*');

        if ($request->filled('status') && $request->status <> 'all')   $data->where("status", $request->status);

        if (isset($id)) $data->where("our_teams.id", $id);

        return $data->orderBy("our_teams.created_at", "DESC");
    }

    public function store(Request $request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $page = isset($request->our_team_id) ? OurTeam::find($request->our_team_id) : new OurTeam();
            $page->name = $request->name;
            $page->designation = $request->designation;
            if (isset($request->image) && $request->image != 'undefined') {
                $response = $this->uploadImage($request->image, 'pages');
                if ($response['status']) {
                    $page->image = $response['path'];
                }
            }
            $page->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = isset($request->page_id) ? "Team Member Updated" : "Team Memeber Added";
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
            $page = OurTeam::find($id);
            $page->status = 'deleted';
            $page->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Team Member Deleted";
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
            $page = OurTeam::find($request->id);
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
