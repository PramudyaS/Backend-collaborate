<?php

namespace App\Http\Controllers;

use App\ProjectParticipant;
use Illuminate\Http\Request;

class ProjectParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProjectParticipant::create([
        'project_id'    => $request->id,
        'user_id'       => $request->user_id
        ]);

        return response()->json(['message'=>'success']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectParticipant  $projectParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectParticipant $projectParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectParticipant  $projectParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectParticipant $projectParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectParticipant  $projectParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectParticipant $projectParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectParticipant  $projectParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectParticipant $projectParticipant)
    {
        //
    }
}
