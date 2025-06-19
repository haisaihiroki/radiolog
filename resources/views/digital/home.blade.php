@extends('layouts.app-digital')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="center">Log(Digital)</div>
        </div>

        <div class="card-body">

            <ul class="nav justify-content-end">
                <li class="nav-item">

                </li>
            </ul>
            <form method="get", action="{{ route('home-digital') }}">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <input type="text" class="form-control" name="HisCallSign" placeholder="Input the CallSign" value="{{ $hisCallSign }}">
                    </div>
                    <div class="form-group col-md-2 mb-3">
                        <input type="submit" class="btn btn-primary" value="Search & Create">
                    </div>
                </div>
            </form>
            <x-cqsettings :modes=$modes />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">His CallSign</th>
                        <th scope="col">His Name</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">My QTH/Grid</th>
                        <th scope="col">His QTH/Grid</th>
                        <th scope="col">My Signal</th>
                        <th scope="col">His Signal</th>
                        <th scope="col">Band(MHz)</th>
                        <th scope="col">Mode</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($logs as $key => $log)
                        <tr>
                            <td><a href="{{ route('viewLog-digital', $log->uuid) }}">{{ $count - $key }}</a></td>
                            <td>{{ $log->his_callsign }}</td>
                            <td>{{ $log->his_name }}</td>
                            <td>{{ $log->time }} <br /><span class="time-utc">UTC: {{ $log->time_utc() }}</span></td>
                            <td>{{ $log->my_qth }}</td>
                            <td>{{ $log->his_qth }}</td>
                            <td>{{ $log->my_s_digital }} db</td>
                            <td>{{ $log->his_s_digital }} db</td>
                            <td>{{ $log->band }}</td>
                            <td>{{ $log->mode->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($logs) == 0)
                    <p>Not recodes.</p>
                @endif
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
