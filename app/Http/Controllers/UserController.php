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
}
