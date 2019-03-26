@extends('base')

@section('title')
    Speakers
@endsection

@section('speaker-active')
    active
@endsection

@section('content')
    <h1>Speakers</h1>

    <ul class='list-group'>
        @foreach($speakers as $speaker)
            <li class="list-group-item">
                <h3>
                    <a href="{{ route('speaker.show', $speaker->id) }}">{{ $speaker->name }}</a>
                </h3>
                @auth
                    @if(Auth::user()->admin)
                        <a class="btn btn-primary" href="{{ route('speaker.edit', $speaker->id) }}">Edit</a>
                        {{ Form::open(['route' => ['speaker.destroy', $speaker->id], 'method' => 'delete']) }}
                            {{ Form::token() }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>
@endsection
