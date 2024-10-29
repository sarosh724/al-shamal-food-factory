<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserInterface
{
    public function getProfile()
    {
        return User::find(getLoggedUserID());
    }

    public function updateProfile($request){
        $response['type'] = 'error';
        try{
            DB::beginTransaction();
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->save();
            DB::commit();
            $response['type'] = 'success';
            $response['message'] = 'Profile updated';
        }
        catch(Exception $e){
            DB::rollBack();
            Log::debug($e->getMessage());
            $response['message'] = 'Something went wrong, please contact your system administrator';
        }

        return $response;
    }

    public function changePassword($request)
    {
        $result["type"] = "error";
        try {
            DB::beginTransaction();
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            $result["type"] = "success";
            $result["message"] = "Password updated";
        } catch (Exception $exception) {
            DB::rollBack();
            $result["message"] = 'Something went wrong, please contact your system administrator';
            Log::debug($exception->getMessage());
        }

        return $result;
    }
}
