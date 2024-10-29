<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProductInterface
{
    public function list($request, $id = null);
    public function store(Request $request);
    public function destroy($id);
    public function imageUpload($request);
    public function imageDelete($id);
    public function updateStatus($request);
    public function productsByServiceId($id);
}
