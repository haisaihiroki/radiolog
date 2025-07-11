@extends('layouts.app-summary')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="center">Summary - {{ $subject }}</div>
        </div>

        <div class="card-body">
            <form method="get", action="{{ route('summary') }}">
                <div class="row">
                    <div class="form-group col-md-2 mb-3">
                        <select class="form-control" name="period">
                            <option value="">Total</option>
                            @foreach($list_period as $year)
                            @if($period == $year)
                            <option value="{{ $year }}" selected>{{ $year }}</option>
                            @else
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 mb-3">
                        <input type="submit" class="btn btn-primary" value="GO">
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        @foreach($bands as $band)
                        <th scope="col">{{ $band->band }}</th>
                        @endforeach
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total</td>
                            @foreach($summary as $val)
                            <td><x-zerogray :count="count($val)"/></td>
                            @endforeach
                            <td><x-zerogray :count="count($total)"/></td>
                        </tr>
                        @foreach($mode_analogs as $analog)
                        <tr>
                            <td>{{ $analog->name }}</td>
                            @foreach($summary as $val)
                            <td><x-zerogray :count="count($val->where('mode_id', $analog->id))"/></td>
                            @endforeach
                            <td><x-zerogray :count="count($total->where('mode_id', $analog->id))"/></td>
                        </tr>
                        @endforeach
                        @foreach($mode_digitals as $digital)
                        <tr>
                            <td>{{ $digital->name }}</td>
                            @foreach($summary as $val)
                            <td><x-zerogray :count="count($val->where('mode_id', $digital->id))"/></td>
                            @endforeach
                            <td><x-zerogray :count="count($total->where('mode_id', $digital->id))"/></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection