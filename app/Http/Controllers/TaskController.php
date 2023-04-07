<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\SubTask;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
     $i= Auth::user()->id;
       $task = Task::where('user_id', '=', $i)->get();

        return view('task.index', [
            "task" => $task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::all();

         return view("task.create", [
            'status' => $status,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        
       $data = $request->validated();

        Task::create($data);
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
        $task = Task::findOrFail($id);
        $subtask = SubTask::where('task_id', '=', $id)->get();
       
        return view("subtask.index", [
            'task' => $task,
            'subtask' => $subtask,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function edit($id)
    {
         $status = Status::all();
         $task = Task::findOrFail($id);

        return view("task.create", [
            'task' => $task,
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
    public function update($id, TaskRequest $request)
    {
        $task = Task::findOrFail($id);

        $task->update($request->validated());

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
        Task::destroy($id);

        return redirect(route("home"));
    }
}
