@extends('base')

@section('create-sponsor-active')
    active
@endsection

@section('content')
    <h1>{{ $sponsor->name }}</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['route' => 'sponsor.store', 'method' => 'post', 'files' => true]) }}
                {{ Form::token() }}
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('name', 'Sponsor Name') }}
                        {{ Form::text('name', $sponsor->name, ['class' => 'form-control', 'disabled']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        {{ Form::label('desc', 'Description') }}
                        {{ Form::textarea('desc', $sponsor->desc, ['class' => 'form-control', 'disabled']) }}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <img src="{{ $logo }}">
                    </div>
                </div>
                @auth
                    @if(Auth::user()->admin())
                        <a href="{{ route('sponsor.edit', $sponsor->id) }}" class="btn btn-primary">Edit</a>
                    @endif
                @endauth
            {{ Form::close() }}
        </div>
    </div>
@endsection
