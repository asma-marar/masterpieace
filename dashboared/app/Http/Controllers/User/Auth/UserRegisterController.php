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

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "string"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'phone' => ['required', 'regex:/^(\+962|0)(7[789]\d{7}|6\d{7})$/', 'string', 'max:13'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string']
        ]);

        $data = [
            'name' => $request->name, 
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'password' => Hash::make($request->password)
        ];

        Customer::create($data);

        return redirect()->route('user.login')->with('success', 'Registration successful! Please login.');
    }
}
