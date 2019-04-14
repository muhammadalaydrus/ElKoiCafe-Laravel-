<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class ProfileController extends Controller
{
    public function index($id){
      $user = User::find($id);

      return view('profile.showProfile', compact('user'));
    }

    public function showUpdateProfileForm($id){
      $user = User::find($id);

      return view('profile.showUpdateForm',compact('user'));
    }

    public function patchProfile(Request $request,$id){
      $user = User::find($id);
      $this->validate($request,[
          'name' => 'required|min:5|max:25',
          'email' => 'required|email|unique:users,email',
          'phone' => 'required|numeric',
          'gender' => 'required',
          'address' => 'required|min:10',
          'image' => 'required',
      ]);

      $image = $request->file('image');
      $filename = str_random(10) . $image->getClientOriginalName();
      $image->move(public_path('/memberPict/') , $filename);

      $user->name  = $request['name'];
      $user->email = $request['email'];
      $user->phone = $request['phone'];
      $user->gender = $request['gender'];
      $user->address = $request['address'];
      $user->image = $filename;
      $user->save();

      return redirect('/');

    }
}
