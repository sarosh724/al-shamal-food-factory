<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CustomerInquiryInterface
{
    public function list();
    public function store(Request $request);
    public function destroy($id);
}
