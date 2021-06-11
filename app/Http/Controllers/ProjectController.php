<?php

namespace App\Http\Controllers;

use App\Project;
use App\Customer;
use App\User;
use App\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Log;

class ProjectController extends Controller
{
    //blocco accesso se utente non è admin
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        $customers = Customer::all();
        return view('projects.index', compact('projects', 'users', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('projects.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validatedData = $request->validate([
            'name'              => 'required',
            'description'       => 'required',
            'note'              => '',
            'begins'            => 'required',
            'p_end'             => 'required',
            'd_end'             => '',
            'customer_id'       => 'required',
            'cost'              => 'required|numeric|max:100|',
        ]);

        $test = DB::table('projects')
            ->where('name',$input['name'])
            ->first();

        if($test == null)
        {
            Project::create($input);
            return redirect('projects')->with('alert', 'Progetto inserito correttamente.');
        }
        else
            return redirect('projects')->with('no', 'Inserimento NON confermato, nome Progetto già presente negli archivi.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $input = $request->all();

        $validatedData = $request->validate([
            'description'       => 'required',
            'cost'              => 'required|numeric|max:100|',
        ]);

        $project->description = $input['description'];
        $project->cost = $input['cost'];
        $project->save();

        return redirect('projects')->with('alert', 'Modifiche confermate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function destroy(Project $project)
    {
        $project->delete();
        
        return redirect('projects')->with('alert', 'Progetto eliminato definitivamente.');
    }
    
    public function terminate(Project $project)
    {
        $project->finito = 'yes';
        $project->d_end = date("Y/m/d");
        $project->save();

        $assignments = DB::table('assignments')
                        ->where('project_id', $project->id)
                        ->delete();

        return redirect('projects')->with('alert', 'Terminazione confermata.');
    }

    public function show_terminated()
    {
        $projects = Project::all();
        $ricavo = 0;
        $ore = DB::table('diaries')
            ->where('project_id', 4)
            ->sum('hours');
        
        Log::info($ore);

        return view('projects.terminated', compact('projects'));
    }
}
