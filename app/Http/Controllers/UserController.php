<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //faccio un check se utente è user
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();

        return view('user.create', compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validatedData = $request->validate([
            'name'      => 'required',
            'surname'   => 'required',
            'role'        => 'required',
            'email'   => 'required',
            'password'       => 'required',
        ]);

        User::create($input);
        
        return redirect('/user');
    }
    
}