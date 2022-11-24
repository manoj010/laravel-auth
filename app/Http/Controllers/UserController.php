<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser(Request $request) {
        $request -> validate ([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $data = new User();
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> password=Hash::make($request->password);

        $data -> save();
        if($data){ 
            return redirect('/login');
        }else{
            return back() -> with ('fail','Unable to Sign Up');
        }
    }

    public function loginUser(Request $request) {
        $request -> validate ([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('email', '=', $request->email)->first();

        if($user){
            if (Hash::check($request->password, $user->password)) {
                return redirect('/');
            } else { 
                
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'User not found');
        }

        // return $request->all();
    }
}
