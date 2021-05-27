<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Project;
use App\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    //faccio un check se utente è user
    public function __construct()
    {
        $this->middleware('user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaries = Diary::all();
        $assignments = Assignment::all();
        $projects = Project::all();
        return view('diaries.index', compact('diaries', 'assignments', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diaries = Diary::all();
        $assignments = Assignment::all();
        $projects = Project::all();
        //return json_encode(['status' => 'ok', 'diaries' => $diaries]);
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

        $d = new Diary();
        $projects = Project::all();

        $d->today = $input['today'];
        $d->notes = $input['notes'];
        $d->hours = $input['hours'];
        $d->project_id = $input['project_id'];
        $d->user_id = $input['user_id'];

        $d->save();

        $date = date('d/m/Y', strtotime($d->today));
        $project = $d->project->name;
        $hours = $d->hours;
        
        
        return json_encode(['status' => 'ok', 'diaries' => $d, 'd' => $date, 'p' => $project, 'h' => $hours]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        $diary->delete();
        
        return redirect('diaries');
    }
}
