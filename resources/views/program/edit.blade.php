@extends('base')

@section('title')
    Editing {{ $program->name }}
@endsection

@section('program-active')
    active
@endsection

@section('content')
    <h1 class="text-center mt-4">
        {{ $program->name }}
    </h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => ['program.update', $program->id], 'method' => 'PUT', 'files' => true]) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Event Name') }}
                        {{ Form::text('name', $program->name, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('date', 'Date') }}
                        {{ Form::date('date', $program->date,  ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('time_from', 'Time From') }}
                        {{ Form::time('time_from', $program->time_from, ['class' => 'form-control']) }}
                    </div>
                    <div class="col">
                        {{ Form::label('time_to', 'Time To') }}
                        {{ Form::time('time_to', $program->time_to,  ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('what_is', 'What Is') }}
                            {{ Form::textarea('what_is', $program->what_is,  ['class' => 'form-control']) }}
                        </div>
                        <div class="col">
                            {{ Form::label('objective', 'Objective') }}
                            {{ Form::textarea('objective', $program->objective, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('program', 'Program') }}
                            {{ Form::textarea('program', $program->program, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-3">
                            {{ Form::label('survey_link', 'Survey Link') }}
                            {{ Form::text('survey_link', $program->survey_link, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                        {{ Form::label('venue', 'Venue') }}
                        {{ Form::file('venue', ['class' => 'form-control-file', 'accept' => 'image/*', 'required' => true]) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h2>Sponsors</h2>
                    <div class="form-check">
                        @foreach($program->sponsors as $current_sponsor)
                            {{ Form::checkbox('sponsors[]', $current_sponsor->id, true) }}
                            {{ Form::label($current_sponsor->id, $current_sponsor->name) }}
                        @endforeach

                        @foreach($sponsors as $sponsor)
                            {{ Form::checkbox('sponsors[]', $sponsor->id, false) }}
                            {{ Form::label($sponsor->id, $sponsor->name) }}
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <h2>Speakers</h2>
                    <div class="form-check">
                        @foreach($program->speakers as $current_speaker)
                            {{ Form::checkbox('speakers[]', $current_speaker->id, true) }}
                            {{ Form::label($current_speaker->id, $current_speaker->name) }}
                        @endforeach

                        @foreach($speakers as $speaker)
                            {{ Form::checkbox('speakers[]', $speaker->id, false) }}
                            {{ Form::label($speaker->id, $speaker->name) }}
                        @endforeach
                    </div>
                </div>
                <img src="{{ $venue }}">
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
