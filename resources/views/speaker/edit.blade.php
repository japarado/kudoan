@extends('base')

@section('title')
    Editing {{ $speaker->name }}
@endsection

@section('speaker-active')
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
                        {{ Form::text('name', $speaker->name, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('desc', 'Description') }}
                        {{ Form::textarea('desc', $speaker->desc, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('picture', 'picture') }}
                        {{ Form::file('picture', ['class' => 'form-control-file', 'accept' => 'image/*']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <img src="{{ $picture }}">
                    </div>
                </div>
                {{ Form::submit('Save', ['class' => 'btn btn-primary mt-4']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
