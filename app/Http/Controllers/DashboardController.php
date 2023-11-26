<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Clock;
use App\Notifications\UserLogin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller

{
    public function dashboard(){

        $user = auth()->user();
        $user_type = $user->user_type;

        if($user_type == 'admin'){
            
            $clocks = Clock::all();
            
            return view('Admin.dashboard', ['clocks' => $clocks]);
        }
       
    }

    public function userdasboard(){

        $user = auth()->user();
        $user_type = $user->user_type;
        

        if($user_type == 'user'){

            $clocks = Clock::where('user_id', $user->id)->get();

            $clocks_status = Clock::where('user_id', $user->id)
                                ->where('date',Carbon::now()->toDateString())->first();
            

            if( empty($clocks_status->status )){

                $clock_status = 0;

            }else{
                
                $clock_status = $clocks_status->status;

            }

            return view('User.dashboard',
            [
                'user'=> $user, 
                'data' => $clocks,
                'user_status' => $clock_status
            ]);

        }

    }

    
    public function categories(){

        $categories = Category::all();

        return view('Admin.categories',['categories' => $categories]);
    }

    public function store(Request $request){

        $user = auth()->user();

        $category = new Category();
        $category->name = $request->category_name;
        $category->user_id = $user->id;
        $category->save();

        return redirect()->back();
    }

    public function destroy($id){

        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function history(){

        $clocks = Clock::with('user')->get();

        


        return view('Admin.history',['clocks'=>$clocks]);

    }
    public function userHistory(){

        $user =auth()->user();

        $clocks = Clock::where('user_id',$user->id)->get();

        return view('User.history',['clocks'=>$clocks, 'user'=>$user]);
    }

    
}

