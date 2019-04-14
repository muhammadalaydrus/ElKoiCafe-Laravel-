<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Session;

class UserController extends Controller
{
    public function showLoginForm(){
      return view('auth/login');
    }

    public function showRegisterForm(){
      return view('auth/register');
    }

    public function store(Request $request){
      $this->validate($request,[
          'name' => 'required|min:5|max:25',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|alpha_num|min:5',
          'ConfirmPassword' => 'required|same:password',
          'phone' => 'required|numeric',
          'gender' => 'required',
          'address' => 'required|min:10',
          'image' => 'required',
      ]);

      $user = new User;

      $image = $request->file('image');
      $filename = str_random(10) . $image->getClientOriginalName();

      $image->move(public_path('/memberPict/') , $filename);

      $user->name  = $request['name'];
      $user->email = $request['email'];
      $user->password = bcrypt($request['password']);
      $user->phone = $request['phone'];
      $user->gender = $request['gender'];
      $user->address = $request['address'];
      $user->image = $filename;

      $user->save();
      return redirect('/');
    }

    public function login(Request $request){
      $credentials = ['email' => $request->email , 'password' => $request->password];

      if(Auth::guard('web')->attempt($credentials)){
        return redirect('/');
      }
      Session::flash('failed','Wrong Email Or Password');
      return redirect()->back();

    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }

    //======================================== Admin Section Starts Here ================================================================

    public function showUser(){
      $users = User::paginate(4);
      return view('user.manage',compact('users'));
    }

    public function addUser(Request $request){
      $this->validate($request,[
          'name' => 'required|min:5|max:25',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|alpha_num|min:5',
          'phone' => 'required|numeric',
          'gender' => 'required',
          'address' => 'required|min:10',
          'image' => 'required',
      ]);

      $user =  new User;

      $image = $request->file('image');
      $filename = str_random(10) . $image->getClientOriginalName();
      $image->move(public_path('/memberPict/') , $filename);

      $user->name  = $request['name'];
      $user->email = $request['email'];
      $user->password = bcrypt($request['password']);
      $user->phone = $request['phone'];
      $user->gender = $request['gender'];
      $user->address = $request['address'];
      $user->image = $filename;
      $user->save();

      return redirect()->back();
    }

    public function gotoUser($id){
      $user = User::find($id);
      return view('user.view',compact('user'));
    }

    public function userPatchForm($id){
      $user = User::find($id);
      return view('user.update',compact('user'));
    }

    public function patchUser(Request $request,$id){
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

    public function destroyUser($id){
      $user = User::find($id);
      $user->delete();

      return redirect()->back();
    }
}
