@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="{!! url('players') !!}">Players</a> <i class="fa fa-angle-right fa-fw"></i> <a href="{!! url('players') !!}/{!! $character->player->id !!}">{!! $character->player->last_name !!}, {!! $character->player->first_name !!}</a> <i class="fa fa-angle-right fa-fw"></i> {!! $character->character_name !!}
					<div class="pull-right">
                    	<a href="{!! url('characters') !!}/{!! $character->id !!}/edit" title="Edit Character Info"><i class="fa fa-pencil"></i></a> 
                    	<a href="{!! url('characters') !!}/printCard/{!! $character->id !!}" title="Print Card" target="_blank"><i class="fa fa-print"></i></a>
                    </div>
                </div>
                <div class="panel-body">
					Character Name: {!! $character->character_name !!}<br/>
					Race: {!! $character->race->race_name !!}<br/>
					Build Spent: {!! $buildSpent !!}<br/>
                	Build Unspent: {!! $character->build_unspent !!}<br/>
                	Body: {!! $character->body !!}<br/>
                	Deaths: {!! $character->deaths !!}<br/>
                	DEX: {!! $character->dex !!} ({!! $abilityPointRatios['dex'] !!})<br/>
                	END: {!! $character->end !!} ({!! $abilityPointRatios['end'] !!})<br/>
                	PRE: {!! $character->pre !!} ({!! $abilityPointRatios['pre'] !!})<br/>
                	Last Played: {!! $character->last_played !!}<br/>
                	RP Points: {!! $character->rp_points !!}<br/>
                	Spheres:
                	<ul>
                		@forelse ($characterSpheres as $characterSphereInfo)
                			{!! $characterSphereInfo['sphere_name'] !!} - {!! $characterSphereInfo['date'] !!}<br/>
                		@empty
                			No spheres.
                		@endforelse
                	</ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                	Skills
                	<div class="pull-right">
                    	<a href="{!! url('characters') !!}/addSkill/{!! $character->id !!}">Add Skills</a>
                    </div>
                </div>
                <div class="panel-body">
                	<table class="table table-bordered table-hover">
                		@forelse ($skills as $skill)
                			<tr>
	                			<td>
	                				<strong>({!! $skill['build_cost'] !!})</strong> {!! $skill['skill_name'] !!} {!! ($skill['total']) > 1 ? '(x' . $skill['total'] . ')' : '' !!} {!! ($skill['ability_type_cost'] != '' and $skill['ability_type_name'] != '') ? ('[' . $skill['ability_type_cost']  . ' ' . $skill['ability_type_name'] . ']') : '' !!}
	                			</td>
						 		<td>
							 		{!! Form::open(['action' => ['CharacterController@deleteCharacterSkill', $character->id, $skill['skillID']]]) !!}
							 			{!! Form::hidden('character_id', $character->id) !!}
							 			{!! Form::hidden('skill_id', $skill['skillID']) !!}
							 			{!! Form::submit('Delete One') !!}
							 		{!! Form::close() !!}
						 		</td>
					 		</tr>
						@empty
							No skills.
						@endforelse
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
