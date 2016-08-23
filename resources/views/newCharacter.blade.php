@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><a href="{{ url('players/' . $player->id) }}">{{ $player->first_name . ' ' . $player->last_name }}</a><i class="fa fa-angle-right fa-fw"></i>New Character</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> New Character Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        {{ Form::open(array('route' => 'characters.store')) }}
                        <div class="col-lg-6">
                            <div class="form-horizontal">
                                <div class="form-group @if ($errors->has('character_name')) has-error @endif">
                                    {{ Form::label('character_name', 'Character Name', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('character_name', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('character_name')) <p class="help-block">{{ $errors->first('character_name') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('character_number', 'Character Number', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('character_number', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('character_number')) <p class="help-block">{{ $errors->first('character_number') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('build_unspent', 'Unspent Build', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('build_unspent', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('build_unspent')) <p class="help-block">{{ $errors->first('build_unspent') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('build_total', 'Total Build', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('build_total', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('build_total')) <p class="help-block">{{ $errors->first('build_total') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('body', 'Body', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('body', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('body')) <p class="help-block">{{ $errors->first('body') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('stress_level', 'Stress Level', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('stress_level', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('stress_level')) <p class="help-block">{{ $errors->first('stress_level') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('deaths', 'Deaths', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('deaths', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('deaths')) <p class="help-block">{{ $errors->first('deaths') }}</p> @endif
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('pre', 'Presence', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('pre', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('pre')) <p class="help-block">{{ $errors->first('pre') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('end', 'Endurance', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('end', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('end')) <p class="help-block">{{ $errors->first('end') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('character_number')) has-error @endif">
                                    {{ Form::label('foc', 'Focus', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('foc', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('foc')) <p class="help-block">{{ $errors->first('foc') }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::hidden('player_id', $player->id) }}
                                {{ Form::submit('Save Character', array('class' => 'btn btn-info pull-right')) }}
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
