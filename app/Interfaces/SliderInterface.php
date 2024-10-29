<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SliderInterface
{
    public function list($request, $id = null);
    public function store(Request $request);
    public function destroy($id);
    public function updateStatus($request);
}
