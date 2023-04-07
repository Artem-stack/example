<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\SubTask;
use App\Models\User;
use Illuminate\Http\Requests\TaskRequest;
use Illuminate\Http\Requests\SubTaskRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $i= Auth::user()->id;
       $task = Task::where('user_id', '=', $i)->get();

        return view('task.index', [
            "task" => $task,
        ]);
    }
}
