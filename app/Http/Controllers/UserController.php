<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
        
        $check = DB::table('users')
            ->where('email',$input['email'])
            ->get();

        if($check == null)
        {
            User::create($input);
        
            return redirect('users')->with('alert', 'Utente inserito correttamente');
        }

        else{
            return redirect('users')->with('no', 'Inserimento non confermato, email già in uso');
        }


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
        $user->in_corso = 'no'; 
        $user->save();
        $assignments = DB::table('assignments')
                        ->where('user_id', $user->id)
                        ->delete();
        return redirect('users');
    }

    public function show_terminated()
    {
        $users = User::all();
    
        return view('users.terminated', compact('users'));
    }
    
}