@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><a href="{{ url('players/') }}">Players</a><i class="fa fa-angle-right fa-fw"></i><a href="{{ url('players/' . $player->id) }}">{{ $player->first_name }} {{ $player->last_name }}</a><i class="fa fa-angle-right fa-fw"></i><a href="{{ url('characters/' . $character->id) }}">{{ $character->character_name }}</a><i class="fa fa-angle-right fa-fw"></i>Edit Character</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Edit Character Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        {{ Form::model($character, ['method' => 'PATCH', 'route' => ['characters.update', $character->id]]) }}

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
                                <div class="form-group @if ($errors->has('last_played')) has-error @endif">
                                    {{ Form::label('last_played', 'Last Played', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::text('last_played', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('last_played')) <p class="help-block">{{ $errors->first('last_played') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('body')) has-error @endif">
                                    {{ Form::label('body', 'Body', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('body', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('body')) <p class="help-block">{{ $errors->first('body') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('build_total')) has-error @endif">
                                    {{ Form::label('build_total', 'Total Build', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('build_total', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('build_total')) <p class="help-block">{{ $errors->first('build_total') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('build_unspent')) has-error @endif">
                                    {{ Form::label('build_unspent', 'Build Unspent', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('build_unspent', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('build_unspent')) <p class="help-block">{{ $errors->first('build_unspent') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('skills')) has-error @endif">
                                    {{ Form::label('skills', 'Skills', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::textarea('skills', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('skills')) <p class="help-block">{{ $errors->first('skills') }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-horizontal">
                                <div class="form-group @if ($errors->has('stress_level')) has-error @endif">
                                    {{ Form::label('stress_level', 'Stress Level', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('stress_level', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('stress_level')) <p class="help-block">{{ $errors->first('stress_level') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('rp_points')) has-error @endif">
                                    {{ Form::label('rp_points', 'RP Points', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('rp_points', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('rp_points')) <p class="help-block">{{ $errors->first('rp_points') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('deaths')) has-error @endif">
                                    {{ Form::label('deaths', 'Deaths', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('deaths', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('deaths')) <p class="help-block">{{ $errors->first('deaths') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('pre')) has-error @endif">
                                    {{ Form::label('pre', 'Presence', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('pre', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('pre')) <p class="help-block">{{ $errors->first('pre') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('end')) has-error @endif">
                                    {{ Form::label('end', 'Endurance', array('class' => 'col-lg-4 control-label')) }}
                                    <div class="col-lg-8">
                                        {{ Form::number('end', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('end')) <p class="help-block">{{ $errors->first('end') }}</p> @endif
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('foc')) has-error @endif">
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
                                {{ Form::submit('Update Character', array('class' => 'btn btn-info pull-right')) }}
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
