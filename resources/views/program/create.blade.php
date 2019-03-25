@extends('base')

@section('title')
    Create Event
@endsection

@section('create-program-active')
    active
@endsection

@section('content')
    <h1 class="text-center mt-4">
        Create a New Event
    </h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => 'program.store', 'method' => 'post']) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Event Name') }}
                        {{ Form::text('name', '', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('date', 'Date') }}
                        {{ Form::date('date','', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('time_from', 'Time From') }}
                        {{ Form::time('time_from', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="col">
                        {{ Form::label('time_to', 'Time To') }}
                        {{ Form::time('time_to', '', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('what_is', 'What Is') }}
                            {{ Form::textarea('what_is', '', ['class' => 'form-control']) }}
                        </div>
                        <div class="col">
                            {{ Form::label('objective', 'Objective') }}
                            {{ Form::textarea('objective', '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('program', 'Program') }}
                            {{ Form::textarea('program', '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h2>Event Sponsors</h2>
                    <div class="form-check">
                        @foreach($sponsors as $sponsor)
                            {{ Form::checkbox($sponsor->name, $sponsor->id) }}
                            {{ Form::label($sponsor->id, $sponsor->name) }}
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <h2>Event Speakers</h2>
                    <div class="form-check">
                        @foreach($speakers as $speaker)
                            {{ Form::checkbox($speaker->name, $speaker->id) }}
                            {{ Form::label($speaker->id, $speaker->name) }}
                        @endforeach
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
