@extends('layouts.app')

@section('content')

    <h3> Reports</h3>

    @if (count($reports) > 0)
    <!-- INLINE FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    {{--<h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
                    <hr>--}}
                    <thead>
                    <tr>
                        <th> Date</th>
                        <th><i class="fa fa-user"></i> ID</th>
                        <th><i class="fa fa-user"></i> Name</th>
                        <th> Report Summary</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{$report->created_at->diffForHUmans()}}</td>
                                <td>{{$report->user->patient_id }}</td>
                                <td>{{$report->user->name }}</td>
                                <td>{{$report->summary}}</td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="{{ url('/show_report/'.$report->id) }}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->
    @else
        <div class="alert alert-danger">There are no reports available.</div>
    @endif
@endsection