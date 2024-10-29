<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PageInterface
{
    public function list($request, $id = null, $slug = null);
    public function store(Request $request);
    public function destroy($id);
    public function updateStatus($request);
}
