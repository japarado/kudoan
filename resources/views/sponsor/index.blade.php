@extends('base')

@section('title')
    Sponsors
@endsection

@section('sponsor-active')
    active
@endsection

@section('content')
    <h1>Sponsors</h1>

    <ul class='list-group'>
        @foreach($sponsors as $sponsor)
            <li class="list-group-item">
                <h3>
                    <a href="{{ route('sponsor.show', $sponsor->id) }}">{{ $sponsor->name }}</a>
                </h3>
                @auth
                    @if(Auth::user()->admin)
                        <a class="btn btn-primary" href="{{ route('sponsor.edit', $sponsor->id) }}">Edit</a>
                        {{ Form::open(['route' => ['sponsor.destroy', $sponsor->id], 'method' => 'delete']) }}
                            {{ Form::token() }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>
@endsection
