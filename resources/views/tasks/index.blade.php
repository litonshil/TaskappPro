@extends('layouts.app')

@section('contents')
<a href="{{url('tasks/create')}}" class="btn btn-success">Add New Task</a>
<hr>

<table class="table table-bordered">
    <tr>
        <td>Name</td>
        <td>Details</td>
        <td>Category</td>
        <td>Deadline</td>
        <td>Status</td>
        <td>Action</td>
    </tr>
    @foreach ($tasks as $item)
    <tr>
        <td>
            {{ $item->name}}
        </td>
        <td>
            {{ $item->details}}
        </td>
        <td>
            {{ $item->category->name}}
        </td>
        <td>
            {{ $item->deadline}}
        </td>
        <td>
            {{ App\Enums\TaskStatus::getDescription($item->status)}}
        </td>
        <td class="d-flex">
            <a href="{{ url("/tasks/$item->id/edit") }}" class="btn btn-warning btn-sm">Update</a>
            <form action="{{ url("/tasks/$item->id") }}" method="post" onsubmit="return confirm(" Do you want to
                delete?");">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">

            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
