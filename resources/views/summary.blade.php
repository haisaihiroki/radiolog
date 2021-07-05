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
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total</td>
                            <td>{{ count($band_160) }}</td>
                            <td>{{ count($band_80) }}</td>
                            <td>{{ count($band_40) }}</td>
                            <td>{{ count($band_30) }}</td>
                            <td>{{ count($band_20) }}</td>
                            <td>{{ count($band_17) }}</td>
                            <td>{{ count($band_15) }}</td>
                            <td>{{ count($band_12) }}</td>
                            <td>{{ count($band_10) }}</td>
                            <td>{{ count($band_6) }}</td>
                            <td>{{ count($band_2) }}</td>
                            <td>{{ count($band_430) }}</td>
                            <td>{{ count($band_1200) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection