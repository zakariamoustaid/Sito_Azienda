<?php

namespace App\Http\Controllers;

use App\Project;
use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Log;

class ProjectController extends Controller
{
    //solo Admin ha accesso a gestione progetti
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
        $users = User::all();
        return view('projects.create', compact('customers', 'users'));
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
            'name'      => 'required',
            'description'   => 'required',
            'note'        => '',
            'begin'   => 'required',
            'p_end'       => 'required',
            'd_end'       => '',
            'customer_id'       => 'required',
            'cost'       => 'required',
        ]);

        Project::create($input);
        
        return redirect('projects');
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
        $users = User::all();
        return view('projects.edit', compact('project', 'users'));
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

        Log::info($request->user_id);
        Log::info($input['user_id']);
        $project->user_id = implode(',', $input['user_id']);
    
        $project->save();
        

        return redirect('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
