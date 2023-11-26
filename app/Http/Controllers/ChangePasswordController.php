<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function ChangePassword()
    {
        return view('Admin.changePassword');
    }

    public function store(Request $request)
    {

       Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|confirmed'
           
        ])->validate();


        $user_id = auth()->user()->id;
        
        if(!Hash::check($request->old_password, auth()->user()->password)){

            return redirect()->back()->with('error','Old password is incorrect');
        }

        if($request->password == $request->password_confirmation){

            $user = User::findOrfail($user_id);
            $user->password = Hash::make($request->password);
            $user->save();

        return redirect()->back()->with('success','password change successfully');

        }else{
            return redirect()->back()->with('errorss','password password dont match');

        }
        
    }
}
