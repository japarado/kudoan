@extends('base')

@section('title')
    Create Event
@endsection

@section('create-program-active')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 p-3 m-3">

        {{ Form::open(['route' => 'program.store', 'method' => 'post']) }}
            <div class="form-group">
                {{ Form::label('name', 'Event Name') }}
                {{ Form::text('name', '', ['class' => 'form-control']) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
@endsection
