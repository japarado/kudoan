@extends('base')

@section('title')
    Programs
@endsection

@section('program-active')
    active
@endsection

@section('content')
    <h1>Events</h1>

    <ul class='list-group'>
        @foreach($programs as $program)
            <li class="list-item">{{ $program->name }}</li>
        @endforeach
    </ul>
@endsection
