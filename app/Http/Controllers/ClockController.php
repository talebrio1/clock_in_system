<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Clock;
use Illuminate\Support\Facades\Log;

class ClockController extends Controller
{
    public function store(Request $request){

        $user = auth()->user();
        $user_id = $user->id;
        $date = Carbon::now()->toDateString();

       // dd(Clock::where('user_id',$user_id)->latest()->first());
        $clock = Clock::where('user_id',$user_id)
                ->where('date',Carbon::now()->toDateString())->first();
        
       
         if( $clock ){

                if ( $clock->status == 2 && $date == $clock->date) {
   
                 return redirect()->back()->with('error','you can only clock in again the next day');

                }
        }
     

        if( empty($request->clock_out) ){


            $clock = new Clock();
            $clock->clock_in = $request->clock_in;
            $clock->clock_out = null;
            $clock->date = Carbon::now()->toDateString();
            $clock->user_id = $user_id;
            $clock->status = 1;
            $clock->save();


            return redirect()->back();
        


        }else {

            //$clock = Clock::where('user_id',$user_id)->latest()->first();

            $clock = Clock::where('user_id',$user_id)
                            ->where('date',Carbon::now()->toDateString())->first();


            $clock->clock_out = $request->clock_out;
            $clock->status = 2;
                $clock->save();
    
                return redirect()->back();


        }




    }
}
