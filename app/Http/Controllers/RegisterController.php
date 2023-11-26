<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){

        return view('Auth.register');
    }

    public function store(Request $request){

        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
            'image' => 'nullable|image',
            'category_type' =>'required',
            'user_type' => 'required'
        ])->validate();


        $user = new User();
        
        $profile_pic= null;

        if ($request->hasFile('image')) {

            if(!Storage::exists('public/upload/profile')){
                Storage::makeDirectory('public/upload/profile');
            }
            $file = $request->file('image');
            $itemRef = Str::uuid()->toString();
            $fileName = $itemRef.$file->getClientOriginalExtension();
            $file->move(public_path('upload/profile'),$fileName);

            $profile_pic = '/upload/profile'. '/' . $fileName;

            $user->image = $profile_pic;

        }else{
            dd('nothing to request');
        }


            if($request->password == $request->confirm_password){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->category_type = $request->category_type;
                $user->user_type = $request->user_type;
                $user->save();

               

                session()->flash('success', "Successful");
                return redirect('/dashboard');
        
            }else {
                session()->flash('error', "password did not match");
                session()->flash('errors', "Something Went Wrong");
                return redirect()->back();
            }
       
    }

    public function logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended(route('login'));

    }
}
