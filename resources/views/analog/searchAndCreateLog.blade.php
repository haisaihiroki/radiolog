@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-left center">Search</div>
        </div>
        <div class="card-body">
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
                            <td>{{ $log->time }} <br /> <span class="time-utc">UTC: {{ $log->time_utc() }}</span></td>
                            <td>{{ $log->my_qth }}</td>
                            <td>{{ $log->his_qth }}</td>
                            <td>{{ $log->my_RST() }}</td>
                            <td>{{ $log->his_RST() }}</td>
                            <td>{{ $log->band }}</td>
                            <td>{{ $log->mode->name }}</td>
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
    <div class="card">
        <div class="card-header">
            <div class="float-left center">Create Log</div>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post", action="{{ route('saveLog') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="HisCallSign">His CallSign</label>
                        <input type="text" class="form-control" id="HisCallSign" name="HisCallSign" required placeholder="JXXXXX" value="{{ old('HisCallSign', $log_latest->his_callsign) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="HisName">His Name</label>
                        <input type="text" class="form-control" id="HisName" name="HisName" placeholder="Yamada" value="{{ old('HisName', $log_latest->his_name) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-8 col-sm-5 col-md-4">
                        <label for="Date">Date</label>
                        <input type="date" class="form-control" id="Date" name="Date" value="{{ old('Date', date('Y-m-d')) }}" required>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3">
                        <label for="Time">Time</label>
                        <input type="time" class="form-control" id="Time" name="Time" value="{{ old('Time', date('H:i')) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-8 col-sm-5 col-md-4">
                        <label for="Band">Band (MHz)</label>
                        <input type="number" class="form-control" id="Band" step="0.000001" name="Band" placeholder="433.000" value="{{ old('Band', $log_global_latest->band) }}" required>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3">
                        <label for="Mode">Mode</label>
                        <select class="form-control" id="Mode" name="Mode" required>
                            <option value="">-</option>
                            @foreach ($modes as $mode)
                                <option value="{{ $mode->id }}" @if(old('Mode', $log_global_latest->mode_id) == $mode->id) selected @endif>{{ $mode->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row my-color">
                    <div class="form-group col-md-5">
                        <label for="MyQTH">My QTH</label>
                        <input type="text" class="form-control" id="MyQTH" name="MyQTH" placeholder="Kohoku-ku, Yokohama-shi, Kanagawa, JP" value="{{ old('MyQTH') }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="MyPower">My Power (W)</label>
                        <input type="number" class="form-control" id="MyPower" step="0.1" name="MyPower" placeholder="5" value="{{ old('MyPower') }}">
                    </div>
                </div>

                <div class="row my-color">
                    <div class="form-group col-md-4">
                        <label for="MyR">My Readability</label>
                        <select class="form-control" id="MyR" name="MyR">
                            @foreach ($readabilities as $readability)
                                <option value="{{ $readability->readability }}" @if(old('MyR')==$readability->readability) selected @endif>{{ $readability->readability }} : {{ $readability->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="MyS">My Signal Strength</label>
                        <select class="form-control" id="MyS" name="MyS">
                            @foreach ($strengths as $strength)
                                <option value="{{ $strength->strength }}" @if(old('MyS')==$strength->strength) selected @endif>{{ $strength->strength}} : {{ $strength->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="MyT">My Tone</label>
                        <select class="form-control" id="MyT" name="MyT">
                            <option value="">-</option>
                            @foreach ($tones as $tone)
                                <option value="{{ $tone->tone }}" @if(old('MyT')==$tone->tone) selected @endif>{{ $tone->tone }} : {{ $tone->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row his-color">
                    <div class="form-group col-md-5">
                        <label for="HisQTH">His QTH</label>
                        <input type="text" class="form-control" id="HisQTH" name="HisQTH" placeholder="Shibuya-ku, Tokyo, JP" value="{{ old('HisQTH', $log_latest->his_qth) }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="HisPower">His Power (W)</label>
                        <input type="number" class="form-control" id="HisPower" step="0.1" name="HisPower" placeholder="0.1" value="{{ old('HisPower') }}">
                    </div>
                </div>
                <div class="row his-color">
                    <div class="form-group col-md-4">
                        <label for="HisR">His Readability</label>
                        <select class="form-control" id="HisR" name="HisR">
                            @foreach ($readabilities as $readability)
                                <option value="{{ $readability->readability }}" @if(old('HisR')==$readability->readability) selected @endif>{{ $readability->readability }} : {{ $readability->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="HisS">His Signal Strength</label>
                        <select class="form-control" id="HisS" name="HisS">
                            @foreach ($strengths as $strength)
                                <option value="{{ $strength->strength }}" @if(old('HisS')==$strength->strength) selected @endif>{{ $strength->strength}} : {{ $strength->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="HisT">His Tone</label>
                        <select class="form-control" id="HisT" name="HisT">
                            <option value="">-</option>
                            @foreach ($tones as $tone)
                                <option value="{{ $tone->tone }}" @if(old('HisT')==$tone->tone) selected @endif>{{ $tone->tone }} : {{ $tone->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Note">Note</label>
                    <textarea id="Note" class="form-control" name="Note">{{ old('Note') }}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="登録">
            </form>
        </div>
    </div>
</div>
@endsection
