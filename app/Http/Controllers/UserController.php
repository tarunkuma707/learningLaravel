<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showPostTitle(){
        //$users  = User::with(['post:user_id,title'])->get();
        // $users  =   User::with(["post:user_id,title"])
        //             ->simplePaginate(100);
        $users  =   User::has("post")->with(["post:user_id,title"])
                    ->simplePaginate(100);
                    return $users;
    }
    public function showUsers(){
        $allusers   =    User::simplePaginate(100);
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

    public function update(Request $request){
        $currentUser    =    User::findorFail($request->id);
        return view('update',compact('currentUser'));
    }



    public function updateuser(Request $request){
         $request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|max:100',
        ]);
        $userId         =   $request->id;
        $user           =   User::find($userId);
        $user->name     =   $request->name;
        $user->email    =   $request->email;
        $user->save();
        return redirect('allusers')->with('message', 'Record added successfully!');
    }

    public function deleteUser(Request $request){
        $deleteUserId   =   User::find($request->id);
        $deleteUserId->delete();
        return redirect('allusers')->with('message', 'User Deleted Successfully!');
    }
}
