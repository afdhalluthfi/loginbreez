<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineContorller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //

        $statuses = status::where('user_id',Auth::user()->id)->get();
        // dd($statuses);
        return view('content.timeline',compact('statuses'));
    }
}
