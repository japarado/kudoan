@extends('base')

@section('title')
    Admin Dashboard
@endsection

@section('dashboard-active')
    active
@endsection

@section('content')
    <h1>Admin Dashboard</h1>

    <ul>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach($programs as $program)
                        <li class="list-group-item">
                            <a href="{{ route('program.show', $program->id) }}">{{ $program->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </ul>
@endsection
