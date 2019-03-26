@extends('base')

@section('title')
    Editing {{ $speaker->name }}
@endsection

@section('create-speaker-active')
    active
@endsection

@section('content')
    <h1>{{ $speaker->name }}</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => ['speaker.update', $speaker->id], 'method' => 'put', 'files' => true]) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Speaker Name') }}
                        {{ Form::text('name', $speaker->name, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('desc', 'Description') }}
                        {{ Form::textarea('desc', $speaker->desc, ['class' => 'form-control', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <img src="{{ $picture }}">
                    </div>
                </div>
                @auth
                    @if(Auth::user()->admin)
                        <a href="{{ route('speaker.edit', $speaker->id) }}" class="btn btn-primary">Edit</a>
                    @endif
                @endauth
            {{ Form::close() }}
        </div>
    </div>
@endsection
