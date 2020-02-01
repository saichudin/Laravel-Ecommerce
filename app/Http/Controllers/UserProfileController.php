<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Vanilo\Product\Models\ProductProxy;

class UserProfileController extends Controller
{
    //
    public function show($id)
    {
        $user = User::find($id)->first();
        $products = ProductProxy::where('user_id',$id)->get();
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
}
