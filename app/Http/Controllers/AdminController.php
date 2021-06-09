<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Customer;
use App\Diary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //faccio un check se utente è admin
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        $diaries = Diary::all();
        $customers = Customer::all();

        $tot_user = 0;

        foreach($users as $u)
        {
            if($u->role == "USER")
            {
                $tot_user = $tot_user + 1;
            }
        }

        $lista_proj = [];
        $ore_proj = [];
        $count = 0;

        foreach($projects as $p)
        {
            array_push($lista_proj, $p->name);
            foreach($diaries as $d)
            {
                if($p->id == $d->project_id)
                    $count = $d->hours + $count;
            }

            array_push($ore_proj, $count);
            $count = 0;
        }

        $lista_cust = [];
        $ore_cust = [];

        $count = 0;

        foreach($customers as $c)
        {
            array_push($lista_cust, $c->ragione_sociale);
            foreach($diaries as $d)
            {
                $pr = DB::table('projects')
                    ->where('customer_id', $c->id)
                    ->first();

                if($pr != null)
                    if($pr->id == $d->project_id)
                        $count = $d->hours + $count;
            }
            array_push($ore_cust, $count);
            $count = 0;
        }




        return view('admin.index' , compact('users', 'projects', 'diaries', 'customers', 'lista_proj', 'ore_proj', 'lista_cust', 'ore_cust', 'pr'));
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