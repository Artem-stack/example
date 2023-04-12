<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\User;
use App\Models\Task;
use App\Models\SubTask;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    public function store(TaskRequest $request)
    {
        $tasks = Task::create($request->all());
        
        return new TaskResource($tasks);
    }

    public function show($id)
    {
        return new TaskResource(Task::findOrFail($id));
    }

     public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        
        return new TaskResource($task);
    }

     public function destroy(Task $task)
    {
        $task->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
