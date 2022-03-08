@extends('layouts.app')

@section('contents')
<a href="{{url('categories/create')}}" class="btn btn-success">Add New Category</a>
<hr>

<table class="table table-bordered">
    <tr>
        <td>Name</td>
        <td>Action</td>
    </tr>
    @foreach ($category_list as $item)
    <tr>
        <td>
            {{ $item->name}}
        </td>
        <td>
            <a href="{{ url("/categories/$item->id/edit") }}" class="btn btn-warning btn-sm">Update</a>
            {{-- <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
            <form action="{{ url("/categories/$item->id") }}" method="post" onsubmit="return confirm(" Do you want to
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
