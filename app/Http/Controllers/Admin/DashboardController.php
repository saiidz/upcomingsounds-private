<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auction as AuctionResource;
use App\Models\Auction;
use App\Models\AuctionVehicle;
use App\Models\Bid;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function index(){

        return view('admin.pages.dashboard');
    }

    // Profile update
    public function profile(){
        $profile = Auth::user();
        return view('admin.pages.admin-profile',get_defined_vars());
    }

    // storeProfile
    public function storeProfile(Request $request,User $profile){
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|min:2|max:60',
            'email'        => 'required|string|email|min:10|max:60|unique:users,email,'. $profile->id,
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|max:14|unique:users,phone_number,'. $profile->id,
            'profile'      => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input             = $request->all();
        $input['name']     = $request->get('name') ? $request->get('name') : $profile->name;
        $input['password'] = $request->get('password') ? Hash::make($request->get('password')) : $profile->password;

        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $name = $file->getClientOriginalName();
            $image_path = 'default_' . time() . $name;
            $file->move(public_path() . '/uploads/user_profile/', $image_path);
            $input['profile'] = $image_path;
        }
        $profile->update($input);
        return redirect()->back()->with('success','Profile updated successfully.');
    }
}
