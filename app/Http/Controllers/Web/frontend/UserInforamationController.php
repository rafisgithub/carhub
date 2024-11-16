<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPublicInformation;

class UserInforamationController extends Controller
{
    public function userProfile()
    {
        $user_id = auth()->user()->id;
        $user = UserPublicInformation::where('user_id', $user_id)->first();

        if(!$user) {
            return view('frontend.layouts.profile.index',[
                'image' => null,
            ]);
        }

        return view('frontend.layouts.profile.index',[
            'image' => $user->image,
        ]);
    }

    public function updateProfile(Request $request){
      $request->validate([
        'image' => 'required',
      ]);

    if($request->hasFile('image')){
        $image = $request->file('image');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/frontend/users/profile/'),$image_name);
        $image_path = '/frontend/users/profile/'.$image_name;

    }


        $user_id = auth()->user()->id;
        $existingUser = UserPublicInformation::where('user_id', $user_id)->first();

        if($existingUser) {
            if(file_exists(public_path($existingUser->image))) {
                unlink(public_path($existingUser->image));
            }
            $existingUser->update([
                'image' => $image_path,
            ]);
        } else {
            UserPublicInformation::create([
                'user_id' => $user_id,
                'image' => $image_path,
            ]);
        }

        return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Profile image updated successfully',

                ]);
    }

}
