<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserFormRequest;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserFormRequest $request)
    {
        $data = $request->validated();

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role'];
        $user->city = $data['city'];

        $user->save();
        return redirect('admin/user')->with('message', 'user Added successfully');    }

    public function edit($user_id)
    {
        $user= User::find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserFormRequest $request, $user_id)
    {
        $data = $request->validated();

        $user = User::find($user_id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->city = $data['city'];
        $user->address = $data['address'];

        $user->save();
        return redirect('admin/user')->with('message', 'user Updated successfully');    
    }

    public function delete($user_id)
    {
        $user= User::find($user_id);
        if ($user) {
            $user->delete();
    
            return redirect('admin/user')->with('message', 'User deleted successfully');
        }
    
        return redirect('admin/user')->with('error', 'User not found');
    }
}

