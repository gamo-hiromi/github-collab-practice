<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> bf16746 (Fix review comments: Add validation and hash password)

class UserController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $users = User::all();
=======
        $users = User::latest()->paginate(20);
>>>>>>> bf16746 (Fix review comments: Add validation and hash password)
        return view('users.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
=======
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
>>>>>>> bf16746 (Fix review comments: Add validation and hash password)

        return redirect('/users');
    }
}