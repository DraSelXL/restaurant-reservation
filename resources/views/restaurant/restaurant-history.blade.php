@extends('layouts.restaurant-sidebar')

@section('main-content')
    <main class="p-4">
        <h1>Restaurant History</h1>
        <hr style="margin: 6px 0">
        <table class="table table-striped">
            <thead class="table-info">
                <tr>
                    <th>No.</th>
                    <th>Reservationist</th>
                    <th>Table</th>
                    <th>Reservation Date</th>
                    <th>Reservation Made</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Lmao</td>
                    <td>4 Table</td>
                    <td>11-12-2002</td>
                    <td>10-12-2002</td>
                    <td>Reserved</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Lmao</td>
                    <td>4 Table</td>
                    <td>11-12-2002</td>
                    <td>10-12-2002</td>
                    <td>Reserved</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Lmao</td>
                    <td>4 Table</td>
                    <td>11-12-2002</td>
                    <td>10-12-2002</td>
                    <td>Reserved</td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection
