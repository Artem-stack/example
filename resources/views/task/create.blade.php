@extends('layouts.app')

@section('title',  isset($tasks) ? "Edit project ID {$tasks->id}" : 'Add task')

@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($tasks) ? "Edit task ID {$tasks->id}" : 'Add task' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($task) ? route("task.update", $task->id) : route('task.store') }}">
                @csrf

                @if(isset($task))
                    <input type="hidden" name="id" value="{{ $task->id }}"/>

                    @method('PUT')
                @endif

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $task->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div class="mt-8">
            <label for="created_at">
                Term
            </label>
            <input type="date" id="term" name="term" class="form-control @error('term') is-invalid @enderror" value="{{ $task->term ?? '' }}">
        </div>

         @error('term')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                 <h4>Staus</h4>
 <select id="status_id" placeholder="status_id" type="text" value="{{ $task->status_id ?? '' }}" name="status_id" class="w-full h-12 border border-gray-800 rounded px-3 @error('status_id') border-red-500 @enderror">
  @foreach($status as $statuses)
  <option value="{{ $statuses->id ?? '' }}" >{{$statuses->name}}</option>
  @endforeach
</select>
                @error('status_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <?php $user_id = Auth::user()->id; ?>
                 <input name="user_id" type="hidden" value="{{ $user_id ?? '' }}" />
                 
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
            </form>
        </div>
    </div>
    @endsection
