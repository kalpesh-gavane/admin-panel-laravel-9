<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('pages.user.user-data', ['user' => User::class]);
    }

    public function create()
    {
        return view('pages.user.user-new');
    }
}
