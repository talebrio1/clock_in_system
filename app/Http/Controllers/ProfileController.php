<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrfail($user_id);
        return view('Admin.profile',compact('user'));
    }

    public function store(Request $request)
    {
        try {

            
            $img = $request->file('profile');
            $imgName = time().$img->getClientOriginalName();
            $img->move(public_path('upload/profile'),$imgName);

            $profilePic = '/upload/profile/'.$imgName;

            $user_id = Auth::user()->id;
            $user = User::findOrfail($user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $profilePic;
            $user->save();
    
            if(Profile::all()->count() == 0 ){
                $profile = new Profile();
                $profile->user_id = Auth::user()->id;
                $profile->company = $request->company;
                $profile->address = $request->address;
                $profile->city = $request->city;
                $profile->country = $request->country;
                $profile->about_me = $request->bio;
                $profile->save();
            }else{
                $profile = Profile::where('user_id',$user_id)->first();

                if($request->has('company') && $request->company !== null){
                    $profile->company = $request->company;
                }
                if($request->has('address') && $request->address !== null){
                    $profile->address = $request->address;
                }

                if($request->has('city') && $request->city !== null){
                    $profile->city = $request->city;
                }
                if($request->has('country') && $request->counrty !== null){
                    $profile->country = $request->country;
                }
                if($request->has('bio') && $request->bio !== null){
                    $profile->about_me = $request->bio;
                }

                $profile->save();
                
            }
           

            return redirect()->back()->with('success', "Sucessfully Register");

        }catch(Exception $e){
            echo $e;
        }

    }

    public function userProfile()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrfail($user_id);
        return view('User.profile',compact('user'));
    }

    public function userStore(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'profile' => 'required|image',
            
        ])->validate();
        try {

           
            
            $img = $request->file('profile');
            $imgName = time().$img->getClientOriginalName();
            $img->move(public_path('upload/profile'),$imgName);

            $profilePic = '/upload/profile/'.$imgName;

            $user_id = Auth::user()->id;
            $user = User::findOrfail($user_id);
            $user->name = $request->name;
            $user->image = $profilePic;
            $user->save();
    
            if(Profile::all()->count() == 0 ){
                $profile = new Profile();
                $profile->user_id = Auth::user()->id;
                $profile->company = $request->company;
                $profile->address = $request->address;
                $profile->city = $request->city;
                $profile->country = $request->country;
                $profile->about_me = $request->bio;
                $profile->save();
            }else{
                $profile = Profile::where('user_id',$user_id)->first();

                if($request->has('company') && $request->company !== null){
                    $profile->company = $request->company;
                }
                if($request->has('address') && $request->address !== null){
                    $profile->address = $request->address;
                }

                if($request->has('city') && $request->city !== null){
                    $profile->city = $request->city;
                }
                if($request->has('country') && $request->counrty !== null){
                    $profile->country = $request->country;
                }
                if($request->has('bio') && $request->bio !== null){
                    $profile->about_me = $request->bio;
                }

                $profile->save();
                
            }
           

            return redirect()->back()->with('success', "Sucessfully Register");

        }catch(Exception $e){
            echo $e;
        }
    }
}
