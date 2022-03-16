@extends('layouts.app')

@section('contents')
<h3>Update Task</h3>
<hr>
<form class="form-horizontal" action="{{url("/tasks/{$task->id}")}}" method="post">
    @method("put");
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Task Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $task->name }}" name="name" placeholder="Enter Task Name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Category:</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                @foreach ($category_list as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Details:</label>
        <div class="col-sm-10">
            <textarea name="details" class="form-control" cols="30" rows="10">{{ $task->details }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Deadline:</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" value="{{ $task->deadline }}" name="deadline" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Status:</label>
        <div class="col-sm-10">
            <select name="status" class="form-control">
                @foreach ($task_status as $key => $status)
                <option value="{{ $key }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Update</button>
        </div>
    </div>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection
