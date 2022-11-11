<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'User Akses',
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Insert User Data',
        ]);
    }

    public function store(Request $request)
    {
        return $request;
        
        $validate = $request->validated([
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);

        dd($validate);
    }

    public function edit()
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User',
        ]);
    }
}
