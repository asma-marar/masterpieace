<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function register(){

        return view('front.auth.register');
    }

    public function store(Request $request){
        
        $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "string"],
            "password" => ['required','string', 'confirmed'],
            "password_confirmation"=> ["required" , "string"]
        ]);

        $data = $request->except(['password_confirmation' , '_token']);

        $data['password'] = Hash::make($request->password);

        Customer::create($data);

        return redirect()->route('user.login');
    }
}
