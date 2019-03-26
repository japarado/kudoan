@extends('base')

@section('title')
    Create Program
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
            {{ Form::open(['route' => ['program.update', $program->id], 'method' => 'PUT']) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Event Name') }}
                        {{ Form::text('name', $program->name, ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('date', 'Date') }}
                        {{ Form::date('date', $program->date,  ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('time_from', 'Time From') }}
                        {{ Form::time('time_from', $program->time_from, ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                    </div>
                    <div class="col">
                        {{ Form::label('time_to', 'Time To') }}
                        {{ Form::time('time_to', $program->time_to,  ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('what_is', 'What Is') }}
                            {{ Form::textarea('what_is', $program->what_is,  ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                        </div>
                        <div class="col">
                            {{ Form::label('objective', 'Objective') }}
                            {{ Form::textarea('objective', $program->objective, ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('program', 'Program') }}
                            {{ Form::textarea('program', $program->program, ['class' => 'form-control', 'readonly', 'disabled' => true]) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h2>Sponsors</h2>
                    <div class="form-check">
                        @foreach($program->sponsors as $current_sponsor)
                            {{ Form::checkbox('sponsors[]', $current_sponsor->id, true, ['readonly']) }}
                            {{ Form::label($current_sponsor->id, $current_sponsor->name) }}
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <h2>Speakers</h2>
                    <div class="form-check">
                        @foreach($program->speakers as $current_speaker)
                            {{ Form::checkbox('speakers[]', $current_speaker->id, true, ['readonly']) }}
                            {{ Form::label($current_speaker->id, $current_speaker->name) }}
                        @endforeach
                    </div>
                </div>
                @auth
                    @if(Auth::user()->admin)
                        <a class="btn btn-primary" href="{{ route('program.edit', $program->id) }}">Edit</a>
                    @else
                        {{ Form::open() }}
                    @endif
                @endauth
            {{ Form::close() }}
            <img src={{ $venue }}>
        </div>
    </div>
@endsection
