<?php

namespace App\Interfaces;

interface SettingInterface
{
    public function list($id = null);
    public function store($request);
}
