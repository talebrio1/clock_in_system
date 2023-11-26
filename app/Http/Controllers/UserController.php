<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function show()
    {

        $users = User::all();

        return view('Admin.alluser', ['users' => $users]);
    }

    public function create()
    {

        $categories = Category::all();

        return view('Admin.adduser', ['categories' => $categories]);
    }

    public function store()
    {

        return view('Admin.alluser');
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        $categories = Category::all();
        return view('Admin.edituser',['user'=>$user, 'categories'=>$categories]);
    }

    public function update(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
            'image' => 'nullable|image',
            'category_type' =>'required',
            'user_type' => 'required'
        ]);

        if($validation->failed()){
            return redirect()->back()
                    ->withErrors($validation)
                    ->withInput();

        }

        $user =  User::findOrfail($id);

        $profile_pic= null;

        if($request->hasFile('image')){

            if(!Storage::exists('public/upload/profile')){
                Storage::makeDirectory('public/upload/profile');
            }

            $file = $request->file('image');
            $itemRef = Str::uuid()->toString();
            $fileName = $itemRef.$file->getClientOriginalExtension();
            $file->move(public_path('upload/profile'),$fileName);

            $profile_pic = '/upload/profile'. '/' . $fileName;

            $user->image = $profile_pic;
        }


            if($request->password == $request->confirm_password){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->category_type = $request->category_type;
                $user->user_type = $request->user_type;
                $user->save();

                session()->flash('success', "Updated Successfully");
                return redirect('/dashboard');
        
            }else {
                session()->flash('errors', "Something Went Wrong");
                return redirect()->back();
            }
    }



    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->back();
    }
}
