@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-left center">View Log</div>
            <form action="{{ route('deleteLog', $uuid) }}" method="POST" class="float-right" onsubmit="return confirm('Are you sure you want to delete this log?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" aria-pressed="true">Delete Log</button>
            </form>
            <a href="{{ route('editLog', $uuid) }}" class="btn btn-outline-primary float-right" role="button" aria-pressed="true">Edit Log</a>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-5">
                    <h5>His CallSign</h5>
                    <p>{{ $log->his_callsign }}</p>
                </div>
                <div class="form-group col-md-5">
                    <h5>His Name</h5>
                    <p>{{ $log->his_name }}</p>
                </div>
            </div>

            <h5>Date</h5>
            <p>{{ $log->time }}<br /><span class="time-utc-large">UTC: {{ $log->time_utc() }}</span></p>
            <div class="row">
                <div class="form-group col-md-5">
                    <h5>Band (MHz)</h5>
                    <p>{{ $log->band }}</p>
                </div>
                <div class="form-group col-md-5">
                    <h5>Mode</h5>
                    <p>{{ $log->mode->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <h5>My QTH</h5>
                    <p>{{ $log->my_qth }}</p>
                </div>
                <div class="form-group col-md-5">
                    <h5>His QTH</h5>
                    <p>{{ $log->his_qth }}</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <h5>My RST</h5>
                    <p>{{ $log->my_RST() }}</p>
                </div>
                <div class="form-group col-md-5">
                    <h5>His RST</h5>
                    <p>{{ $log->His_RST() }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <h5>My Power (W)</h5>
                    <p>{{ $log->my_power }}</p>
                </div>
                <div class="form-group col-md-5">
                    <h5>His Power (W)</h5>
                    <p>{{ $log->his_power }}</p>
                </div>
            </div>
            <div class="form-group">
                <h5>Note</h5>
                <pre>{{ $log->note }}</pre>
            </div>
        </div>
    </div>
</div>
@endsection
