@extends('layouts.app')

@section('content')
    <style>
        #main {
            width: 40%;
            margin: 20% auto;
        }
    </style>

    <div id="main">
        <a style="display: block; margin-bottom: 10px;;" class="btn btn-primary btn-lg" href="{{ url('/operator/patients')}}">Manage Patients</a>
        <a style="display: block" class="btn btn-warning btn-lg" href="{{ url('/operator/reports')}}">Reports</a>
    </div>
@endsection