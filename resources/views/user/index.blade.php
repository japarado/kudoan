@extends('base')

@section('title')
    Programs
@endsection

@section('user-active')
    active
@endsection

@section('content')
    <h1>Programs</h1>

    <ul class='list-group'>
        @foreach($programs as $program)
            <li class="list-group-item">
                <h3>
                    <a href="{{ route('program.show', $program->id) }}">{{ $program->name }}</a>
                </h3>

                @auth
                    @if(Auth::user()->admin)
                        <a class="btn btn-primary" href="{{ route('program.edit', $program->id) }}">Edit</a>
                        {{ Form::open(['route' => ['program.destroy', $program->id], 'method' => 'delete']) }}
                            {{ Form::token() }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}

                    @else
                        <h3 class="alert alert-success">You're registered to this event</h3>
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>
@endsection
