<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface BreadCrumbInterface
{
    public function list($id = null, $slug = null);
    public function store(Request $request);
}
