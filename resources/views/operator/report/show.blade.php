@extends('layouts.app')
@section('content')
    <a class="btn btn-success" href="{{ URL::previous() }}">Go Back</a>
    <h3>Report Details</h3>
    <div class="row mt">
        <div class="col-lg-12">
            @if ($report)
                <div class="report-summary">
                    <h5>Test Count {{count($report->userTests)}}</h5>
                    <h5>Owner {{$report->user->name}}</h5>
                </div>
                @if (count($report->userTests) > 0)
                    <div class="report-tests">
                        <h2>Test(s) Result</h2>
                        <table class="table table-advance table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th>Purpose</th>
                                <th> Result</th>
                                <th> Received</th>
                                <th> Completed</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($report->userTests as $test)
                                <tr>
                                    <td>{{$test->description}}</td>
                                    <td>{{$test->purpose}}</td>
                                    <td>{{$test->result}}</td>
                                    <td>{{$test->received_at}}</td>
                                    <td> {{$test->completed_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger">Sorry, you have no tests for this report</div>
                @endif

        </div>
    </div><!-- /col-md-4 -->
    @endif
@endsection