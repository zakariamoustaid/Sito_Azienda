<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\User;

class UserController extends Controller
{
    //blocco accesso se utente non è admin
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();

        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validatedData = $request->validate([
            'name'          => 'required',
            'surname'       => 'required',
            'role'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'tel'           => 'required|min:10|numeric',
        ]);

        User::create($input);
        
        return redirect('users');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $validatedData = $request->validate([
            'tel'       => 'required|min:10|numeric',
            'role'      => 'required',
        ]);
        
        $user->tel = $input['tel'];
        $user->role = $input['role'];
        $user->save();

        return redirect('users');
    }

    public function destroy(User $user)
    {
        $assignments = Assignment::all();
        $t = 1;
        foreach($assignments as $a)
        {
            if($a->user->id == $user->id)
            {
                $t = 0;
                return redirect('users');
            }
        }

        if($t)
            $user->delete();
        
        return redirect('users');
    }
    
}