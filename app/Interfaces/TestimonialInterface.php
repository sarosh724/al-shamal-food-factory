<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface TestimonialInterface
{
    public function list($id = null);
    public function store(Request $request);
    public function destroy($id);
}
