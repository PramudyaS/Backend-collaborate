<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($task_id)
    {
        $todos = Todo::where('task_id',$task_id)
        ->latest()
        ->get();

        return response()->json(['message'=>'success','todos'=>$todos]);
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
        $todo = Todo::create([
        'task_id'       => $request->task_id,
        'done_by'       => $request->done_by,
        'name'          => $request->name,
        'status'        => 'progress',
        'description'   => $request->description
        ]);

        return response()->json(['message'=>'success','todo'=>$todo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return response()->json(['message'=>'success','todo'=>$todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $f_name = null;

        if ($request->hasFile('file')) {
             $file   = $request->file;
            $f_name = rand().'.'.$file->getClientOriginalExtension();
            $file->move('todo/',$f_name);
        }

        if ($request->status == "done") {
            $todo = $todo->update([
            'file'      => $f_name,
            'url'       => $request->url,
            'status'    => $request->status,
            'done_at'   => Carbon::now()
            ]);

            return response()->json(['message'=>'success']);
        }else{
            $todo = $todo->update([
            'file'      => $f_name,
            'url'       => $request->url,
            'status'    => $request->status,
            ]);

            return response()->json(['message'=>'success']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        $todo->delete();

        return response()->json(['message'=>'success']);
    }
}
