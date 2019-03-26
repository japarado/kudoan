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

                @auth
                    <a class="btn btn-primary" href="{{ route('program.edit', $program->id) }}">Edit</a>
                    {{ Form::open(['route' => ['program.destroy', $program->id], 'method' => 'delete']) }}
                        {{ Form::token() }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                @endauth
            </li>
        @endforeach
    </ul>
@endsection
