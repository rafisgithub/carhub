<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\BidderRegistration;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPublicInformation;

class UserInforamationController extends Controller
{
    public function userProfile()
    {
        $user_id = auth()->user()->id;
        $user =  UserPublicInformation::where('user_id', $user_id)->first();
        // this user bidding registration


        $mylistings = Car::where('user_id', $user_id)->where('status', 1)
        ->with('auctionTime')
        ->with('carCategory')
        ->with('carTransmission')
        ->get();

        // dd($mylistings);

        $my_registrations_car_ids = BidderRegistration::where('user_id', $user_id)->pluck('car_id')->toArray();

        $my_registrations = Car::whereIn('id', $my_registrations_car_ids)->where('status', 1)
        ->with('auctionTime')
        ->with('carCategory')
        ->with('carTransmission')
        ->get();

        if(!$user) {
            return view('frontend.layouts.profile.index',[
                'image' => null,
            ]);
        }

        return view('frontend.layouts.profile.index',[
            'image' => $user->image,
            'mylistings' => $mylistings,
            'my_registrations'  => $my_registrations,
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
        // dd($image_path);
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

    public function storePublicInformation(Request $request) {
        $request->validate([
            'full_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'biography' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $existingUser = UserPublicInformation::where('user_id', $user_id)->first();

        if($existingUser){
            $existingUser->update([
                'full_name' => $request->full_name,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'biography' => $request->biography,
            ]);
        } else {
            UserPublicInformation::create([
                'user_id' => $user_id,
                'full_name' => $request->full_name,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'biography' => $request->biography,
            ]);
        }
        return response()->json([
            'message' => 'Public information updated successfully',
        ]);

    }

    public function getPublicInformation() {
        $user_id = auth()->user()->id;
        $user = UserPublicInformation::where('user_id', $user_id)->first();
        return response()->json([
            'status' => true,
            'data' => $user,
        ]);
    }

    public function storePrivateInformation(Request $request) {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $existingUser = User::where('id', $user_id)->first();


        if($existingUser) {
            $existingUser->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
            ]);
        } else {
            User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
            ]);
        }

        return response()->json([
            'message' => 'Private information updated successfully',
        ]);

    }
    public function getPrivateInformation() {
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        return response()->json([
            'status' => true,
            'data' => $user,
        ]);
    }

    public function deleteUserAccount() {
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        $user->delete();
        return response()->json([
            'message' => 'User account deleted successfully',
        ]);
    }
}
