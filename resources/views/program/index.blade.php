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
            <li class="list-group-item">
                <h3>
                    <a href="{{ route('program.show', $program->id) }}">{{ $program->name }}</a>
                </h3>
                <p class="font-weight-light"> Date: {{ $program->date }}</p>
                <p class="font-weight-light">{{ $program->time_from }} - {{ $program->time_to }}</p>
                <a class="btn btn-primary" href="{{ route('program.edit', $program->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ route('program.destroy', $program->id) }}">Delete</a>
            </li>
        @endforeach
    </ul>
@endsection
