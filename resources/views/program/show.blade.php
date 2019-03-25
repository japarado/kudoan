@extends('base')

@section('title')
    {{ $program->namw }}
@endsection

@section('program-active')
    active
@endsection

@section('content')
    <h1>{{ $program->name }}</h1>
@endsection
