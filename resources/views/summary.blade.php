@extends('layouts.app-summary')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="center">Summary</div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">160m</th>
                        <th scope="col">80m</th>
                        <th scope="col">40m</th>
                        <th scope="col">30m</th>
                        <th scope="col">20m</th>
                        <th scope="col">17m</th>
                        <th scope="col">15m</th>
                        <th scope="col">12m</th>
                        <th scope="col">10m</th>
                        <th scope="col">6m</th>
                        <th scope="col">2m</th>
                        <th scope="col">70cm</th>
                        <th scope="col">23cm</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total</td>
                            <td><x-zerogray :count="count($band_160)"/></td>
                            <td><x-zerogray :count="count($band_80)"/></td>
                            <td><x-zerogray :count="count($band_40)"/></td>
                            <td><x-zerogray :count="count($band_30)"/></td>
                            <td><x-zerogray :count="count($band_20)"/></td>
                            <td><x-zerogray :count="count($band_17)"/></td>
                            <td><x-zerogray :count="count($band_15)"/></td>
                            <td><x-zerogray :count="count($band_12)"/></td>
                            <td><x-zerogray :count="count($band_10)"/></td>
                            <td><x-zerogray :count="count($band_6)"/></td>
                            <td><x-zerogray :count="count($band_2)"/></td>
                            <td><x-zerogray :count="count($band_430)"/></td>
                            <td><x-zerogray :count="count($band_1200)"/></td>
                            <td><x-zerogray :count="count($total)"/></td>
                        </tr>
                        @foreach($mode_analogs as $analog)
                        <tr>
                            <td>{{ $analog->name }}</td>
                            <td><x-zerogray :count="count($band_160->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_80->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_40->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_30->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_20->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_17->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_15->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_12->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_10->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_6->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_2->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_430->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($band_1200->where('mode_id', $analog->id))"/></td>
                            <td><x-zerogray :count="count($total->where('mode_id', $analog->id))"/></td>
                        </tr>
                        @endforeach
                        @foreach($mode_digitals as $digital)
                        <tr>
                            <td>{{ $digital->name }}</td>
                            <td><x-zerogray :count="count($band_160->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_80->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_40->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_30->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_20->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_17->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_15->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_12->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_10->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_6->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_2->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_430->where('mode_id', $digital->id))"/></td>
                            <td><x-zerogray :count="count($band_1200->where('mode_id', $digital->id))"/></td>
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