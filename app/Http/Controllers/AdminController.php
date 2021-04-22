<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //faccio un check se utente è admin
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        $users = User::all();

        return view('admin.create', compact('users'));
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
        
        return redirect('/admin');
    }

}