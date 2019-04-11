@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="center">Log</div>
        </div>

        <div class="card-body">

            <ul class="nav justify-content-end">
                <li class="nav-item">

                </li>
            </ul>
            <form method="get", action="{{ route('home') }}">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="HisCallSign" placeholder="Input the CallSign" value="{{ $hisCallSign }}">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary" value="Search & Create">
                    </div>
                </div>
            </form>
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
                            <td>{{ $log->mode() }}</td>
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
