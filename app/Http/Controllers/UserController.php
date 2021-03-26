<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //faccio un check se utente e' loggato
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        return view('user.home');
    }
    
}