<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserInterface
{
    public function getProfile();
    public function updateProfile($request);
    public function changePassword($request);
}
