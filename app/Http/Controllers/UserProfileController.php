<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Vanilo\Product\Models\ProductProxy;
use Auth;

class UserProfileController extends Controller
{
    //
    public function show($id)
    {
        $user = User::find($id)->first();
        $products = ProductProxy::where('user_id',$id)->where('state','active')->get();
        return view('customer.profile.profile', compact('user','products'));
    }

    public function showUser($id)
    {
        $user = User::find($id);
        return view('customer.profile.user_profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/user_profile/'.$id);
    }

    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload avatar.');
    }
}
