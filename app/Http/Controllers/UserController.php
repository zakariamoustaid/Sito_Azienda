<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //faccio un check se utente è user
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        $users = User::all();
        return view('user.home', compact('users'));
    }
    
}