<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\StatusRequest;

class StatusesController extends Controller
{
    //
    public function store (StatusRequest $request) {
        $request->makeRequest();
        return redirect()->back();
    }
}
