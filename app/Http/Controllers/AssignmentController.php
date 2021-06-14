<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Log;

class AssignmentController extends Controller
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
        $assignments = Assignment::all();
        $projects = Project::all();
        $users = User::all();
        return view('assignments.index', compact('assignments', 'projects', 'users'));
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
        $a = Assignment::all();

        $validatedData = $request->validate([
            'project_id'    => 'required',
            'user_id'       => 'required',
            'description'   => 'required',
        ]);
        
        //variabili utilizzate per alert in caso di assegnazioni già presenti
        $message_no = "";
        $message_ok = "";
        $denied_user = "";
        $accept_user ="";
        $b = 1;
        
        foreach ($input['user_id'] as $i) 
        {
            $assignments = new Assignment();
            $assignments->begins = date('Y-m-d');
            $assignments->project_id = $request->project_id;
            $assignments->user_id = $i;
            $assignments->description = $request->description;
            foreach ($a as $as) {
                if ($as->user_id == $i && $as->project_id == $input['project_id']) {
                    $b = 0;
                }
            }

            if ($b) 
            {
                if ($message_ok == "") 
                {
                    $message_ok = 'Aggiunti correttamente al progetto '  . $assignments->project->name . ' i seguenti utenti: ';
                }
                $assignments->save();
                $accept_user.='"';
                $accept_user.=$assignments->user->name;
                $accept_user.=" ";
                $accept_user.=$assignments->user->surname;
                $accept_user.='" ';
            } 
            
            else 
            {
                if ($message_no == "") 
                {
                    $message_no = 'Attenzione '  . $assignments->project->name . ' già assegnato a: ';
                }
                
                $denied_user.='"';
                $denied_user.=$assignments->user->name;
                $denied_user.=" ";
                $denied_user.=$assignments->user->surname;
                $denied_user.='" ';
            }

            $message_no.=$denied_user;
            $denied_user = "";
            $message_ok.=$accept_user;
            $accept_user = "";
            $b = 1;
        }
        
        return redirect('assignments')->with('alert', $message_no)->with('ok', $message_ok);  
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

        foreach ($input['user_id'] as $i) {
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
        
        return redirect('assignments')->with('ok', 'Assegnazione cancellata!'); 
    }
}
