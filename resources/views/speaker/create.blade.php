@extends('base')

@section('title')
    Create Program
@endsection

@section('create-program-active')
    active
@endsection

@section('content')
    <h1>Create speakers</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => 'speaker.store', 'method' => 'post', 'files' => true]) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Speaker Name') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('desc', 'Description') }}
                        {{ Form::textarea('desc', '', ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('picture', 'Picture') }}
                        {{ Form::file('picture', ['class' => 'form-control-file', 'accept' => 'image/*', 'required' => true]) }}
                    </div>
                </div>
                {{ Form::submit('Save', ['class' => 'btn btn-primary mt-4']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
