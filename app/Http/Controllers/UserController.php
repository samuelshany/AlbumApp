<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserController extends Controller
{
    public function loginForm()
    {
        $mess='';
        return view('register/loginForm',compact('mess'));
    }
    public function signupForm()
    {
        return view('register/signupForm');
    }
    public function loginHandel(Request $request)
    {
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        
        if (Auth::attempt($credentials)) {
           return redirect('/allAlbums');
        }
        else
        {
            $mess='error diffrent username or password ';
            return view('register/loginForm',compact('mess'));
        }
    }
    public function signupHandel(Request $request)
    {
        
        $user = new User();
        $user->email=$request->email;
        $user->name=$request->name;
        $user->password=Hash::make($request->password);
     
        $user->save();
      return redirect('/loginForm');
    }
    function logout()
    {
       Auth::logout();
        return redirect('/loginForm');
    }
}
