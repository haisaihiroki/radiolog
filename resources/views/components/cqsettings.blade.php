<div class="row">
    <div class="form-group col-md-3">
        <label for="My QTH">My QTH</label>
        <input type="text" class="form-control" name="MyQTH" placeholder="Kohoku-ku, Yokohama-shi, Kanagawa, JP" value="{{ old('MyQTH') }}">
    </div>
    <div class="form-group col-xs-6 col-sm-4 col-md-3">
        <label for="Band">Band</label>
        <input type="text" class="form-control" name="Band" placeholder="Band(MHz)" value="{{ old('Band') }}">
    </div>
    <div class="form-group col-xs-6 col-sm-4 col-md-2">
        <label for="Mode">Mode</label>
        <select class="form-control" id="Mode" name="Mode">
            <option value="">-</option>
            @foreach ($modes as $mode)
                <option value="{{ $mode->id }}" @if(old('Mode') == $mode->id) selected @endif>{{ $mode->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-xs-6 col-sm-4 col-md-2">
        <label for="MyPower">MyPower</label>
        <input type="number" class="form-control" id="MyPower" step="0.1" name="MyPower" placeholder="0.1" value="{{ old('MyPower') }}">
    </div>
    <div class="form-group col-md-2 d-flex align-items-end">
        <input type="button" class="btn btn-primary" value="Set">
        <input type="reset" class="btn btn-secondary" value="Reset">
    </div>
</div>