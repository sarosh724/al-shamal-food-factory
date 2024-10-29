<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Interfaces\UserInterface;
use App\Traits\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;
    protected UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function profile()
    {
        $user = $this->userInterface->getProfile();

        return view('admin.auth.profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $updateProfileRequest)
    {
        $result = $this->userInterface->updateProfile($updateProfileRequest);

        return to_route("admin.profile")->with($result["type"], $result["message"]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $result = $this->userInterface->changePassword($request);

        return to_route("admin.profile")->with($result["type"], $result["message"]);
    }
}
