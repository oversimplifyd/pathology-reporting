@extends('layouts.app')

@section('content')

    <style>
        .test {
            border-top: 3px solid #d3d3d3;
            padding-top: 10px;;
        }

    </style>

    <div class="container" style="margin-top: 40px;">
        <div class="row col-sm-8 col-sm-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <a class="btn btn-success" href="{{ URL::previous() }}">Back</a>
                    <span>Add Report</span>
                </div>
                <div class="panel-body">
                    @if (Session::has("success"))
                        <span class="alert alert-success">
                            <strong>Report updated successfully..</strong>
                        </span>
                    @endif

                    @if (Session::has("error"))
                        <span class="alert alert-success">
                            <strong>Sorry, something went wrong..</strong>
                        </span>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ url('operator/reports/'.$report->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" id="test_count" name="test_count" value="{{count($report->userTests)}}"/>

                        <div id="tests-container">
                            <div class="form-group">
                                <label for="user_id" class="control-label col-sm-4 ">Patient ID</label>
                                <div class="col-sm-8">
                                    <input name="user_id" class="form-control" value="{{$report->user->patient_id}}" required>
                                </div>
                            </div>

                            <?php $index = 1 ?>

                            @foreach($report->userTests as $test)

                                <input type="hidden" name="test_id{{$index}}" value="{{$test->id}}"/>
                            <div class="test">
                                <div class="form-group">
                                    <label for="description" class="control-label col-sm-4 ">Test Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description{{$index}}" class="form-control" required>{{$test->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="purpose" class="control-label col-sm-4 ">Test Purpose</label>
                                    <div class="col-sm-8">
                                        <textarea name="purpose{{$index}}" class="form-control" required>{{$test->purpose}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="result" class="control-label col-sm-4 ">Test Result</label>
                                    <div class="col-sm-8">
                                        <textarea name="result{{$index}}" class="form-control" required>{{$test->result}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="received_at" class="control-label col-sm-4 ">Date Received</label>
                                    <div class="col-sm-8">
                                        <input name="received_at{{$index}}" class="form-control" value="{{$test->received_at}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="completed_at" class="control-label col-sm-4 ">Date Completed</label>
                                    <div class="col-sm-8">
                                        <input name="completed_at{{$index}}" class="form-control" value="{{$test->completed_at}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $index++ ?>
                        @endforeach

                        <div class="form-group">
                            <label for="patient_id">Summary</label>
                            <textarea name="summary" class="form-control" required>{{$report->summary}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success form-control">Add Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
@endsection