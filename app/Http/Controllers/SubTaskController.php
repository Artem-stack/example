<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\SubTask;
use App\Models\Status;
use App\Http\Requests\SubTaskRequest;
use Illuminate\Support\Facades\Auth;

class SubTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
       $subtask = SubTask::all();
        $task = Task::all();
       
        return view("subtask.index", [
            'subtask' => $subtask,
            'task' => $task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $i= Auth::user()->id;
       $task = Task::where('user_id', '=', $i)->get();
        $status = Status::all();
         return view("subtask.create", [
           'task' => $task,
            'status' => $status,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(SubTaskRequest $request)
    {
       $data = $request->all();

        SubTask::create($data);
        
        return redirect(route("home"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $i= Auth::user()->id;
       $subtask = SubTask::findOrFail($id);
         $task = Task::where('user_id', '=', $i)->get();
         $status = Status::all();

        return view("subtask.create", [
            'task' => $task,
            'subtask' => $subtask,
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, SubTaskRequest $request)
    {
        $subtask = SubTask::findOrFail($id);
        $subtask->update($request->validated());

        return redirect(route("home"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         SubTask::destroy($id);

        return back();
    }
}
