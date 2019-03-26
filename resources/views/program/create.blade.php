@extends('base')

@section('title')
    Create Program
@endsection

@section('create-program-active')
    active
@endsection

@section('content')
    <h1 class="text-center mt-4">
        Create A Program
    </h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => 'program.store', 'method' => 'post', 'files' => true]) }}
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
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('survey_link', 'Survey Link') }}
                            {{ Form::text('survey_link', '', ['class' => 'form-control']) }}
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
                        @foreach($sponsors as $sponsor)
                            {{ Form::checkbox('sponsors', $sponsor->id) }}
                            <a href="{{ route('sponsor.show', $sponsor->id) }}" target="_blank">
                                {{ Form::label($sponsor->id, $sponsor->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <h2>Speakers</h2>
                    <div class="form-check">
                        @foreach($speakers as $speaker)
                            {{ Form::checkbox('speakers', $speaker->id) }}
                            <a href="{{ route('speaker.show', $speaker->id) }}" target="_blank">                                {{ Form::label($speaker->id, $speaker->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
