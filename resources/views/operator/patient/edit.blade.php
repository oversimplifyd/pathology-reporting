@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 40px;">
        <div class="row col-sm-8 col-sm-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <a class="btn btn-success" href="{{ URL::previous() }}">Go Back</a>
                    <span>Add Patient</span>
                </div>
                <div class="panel-body">
                    @if (Session::has("success"))
                        <span class="alert alert-success">
                            <strong>Patient updated successfully: {{ Session::get('success') }}</strong>
                        </span>
                    @endif
                    @if (count($errors) > 0)
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first() }}</strong>
                        </span>
                    @endif

                    <form class="form" method="POST" action="{{ url('operator/patients/'.$patient->id) }}">

                        {{ csrf_field() }}

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name">Full Names</label>
                            <input name="name" class="form-control" value="{{$patient->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option selected value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input name="dob" class="form-control" value="{{ $patient->dob}}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input name="phone_number" class="form-control" value="{{ $patient->phone_number}}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-default">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $( "input[name='dob']" ).datepicker({ dateFormat: 'yy-mm-dd' });
    </script>
@endsection