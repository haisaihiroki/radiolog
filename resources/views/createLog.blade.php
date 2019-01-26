@extends('layouts.app')

@section('content')
<div class="container">
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
                <div class="form-group">
                    <label for="HisCallSign">His CallSign</label>
                    <input type="text" class="form-control" id="HisCallSign" name="HisCallSign" required placeholder="JXXXXX" value="{{ old('HisCallSign') }}">
                </div>
                <div class="form-group">
                    <label for="HisName">His Name</label>
                    <input type="text" class="form-control" id="HisName" name="HisName" placeholder="Yamada" value="{{ old('HisName') }}">
                </div>
                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" class="form-control" id="Date" name="Date" value="{{ old('Date') }}" required>
                </div>
                <div class="form-group">
                    <label for="Time">Time</label>
                    <input type="time" class="form-control" id="Time" name="Time" value="{{ old('Time') }}" required>
                </div>
                <div class="form-group">
                    <label for="Band">Band (MHz)</label>
                    <input type="number" class="form-control" id="Band" step="0.001" name="Band" placeholder="433.000" value="{{ old('Band') }}" required>
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <label for="MyQTH">My QTH</label>
                    <input type="text" class="form-control" id="MyQTH" name="MyQTH" placeholder="Kohoku-ku, Yokohama-shi, Kanagawa, JP" value="{{ old('MyQTH') }}">
                </div>
                <div class="form-group">
                    <label for="HisQTH">His QTH</label>
                    <input type="text" class="form-control" id="HisQTH" name="HisQTH" placeholder="Shibuya-ku, Tokyo, JP" value="{{ old('HisQTH') }}">
                </div>
                <div class="form-group">
                    <label for="MyR">My Readability</label>
                    <select class="form-control" id="MyR" name="MyR">
                        <option value="">-</option>
                        <option value="5" @if(old('MyR')=="5") selected @endif>5</option>
                        <option value="4" @if(old('MyR')=="4") selected @endif>4</option>
                        <option value="3" @if(old('MyR')=="3") selected @endif>3</option>
                        <option value="2" @if(old('MyR')=="2") selected @endif>2</option>
                        <option value="1" @if(old('MyR')=="1") selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="MyS">My Signal Strength</label>
                    <select class="form-control" id="MyS" name="MyS">
                        <option value="">-</option>
                        <option value="9" @if(old('MyS')=="9") selected @endif>9</option>
                        <option value="8" @if(old('MyS')=="8") selected @endif>8</option>
                        <option value="7" @if(old('MyS')=="7") selected @endif>7</option>
                        <option value="6" @if(old('MyS')=="6") selected @endif>6</option>
                        <option value="5" @if(old('MyS')=="5") selected @endif>5</option>
                        <option value="4" @if(old('MyS')=="4") selected @endif>4</option>
                        <option value="3" @if(old('MyS')=="3") selected @endif>3</option>
                        <option value="2" @if(old('MyS')=="2") selected @endif>2</option>
                        <option value="1" @if(old('MyS')=="1") selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="MyT">My Tone</label>
                    <select class="form-control" id="MyT" name="MyT">
                        <option value="">-</option>
                        <option value="9" @if(old('MyT')=="9") selected @endif>9</option>
                        <option value="8" @if(old('MyT')=="8") selected @endif>8</option>
                        <option value="7" @if(old('MyT')=="7") selected @endif>7</option>
                        <option value="6" @if(old('MyT')=="6") selected @endif>6</option>
                        <option value="5" @if(old('MyT')=="5") selected @endif>5</option>
                        <option value="4" @if(old('MyT')=="4") selected @endif>4</option>
                        <option value="3" @if(old('MyT')=="3") selected @endif>3</option>
                        <option value="2" @if(old('MyT')=="2") selected @endif>2</option>
                        <option value="1" @if(old('MyT')=="1") selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="HisR">His Readability</label>
                    <select class="form-control" id="HisR" name="HisR">
                        <option value="">-</option>
                        <option value="5" @if(old('HisR')=="5") selected @endif>5</option>
                        <option value="4" @if(old('HisR')=="4") selected @endif>4</option>
                        <option value="3" @if(old('HisR')=="3") selected @endif>3</option>
                        <option value="2" @if(old('HisR')=="2") selected @endif>2</option>
                        <option value="1" @if(old('HisR')=="1") selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="HisS">His Signal Strength</label>
                    <select class="form-control" id="HisS" name="HisS">
                        <option value="">-</option>
                        <option value="9" @if(old('HisS')=="9") selected @endif>9</option>
                        <option value="8" @if(old('HisS')=="8") selected @endif>8</option>
                        <option value="7" @if(old('HisS')=="7") selected @endif>7</option>
                        <option value="6" @if(old('HisS')=="6") selected @endif>6</option>
                        <option value="5" @if(old('HisS')=="5") selected @endif>5</option>
                        <option value="4" @if(old('HisS')=="4") selected @endif>4</option>
                        <option value="3" @if(old('HisS')=="3") selected @endif>3</option>
                        <option value="2" @if(old('HisS')=="2") selected @endif>2</option>
                        <option value="1" @if(old('HisS')=="1") selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="HisT">His Tone</label>
                    <select class="form-control" id="HisT" name="HisT">
                        <option value="">-</option>
                        <option value="9" @if(old('HisT')=="9") selected @endif>9</option>
                        <option value="8" @if(old('HisT')=="8") selected @endif>8</option>
                        <option value="7" @if(old('HisT')=="7") selected @endif>7</option>
                        <option value="6" @if(old('HisT')=="6") selected @endif>6</option>
                        <option value="5" @if(old('HisT')=="5") selected @endif>5</option>
                        <option value="4" @if(old('HisT')=="4") selected @endif>4</option>
                        <option value="3" @if(old('HisT')=="3") selected @endif>3</option>
                        <option value="2" @if(old('HisT')=="2") selected @endif>2</option>
                        <option value="1" @if(old('HisT')=="1") selected @endif>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="MyPower">My Power (W)</label>
                    <input type="number" class="form-control" id="MyPower" step="0.1" name="MyPower" placeholder="5" value="{{ old('MyPower') }}" required>
                </div>
                <div class="form-group">
                    <label for="HisPower">His Power (W)</label>
                    <input type="number" class="form-control" id="HisPower" step="0.1" name="HisPower" placeholder="0.1" value="{{ old('HisPower') }}" required>
                </div>
                <input type="submit" class="btn">
            </form>
        </div>
    </div>
</div>
@endsection
