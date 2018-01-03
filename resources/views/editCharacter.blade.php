@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="{!! url('players') !!}">Players</a> <i class="fa fa-angle-right fa-fw"></i> <a href="{!! url('players') !!}/{!! $character->player->id !!}">{!! $character->player->last_name !!}, {!! $character->player->first_name !!}</a> <i class="fa fa-angle-right fa-fw"></i> <a href="{!! url('characters') !!}/{!! $character->id !!}">{!! $character->character_name !!}</a> <i class="fa fa-angle-right fa-fw"></i> Edit
                </div>
                <div class="panel-body">
                	{!! Form::model($character, ['method' => 'PATCH', 'route' => ['characters.update', $character->id]]) !!}
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
                				<option value="{!! $race->id !!}" {!! ($character->race_id == $race->id) ? 'selected' : '' !!}>{!! $race->race_name !!}</option>
                			@endforeach
                		</select>
                	</div>
                	<div class="form-group">
                		{!! Form::label('build_unspent', 'Build Unspent', ['class' => 'control-label']) !!}
                		{!! Form::text('build_unspent', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                		{!! Form::number('body', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('deaths', 'Deaths', ['class' => 'control-label']) !!}
                		{!! Form::number('deaths', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('dex', 'Dexterity', ['class' => 'control-label']) !!}
                		{!! Form::number('dex', null, ['class' => 'form-control']) !!}
                		{!! Form::select('dex_ratio', $apRatioArray, $abilityPointRatios['dex'], ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('end', 'Endurance', ['class' => 'control-label']) !!}
                		{!! Form::number('end', null, ['class' => 'form-control']) !!}
                		{!! Form::select('end_ratio', $apRatioArray, $abilityPointRatios['end'], ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('pre', 'Presence', ['class' => 'control-label']) !!}
                		{!! Form::number('pre', null, ['class' => 'form-control']) !!}
                		{!! Form::select('pre_ratio', $apRatioArray, $abilityPointRatios['pre'], ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('last_played', 'Last Played', ['class' => 'control-label']) !!}
                		{!! Form::date('last_played', \Carbon\Carbon::parse($character->last_played)->format('Y-m-d'), ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('rp_points', 'Roleplaying Points', ['class' => 'control-label']) !!}
                		{!! Form::number('rp_points', null, ['class' => 'form-control']) !!}
                	</div>
                	@for ($i = 0; $i < 3; $i++)
						<div class="form-group">
	                		{!! Form::label('sphere' . ($i+1), 'Sphere ' . ($i+1), ['class' => 'control-label']) !!}
	                		<select id="sphere{!! $i+1 !!}" name="spheres[]" class="form-control">
	                			<option value="0">None</option>
	                			@forelse ($spheres as $sphere)
	                				<option value="{!! $sphere->id !!}" {!! ($sphere->id == $characterSpheres[$i]['sphere_id']) ? 'selected' : '' !!}>{!! $sphere->sphere_name !!}</option>
		                    	@empty
		                    		No spheres.
		                    	@endforelse
	                		</select>
	                		<input name="sphere_dates[]" type="date" value="{!! $characterSpheres[$i]['date'] !!}" class="form-control">
                		</div>
					@endfor
					<div class="form-group">
						{!! Form::label('ration', 'Ration?', ['class' => 'control-label']) !!}
                		{!! Form::select('ration', ['1' => 'Yes', '0' => 'No'], Input::old('ration', ($character->ration == 1) ? 1 : 0), ['class' => 'form-check-input']) !!}
					</div>
                	<div class="form-group">
                		{!! Form::submit('Save', ['class' => 'btn btn-info pull-right']) !!}
                	</div>
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
