<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserLoginController extends Controller
{

    protected $redirectTo = RouteServiceProvider::UserHome;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');

    }

    public function login(){

        return view('front.auth.login');
    }

    public function checkLogin(Request $request){
        
        $request->validate([
            "email" => ["required" , "string"],
            "password" => ["required" , "string"]
        ]);

        //check table customer if email and password are correct saved in session then use it 
        if(Auth::guard('customer')->attempt($request->only('email' , 'password'))){
            return redirect()->intended($this->redirectTo);
        }else{
            return redirect()->back()->withInput(['email'=>$request->email])->withErrors(['errorResponse'=> 'these credentianls do not match our records']);

        }
    }

    public function logout(){

        Auth::guard('customer')->logout();
        return redirect()->route('user.login');
    }
}
