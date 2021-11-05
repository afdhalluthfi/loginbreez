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
        // $following =Auth::user()->follower->pluck('id');
        // $statuses = status::whereIn('user_id',$following)
        //                                         ->orWhere('user_id',Auth::user()->id)
        //                                         ->latest()
        //                                         ->get();
        // dd($statuses);
        $statuses=Auth::user()->timeline();
        
        return view('content.timeline',compact('statuses'));
    }
}
