<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AppointmentInterface
{
    public function list($id=null);
    public function store(Request $request);
    public function destroy($id);
    public function storeComment(Request $request);
}
