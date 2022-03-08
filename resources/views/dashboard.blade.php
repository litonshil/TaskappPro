@extends('layouts.app')

@section('contents')

<h3>Hello {{Auth::user()->name}}</h3>

@endsection('contents')