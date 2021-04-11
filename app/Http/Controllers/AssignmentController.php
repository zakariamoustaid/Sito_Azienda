<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Log;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();

        return view('assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        $assignments = Assignment::all();
        return view('assignments.create', compact('projects', 'users', 'assignments'));
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
            'begins'         => 'required',
            'project_id'    => 'required',
            'user_id'       => 'required',
            'description'   => 'required',
        ]);

        foreach($input['user_id'] as $i)
        {
            $assignments = new Assignment();
            $assignments->begins = $request->begins;
            $assignments->project_id = $request->project_id;
            $assignments->user_id = $i;
            $assignments->description = $request->description;
            $assignments->save();
        }
        //Log::info($test);
        
        return redirect('assignments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $input = $request->all();

        foreach($input['user_id'] as $i)
        {
            $assignment->user_id = $i;
            $assignment->save();
        }

        return redirect('assignments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        
        return redirect('assignments');
    }
}
