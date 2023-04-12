@extends('layouts.app')

@section('title',  isset($subtask) ? "Edit task ID {$subtask->id}" : 'Add subtask')

@section('content')

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($subtask) ? "Edit subtask ID {$subtask->id}" : 'Add subtask' }}</h3>
     
        <div class="mt-8">
           
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($subtask) ? route("subtask.update", $subtask->id) : route('subtask.store') }}">
                @csrf

                @if(isset($subtask))
                    <input type="hidden" name="id" value="{{ $subtask->id }}"/>

                    @method('PUT')
                @endif

                <input style = "margin-bottom: 40px" name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $subtask->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input style = "margin-bottom: 40px" name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-500 @enderror" placeholder="description" value="{{ $subtask->description ?? '' }}" />

                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                    <div class="mt-8">
            <label for="created_at">
                Term
            </label>
            <input type="date" id="term" name="term" class="form-control @error('term') is-invalid @enderror" value="{{ $subtask->term ?? '' }}">
        </div>

         @error('term')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <h4>Task</h4>
 <select id="task_id" type="text" value="{{ $subtask->task_id ?? '' }}" name="task_id" class="w-full h-12 border border-gray-800 ">

  @foreach($task as $tasks)
  <option value="{{ $tasks->id ?? '' }}" >{{$tasks->name}}</option>
  @endforeach
</select>

                <h4>Staus</h4>
 <select id="status_id" placeholder="status_id" type="text" value="{{ $subtask->status_id ?? '' }}" name="status_id" class="w-full h-12 border border-gray-800 rounded px-3 @error('status_id') border-red-500 @enderror">
  @foreach($status as $statuses)
  <option value="{{ $statuses->id ?? '' }}" >{{$statuses->name}}</option>
  @endforeach
</select>
                @error('status_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                 
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
            </form>
        </div>
    </div>
@endsection

