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
                <ol class="list-group">
                    @foreach($programs as $program)
                        <li class="list-group-item">
                            <a href="{{ route('program.show', $program->id) }}" target="_blank">
                                <h1>{{ $program->name }}</h1>
                            </a>
                            <table class="table table-striped">
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $program->name }}</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>{{ $program->date }}</td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>{{ $program->time_from }} - {{ $program->time_to }}</td>
                                </tr>
                                <tr>
                                    <td>Survey Link</td>
                                    <td>
                                        <a href="{{ $program->survey_link }}" target="_blank">{{ $program->survey_link }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Attendees ({{ $program->users->count() }})</td>
                                    <td>
                                        <ul>
                                            @foreach($program->users as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    @if($program->status == 'Event Over')
                                        <td class="text-danger">{{ $program->status }}</td>
                                    @elseif($program->status == 'Ongoing')
                                        <td class="text-info">Ongoing</td>
                                    @elseif($program->status == 'Event yet to start')
                                        <td class="text-success">{{ $program->status }}</td>
                                    @endif
                                </tr>
                            </table>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </ul>
@endsection
