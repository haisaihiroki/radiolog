@extends('layouts.app-digital')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="center">View Log</div>
            <div class="d-flex">
                <a href="{{ route('editLog-digital', $uuid) }}" class="btn btn-outline-primary ms-2" role="button" aria-pressed="true">Edit Log</a>
                <form action="{{ route('deleteLog-digital', $uuid) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this log?');" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" aria-pressed="true">Delete Log</button>
                </form>
            </div>
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
                    <p>{{ $log->my_s_digital }} dB</p>
                </div>
                <div class="form-group col-md-5">
                    <h5>His RST</h5>
                    <p>{{ $log->his_s_digital }} dB</p>
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
