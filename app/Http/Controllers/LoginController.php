<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){

        return view('Auth.login');
    }

    public function store(Request $request){

        $validation = Validator::make($request->all(),[
            'email' => 'required',
            'password'=> 'required'
        ])->validate();
       
        

        $credentail = $request->only('email','password');
        if (Auth::attempt($credentail)) {

            $user = auth()->user();
            $user_type = $user->user_type;

            $admins = User::where('user_type','admin')->get();
            $newUser = User::find($user->id);

           Notification::send($admins,new UserLogin($newUser));
            
            if($user_type == 'admin'){
            
                return redirect()->route('dashboard');

            }elseif($user_type == 'user'){

                return redirect()->route('user.dashboard');
    
            }else {

                return redirect()->back()->with('error', 'incorrect logins details');

            }

        }else {
            return redirect()->back()->with('error', 'incorrect logins details');
        }

    }

}
