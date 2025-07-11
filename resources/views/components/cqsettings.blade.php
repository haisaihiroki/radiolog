<div class="row">
    <div class="form-group col-md-3">
        <label for="cqmode-My-QTH">My QTH</label>
        <input id="cqmode-My-QTH" type="text" class="form-control" name="MyQTH" placeholder="Kohoku-ku, Yokohama-shi, Kanagawa, JP" value="{{ old('MyQTH') }}">
    </div>
    <div class="form-group col-xs-6 col-sm-4 col-md-3">
        <label for="cqmode-Band">Band</label>
        <input id="cqmode-Band" type="text" class="form-control" name="Band" placeholder="Band(MHz)" value="{{ old('Band') }}">
    </div>
    <div class="form-group col-xs-6 col-sm-4 col-md-2">
        <label for="cqmode-Mode">Mode</label>
        <select id="cqmode-Mode" class="form-control" id="Mode" name="Mode">
            <option value="">-</option>
            @foreach ($modes as $mode)
                <option value="{{ $mode->id }}" @if(old('Mode') == $mode->id) selected @endif>{{ $mode->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-xs-6 col-sm-4 col-md-2">
        <label for="cqmode-MyPower">MyPower</label>
        <input id="cqmode-MyPower" type="number" class="form-control" id="MyPower" step="0.1" name="MyPower" placeholder="0.1" value="{{ old('MyPower') }}">
    </div>
    <div class="form-group col-12 col-md-2 d-flex align-items-end gap-2 mt-md-0 mt-3">
        <input type="button" class="btn btn-primary" id="cqmode-set" value="Set">
        <input type="reset" class="btn btn-secondary" id="cqmode-reset" value="Reset">
    </div>
</div>
<script>
document.getElementById('cqmode-set').addEventListener('click', function() {
    sessionStorage.setItem('cqmode-My-QTH', document.getElementById('cqmode-My-QTH').value);
    sessionStorage.setItem('cqmode-Band', document.getElementById('cqmode-Band').value);
    sessionStorage.setItem('cqmode-Mode', document.getElementById('cqmode-Mode').value);
    sessionStorage.setItem('cqmode-MyPower', document.getElementById('cqmode-MyPower').value);

    let msg = document.createElement('div');
    msg.textContent = 'Setしました';
    msg.style.position = 'fixed';
    msg.style.top = '30px';
    msg.style.left = '50%';
    msg.style.transform = 'translateX(-50%)';
    msg.style.background = 'rgba(40,167,69,0.95)';
    msg.style.color = '#fff';
    msg.style.padding = '10px 20px';
    msg.style.borderRadius = '5px';
    msg.style.zIndex = '9999';
    msg.style.fontSize = '1rem';
    document.body.appendChild(msg);
    setTimeout(() => {
        msg.remove();
    }, 1200);
});
document.getElementById('cqmode-reset').addEventListener('click', function() {
    sessionStorage.removeItem('cqmode-My-QTH');
    sessionStorage.removeItem('cqmode-Band');
    sessionStorage.removeItem('cqmode-Mode');
    sessionStorage.removeItem('cqmode-MyPower');
    document.getElementById('cqmode-My-QTH').value = '';
    document.getElementById('cqmode-Band').value = '';
    document.getElementById('cqmode-Mode').value = '';
    document.getElementById('cqmode-MyPower').value = '';

    let msg = document.createElement('div');
    msg.textContent = 'Clearしました';
    msg.style.position = 'fixed';
    msg.style.top = '30px';
    msg.style.left = '50%';
    msg.style.transform = 'translateX(-50%)';
    msg.style.background = 'rgba(40,167,69,0.95)';
    msg.style.color = '#fff';
    msg.style.padding = '10px 20px';
    msg.style.borderRadius = '5px';
    msg.style.zIndex = '9999';
    msg.style.fontSize = '1rem';
    document.body.appendChild(msg);
    setTimeout(() => {
        msg.remove();
    }, 1200);
});
window.addEventListener('DOMContentLoaded', function() {
    if (sessionStorage.getItem('cqmode-My-QTH')) {
        document.getElementById('cqmode-My-QTH').value = sessionStorage.getItem('cqmode-My-QTH');
    }
    if (sessionStorage.getItem('cqmode-Band')) {
        document.getElementById('cqmode-Band').value = sessionStorage.getItem('cqmode-Band');
    }
    if (sessionStorage.getItem('cqmode-Mode')) {
        document.getElementById('cqmode-Mode').value = sessionStorage.getItem('cqmode-Mode');
    }
    if (sessionStorage.getItem('cqmode-MyPower')) {
        document.getElementById('cqmode-MyPower').value = sessionStorage.getItem('cqmode-MyPower');
    }
});
</script>