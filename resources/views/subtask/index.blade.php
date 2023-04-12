@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-6 py-8">
      
       <h3 class="text-gray-700 text-3xl font-medium">Subtasks</h3>
    <a class="btn btn-primary" role="button" href="{{ route("subtask.create", $task->id) }}">Create subtask</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>  
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
           
        @foreach($subtask as $subtasks)
            <tr>
                <th scope="row">{{ $subtasks->id }}</th>
            
                <td>
                    <div>{{ $subtasks->name }}</div>
                </td>

                <td>
                    <div>{{ $subtasks->description }}</div>
                </td>

                  <td>
                    <div>{{ $subtasks->status['name'] }}</div>
                </td>
                            
                <td>
                    <form method="POST" action="{{ route("subtask.destroy", $subtasks->id) }}">
                       
                        <a href="{{ route("subtask.edit", $subtasks->id) }}"><img src="/images/pencil.png" alt="Edit" width = "30" height = "30"> </a>
                      
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

