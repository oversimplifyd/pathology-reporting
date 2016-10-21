@extends('layouts.app')

@section('content')

    <style>
        .ui-helper-hidden-accessible {
            display: none;
        }

        .ui-autocomplete.ui-front.ui-menu {
            background: #fff;
            width: 27%;
        }

        .ui-autocomplete.ui-front.ui-menu li {
            list-style: none;
            font-weight: bolder;
        }

        .ui-autocomplete.ui-front.ui-menu li:hover {
            background-color: #F5F5F5;
        }
        
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "user_names", //Relative or absolute path to response.php file
                success: function(data) {
                    $('#user_names').autocomplete({
                        source: $.map(data, function(el) { return el }),
                        autoFocus: true
                    });
                },
                error: function() {
                    console.log('Something Went wrong processing the request');
                }
            });
        });
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            @if (Session::has("message"))
                                <span class="help-block">
                                        <strong>{{ Session::get('message') }}</strong>
                                    </span>
                            @endif

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                               <div class="col-md-6">
                                    <input id="user_names" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pass_code" class="col-md-4 control-label">Pass Code</label>

                                <div class="col-md-6">
                                    <input id="pass_code" type="password" class="form-control" name="pass_code">

                                    @if ($errors->has('pass_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pass_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection