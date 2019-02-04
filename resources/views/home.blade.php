@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-left center">Log</div>
            <a href="{{ route('createLog') }}" class="btn btn-outline-primary float-right" role="button" aria-pressed="true">Create Log</a>
        </div>

        <div class="card-body">

            <ul class="nav justify-content-end">
                <li class="nav-item">

                </li>
            </ul>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">His CallSign</th>
                        <th scope="col">His Name</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">My QTH</th>
                        <th scope="col">His QTH</th>
                        <th scope="col">My RST</th>
                        <th scope="col">His RST</th>
                        <th scope="col">Band(MHz)</th>
                        <th scope="col">Mode</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($logs as $key => $log)
                        <tr>
                            <td><a href="{{ route('viewLog', $log->uuid) }}">{{ $count - $key }}</a></td>
                            <td>{{ $log->his_callsign }}</td>
                            <td>{{ $log->his_name }}</td>
                            <td>{{ $log->time }}</td>
                            <td>{{ $log->my_qth }}</td>
                            <td>{{ $log->his_qth }}</td>
                            <td>{{ $log->my_RST() }}</td>
                            <td>{{ $log->his_RST() }}</td>
                            <td>{{ $log->band }}</td>
                            <td>{{ $log->mode()->first()->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($logs) == 0)
                    <p>Not recodes.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
