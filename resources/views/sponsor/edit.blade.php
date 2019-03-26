@extends('base')

@section('title')
    Editing {{ $sponsor->name }}
@endsection

@section('sponsor-active')
    active
@endsection

@section('content')
    <h1>{{ $sponsor->name }}</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => ['sponsor.update', $sponsor->id], 'method' => 'put', 'files' => true]) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Sponsor Name') }}
                        {{ Form::text('name', $sponsor->name, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('desc', 'Description') }}
                        {{ Form::textarea('desc', $sponsor->desc, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo', ['class' => 'form-control-file', 'accept' => 'image/*']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <img src="{{ $logo }}">
                    </div>
                </div>
                {{ Form::submit('Save', ['class' => 'btn btn-primary mt-4']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
