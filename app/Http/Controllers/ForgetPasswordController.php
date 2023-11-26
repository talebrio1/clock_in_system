<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(){

        return view('Auth.forget-password');
    }
    public function forgetPasswordReset(Request $request)
    {   
        
        $validation = Validator::make($request->all(),[
            
            'email' => 'required|email|exists:users',
        ])->validate();

        // if($validation->failed()){
           
        //     return redirect()->back()
        //             ->withErrors($validation)
        //             ->withInput();
        // }
        // dd($validation->failed() );

        $request->session()->put('email', $request->email);

        $token= Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forget-password', ['token'=> $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
           
        });
        

        return view('Auth.forget-password')->with('success','We sent an email to reset your password');
    }

    public function resetPassword(string $token)
    {
        return view('Auth.new-password',['token'=>$token]);
    }
    public function resetPasswordPost(Request $request)
    {
        $validation = Validator::make($request->all(),[
            
            'password' => 'required|string|min:6',
            'confirm_password' => 'required',
        ])->validate();

        if($request->password == $request->confirm_password){

            $updatePassword =  DB::table('password_reset_tokens')
      ->where('token',$request->token)->first();

        if(!$updatePassword){
            return redirect()->back()->with('error','Link expired');
        }

        $email = $request->session()->get('email');

        User::where('email',$email)->update([
            'password'=> Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where([
            'token' => $request->token
        ])->delete();

        return redirect('/login')->with('success', 'password was changed');

        }else{
            session()->flash('error', "password did not match");
                return redirect()->back();
        }

      

    }

}
