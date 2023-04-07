@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Tasks</h3>
    <a class="btn btn-primary" role="button" href="{{ route("task.create") }}">Create Task</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>  
            <th scope="col">Name</th>
            <th scope="col">Show</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($task as $tasks)
            <tr>
                <th scope="row">{{ $tasks->id }}</th>
            
                <td>
                    <div>{{ $tasks->name}}</div>
                </td>
                            
                <td>
                    <form method="POST" action="{{ route("task.destroy", $tasks->id) }}">

                        <a href="{{ route("task.show", $tasks->id) }}">Show tasks</a>
                       
                        <a href=""><img src="/images/pencil.png" alt="Edit" width = "30" height = "30"> </a>
                      
                        @csrf
                        @method('DELETE')
                         <td>
                        <button><img src="/images/delete.png" alt="Delete" width = "30" height = "30"></button>
                         </td>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
