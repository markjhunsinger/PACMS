@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="{!! url('players') !!}">Players</a> <i class="fa fa-angle-right fa-fw"></i> <a href="{!! url('players') !!}/{!! $player->id !!}">{!! $player->last_name !!}, {!! $player->first_name !!}</a> <i class="fa fa-angle-right fa-fw"></i> New Character
                </div>
                <div class="panel-body">
                	{!! Form::open(array('route' => 'characters.store')) !!}
                	@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
                	<div class="form-group">
                		{!! Form::label('character_name', 'Character Name', ['class' => 'control-label']) !!}
                		{!! Form::text('character_name', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('race', 'Race', ['class' => 'control-label']) !!}
                		<select id="race" name="race_id" class="form-control">
                			@foreach ($races as $race)
                				<option value="{!! $race->id !!}">{!! $race->race_name !!}</option>
                			@endforeach
                		</select>
                	</div>
                	<div class="form-group">
                		{!! Form::label('build_unspent', 'Build Unspent', ['class' => 'control-label']) !!}
                		{!! Form::text('build_unspent', '0', ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                		{!! Form::number('body', 4, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('deaths', 'Deaths', ['class' => 'control-label']) !!}
                		{!! Form::number('deaths', 0, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('dex', 'Dexterity', ['class' => 'control-label']) !!}
                		{!! Form::number('dex', 0, ['class' => 'form-control']) !!}
                		{!! Form::select('dex_ratio', $apRatioArray, null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('end', 'Endurance', ['class' => 'control-label']) !!}
                		{!! Form::number('end', 0, ['class' => 'form-control']) !!}
                		{!! Form::select('end_ratio', $apRatioArray, null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('pre', 'Presence', ['class' => 'control-label']) !!}
                		{!! Form::number('pre', 0, ['class' => 'form-control']) !!}
                		{!! Form::select('pre_ratio', $apRatioArray, null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('last_played', 'Last Played', ['class' => 'control-label']) !!}
                		{!! Form::date('last_played', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('rp_points', 'Roleplaying Points', ['class' => 'control-label']) !!}
                		{!! Form::number('rp_points', 0, ['class' => 'form-control']) !!}
                	</div>
                	@for ($i = 0; $i < 3; $i++)
						<div class="form-group">
	                		{!! Form::label('sphere' . ($i+1), 'Sphere ' . ($i+1), ['class' => 'control-label']) !!}
	                		<select id="sphere{!! $i+1 !!}" name="spheres[]" class="form-control">
	                			<option value="0">None</option>
	                			@forelse ($spheres as $sphere)
	                				<option value="{!! $sphere->id !!}">{!! $sphere->sphere_name !!}</option>
		                    	@empty
		                    		No spheres.
		                    	@endforelse
	                		</select>
	                		<input name="sphere_dates[]" type="date" value="{!! \Carbon\Carbon::now()->format('Y-m-d') !!}" class="form-control">
                		</div>
					@endfor
                	<div class="form-group">
                		{!! Form::hidden('player_id', $player->id) !!}
                		{!! Form::hidden('ration', 1) !!}
                		{!! Form::submit('Save', ['class' => 'btn btn-info pull-right']) !!}
                	</div>
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
