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
                        <input type="date" class="form-control" id="Date" name="Date" value="{{ old('Date') }}" required>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3">
                        <label for="Time">Time</label>
                        <input type="time" class="form-control" id="Time" name="Time" value="{{ old('Time') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-8 col-sm-5 col-md-4">
                        <label for="Band">Band (MHz)</label>
                        <input type="number" class="form-control" id="Band" step="0.000001" name="Band" placeholder="433.000" value="{{ old('Band') }}" required>
                    </div>
                    <div class="form-group col-xs-6 col-sm-4 col-md-3">
                        <label for="Mode">Mode</label>
                        <select class="form-control" id="Mode" name="Mode" required>
                            <option value="">-</option>
                            <option value="1" @if(old('Mode')=="1") selected @endif>AM</option>
                            <option value="2" @if(old('Mode')=="2") selected @endif>FM</option>
                            <option value="3" @if(old('Mode')=="3") selected @endif>SSB</option>
                            <option value="4" @if(old('Mode')=="4") selected @endif>CW</option>
                            <option value="5" @if(old('Mode')=="5") selected @endif>DV</option>
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
                            <option value="5" @if(old('MyR')=="5") selected @endif>5 : 完全に了解できる</option>
                            <option value="4" @if(old('MyR')=="4") selected @endif>4 : 実用上困難なく了解できる</option>
                            <option value="3" @if(old('MyR')=="3") selected @endif>3 : かなり困難だが了解できる</option>
                            <option value="2" @if(old('MyR')=="2") selected @endif>2 : かろうじて了解できる</option>
                            <option value="1" @if(old('MyR')=="1") selected @endif>1 : 了解できない</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="MyS">My Signal Strength</label>
                        <select class="form-control" id="MyS" name="MyS">
                            <option value="9" @if(old('MyS')=="9") selected @endif>9 : きわめて強い信号</option>
                            <option value="8" @if(old('MyS')=="8") selected @endif>8 : 強い信号</option>
                            <option value="7" @if(old('MyS')=="7") selected @endif>7 : かなり強い信号</option>
                            <option value="6" @if(old('MyS')=="6") selected @endif>6 : 適度な強さの信号</option>
                            <option value="5" @if(old('MyS')=="5") selected @endif>5 : かなり適度な強さの信号</option>
                            <option value="4" @if(old('MyS')=="4") selected @endif>4 : 弱いが受信容易な信号</option>
                            <option value="3" @if(old('MyS')=="3") selected @endif>3 : 弱い信号</option>
                            <option value="2" @if(old('MyS')=="2") selected @endif>2 : 大変弱い信号</option>
                            <option value="1" @if(old('MyS')=="1") selected @endif>1 : 微弱でかろうじて受信できる信号</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="MyT">My Tone</label>
                        <select class="form-control" id="MyT" name="MyT">
                            <option value="">-</option>
                            <option value="9" @if(old('MyT')=="9") selected @endif>9 : 完全な直流音</option>
                            <option value="8" @if(old('MyT')=="8") selected @endif>8 : よい直流音色だが、ほんのわずかにリプルが感じられる</option>
                            <option value="7" @if(old('MyT')=="7") selected @endif>7 : 直流に近い音で、少しリプルが残っている</option>
                            <option value="6" @if(old('MyT')=="6") selected @endif>6 : 変調された音、すこしビューッという音を伴っている</option>
                            <option value="5" @if(old('MyT')=="5") selected @endif>5 : 楽音的で変調された音色</option>
                            <option value="4" @if(old('MyT')=="4") selected @endif>4 : いくらかあらい交流音で、かなり楽音性に近い音</option>
                            <option value="3" @if(old('MyT')=="3") selected @endif>3 : あらくて低い調子の交流音でいくぶん楽音に近い音調</option>
                            <option value="2" @if(old('MyT')=="2") selected @endif>2 : 大変あらい交流音で、楽音の感じは少しもしない音調</option>
                            <option value="1" @if(old('MyT')=="1") selected @endif>1 : 極めてあらい音</option>
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
                            <option value="5" @if(old('HisR')=="5") selected @endif>5 : 完全に了解できる</option>
                            <option value="4" @if(old('HisR')=="4") selected @endif>4 : 実用上困難なく了解できる</option>
                            <option value="3" @if(old('HisR')=="3") selected @endif>3 : かなり困難だが了解できる</option>
                            <option value="2" @if(old('HisR')=="2") selected @endif>2 : かろうじて了解できる</option>
                            <option value="1" @if(old('HisR')=="1") selected @endif>1 : 了解できない</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="HisS">His Signal Strength</label>
                        <select class="form-control" id="HisS" name="HisS">
                            <option value="9" @if(old('HisS')=="9") selected @endif>9 : きわめて強い信号</option>
                            <option value="8" @if(old('HisS')=="8") selected @endif>8 : 強い信号</option>
                            <option value="7" @if(old('HisS')=="7") selected @endif>7 : かなり強い信号</option>
                            <option value="6" @if(old('HisS')=="6") selected @endif>6 : 適度な強さの信号</option>
                            <option value="5" @if(old('HisS')=="5") selected @endif>5 : かなり適度な強さの信号</option>
                            <option value="4" @if(old('HisS')=="4") selected @endif>4 : 弱いが受信容易な信号</option>
                            <option value="3" @if(old('HisS')=="3") selected @endif>3 : 弱い信号</option>
                            <option value="2" @if(old('HisS')=="2") selected @endif>2 : 大変弱い信号</option>
                            <option value="1" @if(old('HisS')=="1") selected @endif>1 : 微弱でかろうじて受信できる信号</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="HisT">His Tone</label>
                        <select class="form-control" id="HisT" name="HisT">
                            <option value="">-</option>
                            <option value="9" @if(old('HisT')=="9") selected @endif>9 : 完全な直流音</option>
                            <option value="8" @if(old('HisT')=="8") selected @endif>8 : よい直流音色だが、ほんのわずかにリプルが感じられる</option>
                            <option value="7" @if(old('HisT')=="7") selected @endif>7 : 直流に近い音で、少しリプルが残っている</option>
                            <option value="6" @if(old('HisT')=="6") selected @endif>6 : 変調された音、すこしビューッという音を伴っている</option>
                            <option value="5" @if(old('HisT')=="5") selected @endif>5 : 楽音的で変調された音色</option>
                            <option value="4" @if(old('HisT')=="4") selected @endif>4 : いくらかあらい交流音で、かなり楽音性に近い音</option>
                            <option value="3" @if(old('HisT')=="3") selected @endif>3 : あらくて低い調子の交流音でいくぶん楽音に近い音調</option>
                            <option value="2" @if(old('HisT')=="2") selected @endif>2 : 大変あらい交流音で、楽音の感じは少しもしない音調</option>
                            <option value="1" @if(old('HisT')=="1") selected @endif>1 : 極めてあらい音</option>
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
