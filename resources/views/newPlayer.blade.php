@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><a href="{{ url('players/') }}">Players</a></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> New Player Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        {{ Form::open(array('route' => 'players.store')) }}

                        <div class="col-lg-6">
                            <div class="form-horizontal">
                                <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                                    {{ Form::label('last_name', 'Last Name', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                                    {{ Form::label('first_name', 'First Name', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('first_name', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('email')) has-error @endif">
                                    {{ Form::label('email', 'Email', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('address1')) has-error @endif">
                                    {{ Form::label('address1', 'Address 1', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('address1', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('address1')) <p class="help-block">{{ $errors->first('address1') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('address2')) has-error @endif">
                                    {{ Form::label('address2', 'Address 2', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('address2', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('address2')) <p class="help-block">{{ $errors->first('address2') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('city')) has-error @endif">
                                    {{ Form::label('city', 'City', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('city', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('state')) has-error @endif">
                                    {{ Form::label('state', 'State', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::select('state', $states, null, array('class' => 'form-control')) }}
                                        @if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('zip')) has-error @endif">
                                    {{ Form::label('zip', 'Zip', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('zip', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('zip')) <p class="help-block">{{ $errors->first('zip') }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-horizontal">
                                <div class="form-group @if ($errors->has('home_phone')) has-error @endif">
                                    {{ Form::label('home_phone', 'Home Phone', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('home_phone', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('home_phone')) <p class="help-block">{{ $errors->first('home_phone') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('cell_phone')) has-error @endif">
                                    {{ Form::label('cell_phone', 'Cell Phone', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('cell_phone', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('cell_phone')) <p class="help-block">{{ $errors->first('cell_phone') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('emergency_contact_name')) has-error @endif">
                                    {{ Form::label('emergency_contact_name', 'Emergency Contact Name', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('emergency_contact_name', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('emergency_contact_name')) <p class="help-block">{{ $errors->first('emergency_contact_name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('emergency_contact_phone')) has-error @endif">
                                    {{ Form::label('emergency_contact_phone', 'Emergency Contact Phone', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('emergency_contact_phone', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('emergency_contact_phone')) <p class="help-block">{{ $errors->first('emergency_contact_phone') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('service_points')) has-error @endif">
                                    {{ Form::label('service_points', 'Service Points', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('service_points', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('service_points')) <p class="help-block">{{ $errors->first('service_points') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('event_credits')) has-error @endif">
                                    {{ Form::label('event_credits', 'Event Credits', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('event_credits', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('event_credits')) <p class="help-block">{{ $errors->first('event_credits') }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::submit('Save Player', array('class' => 'btn btn-info pull-right')) }}
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

@endsection
