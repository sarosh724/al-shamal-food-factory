<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Interfaces\OurTeamInterface;
use Illuminate\Http\Request;
use App\Http\Requests\OurTeamRequest;
use App\Traits\ResponseTrait;
use stdClass;
use Yajra\DataTables\Facades\DataTables;

class OurTeamController extends Controller
{
    use ResponseTrait;
    protected OurTeamInterface $ourTeamInterface;

    public function __construct(OurTeamInterface $ourTeamInterface)
    {
        $this->ourTeamInterface = $ourTeamInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->ourTeamInterface->list($request)->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return @$data->name;
                })
                ->addColumn('designation', function ($data) {
                    return @$data->designation;
                })
                ->addColumn('image', function ($data) {
                    return '<a href="' . @$data->image . '" target="_blank" title="View Image" data-fancybox="gallery" data-id="' . @$data->id . '"
                    class="btn btn-sm" ><i class="fa fa-image color-gray"></i></a>';
                })
                ->addColumn('status', function ($data) {
                    return badge($data->status);
                })
                ->addColumn('actions', function ($data) {
                    $actions = '';

                    $actions .= '<a href="javascript:void(0);" title="Edit" data-id="' . @$data->id . '"
                    class="btn btn-sm btn-edit me-1" ><i class="fa fa-pencil color-gray"></i></a>';

                    $statusIcon = $data->status == 'active' ? 'fa-lock' : 'fa-unlock';
                    $statusTitleText = $data->status == 'active' ? 'Deactivate' : 'Activate';

                    $actions .= '<a href="javascript:void(0);" title="' . $statusTitleText . '" data-id="' . @$data->id . '" data-status="' . @$data->status . '"
                    class="btn btn-sm btn-status me-1" ><i class="fa ' . $statusIcon . ' color-gray"></i></a>';


                    return $actions;
                })
                ->rawColumns(['actions', 'status', 'image'])
                ->make(true);
        }

        return view('admin.our-teams.listing');
    }

    public function modal(Request $request)
    {
        $title = "Add Our Team";
        $ourTeam = new stdClass();

        if (isset($request->id)) {
            $title = "Edit Our Team";
            $ourTeam = $this->ourTeamInterface->list($request, $request->id)->first();
        }

        return $this->formModal($title, "admin.our-teams.form", ["ourTeam" => $ourTeam]);
    }

    public function store(OurTeamRequest $request)
    {
        $result = $this->ourTeamInterface->store($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function updateStatus(Request $request)
    {
        $result = $this->ourTeamInterface->updateStatus($request);

        return $this->jsonResponse($result["type"], $result["message"]);
    }

    public function destroy(Request $request, $id)
    {
        $ourTeam = $this->ourTeamInterface->list($request, $id)->first();

        if (!$ourTeam) {
            return $this->jsonResponse("error", "Record not found");
        }

        $result = $this->ourTeamInterface->destroy($id);

        return $this->jsonResponse($result["type"], $result["message"]);
    }
}

