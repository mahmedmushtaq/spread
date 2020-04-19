<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;

class ProfileController extends Controller
{
    //

    public function editOwnProfile(){

        //   return view("<div>Hello world</div>");

        return view("admin.users.profile",[
            'user'=>auth()->user()
        ]);
    }

    public function updateOwnProfile(Request $request){
        $id = auth()->user()->id;
        $profile = Profile::find($id);
        $user = User::find($id);


        $data = $request->only(['name','email','password','about','facebook','youtube','linkedIn','twitter']);


        if($request->hasFile('avatar')) {
            if(strpos($profile->avatar,'updated')){
                File::delete($profile->avatar);
            }
            $avatar = $request->avatar;

            $avatar_new_image = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars/updated/', $avatar_new_image);
            $data['avatar'] = "uploads/avatars/updated/".$avatar_new_image;
        }



        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['email']);
        $user->save();
        $profile->about  =$data['about'];
        $profile->facebook  =$data['facebook'];
        $profile->youtube  =$data['youtube'];
        $profile->linkedIn = $data['linkedIn'];
        $profile->twitter = $data['twitter'];

        if(isset($data['avatar']))
           $profile->avatar  =$data['avatar'];

        $profile->save();


       // $profile->update($data);
        session()->flash("success","Profile Updated Successfully");
        return redirect()->back();


    }
}
