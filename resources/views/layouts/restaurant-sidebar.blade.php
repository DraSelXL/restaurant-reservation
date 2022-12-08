@extends('layouts.sidebar')

@section('sidebar-header')
    <h1>ρσятαвℓє</h1>
@endsection

@section('sidebar-menu')
    <ul>
        <a href="/restaurant/home">
            <li @if($active == "home") class="active" @endif>
                <span class="material-symbols-outlined">home</span>
                Home
            </li>
        </a>
        <a href="/restaurant/history">
            <li @if($active == "history") class="active" @endif>
                <span class="material-symbols-outlined">history</span>
                History
            </li>
        </a>
        <a href="/restaurant/statistic">
            <li @if($active == "statistic") class="active" @endif>
                <span class="material-symbols-outlined">monitoring</span>
                Statistic
            </li>
        </a>
    </ul>

    <ul class="mt-auto">
        <a href="/logout">
            <li class="danger">
                <span class="material-symbols-outlined">logout</span>
                Logout
            </li>
        </a>
    </ul>
@endsection
