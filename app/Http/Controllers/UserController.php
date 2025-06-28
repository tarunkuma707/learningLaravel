<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showUsers(){
        $allusers   =    User::get();
        return view('users',compact('allusers'));
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|max:100|unique:users,email',
            'password'=>'required|max:8|min:6'
        ]);
        User::create(
            [
                'name'      =>  $request->name,
                'email'     =>  $request->email,
                'password'  =>  $request->password
            ]
        );
        return redirect('allusers')->with('message', 'Record added successfully!');
    }

    function update(Request $request){
        $currentUser    =    User::findorFail($request->id);
        return view('update',compact('currentUser'));
    }

    function updateuser(Request $request){
         $request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|max:100',
            'password'=>'required|max:8|min:6'
        ]);
        $userId         =   $request->id;
        $user           =   User::find($userId);
        $user->name     =   $request->name;
        $user->email    =   $request->email;
        $user->password =   $request->password;
        $user->save();
        return redirect('allusers')->with('message', 'Record added successfully!');
    }
}
