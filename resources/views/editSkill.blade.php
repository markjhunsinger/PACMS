@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="{!! url('skills') !!}">Skills</a> <i class="fa fa-angle-right fa-fw"></i> {!! $skill->skill_name !!} <i class="fa fa-angle-right fa-fw"></i> Edit
                </div>
                <div class="panel-body">
                	{!! Form::model($skill, ['method' => 'PATCH', 'route' => ['skills.update', $skill->id]]) !!}
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
                		{!! Form::label('skill_name', 'Skill Name', ['class' => 'control-label']) !!}
                		{!! Form::text('skill_name', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('skill_description', 'Skill Description', ['class' => 'control-label']) !!}
                		{!! Form::textarea('skill_description', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('spheres', 'Spheres', ['class' => 'control-label']) !!}
                		<div style="height:200px; overflow-y:scroll">
                			@forelse ($spheres as $sphere)
	                    		<div class="form-check">
	                    			<label class="form-check-label">
	                    				{!! Form::checkbox('spheres[]', $sphere->id, old('spheres[]', (in_array($sphere->id, unserialize($skill->spheres))) ? true : false), ['class' => 'form-check-input']) !!}
	                    				{!! $sphere->sphere_name !!}
	                    			</label>
	                    		</div>
	                    	@empty
	                    		No spheres.
	                    	@endforelse
                		</div>
                	</div>
                	<div class="form-group">
                		{!! Form::label('build_cost', 'Build Cost', ['class' => 'control-label']) !!}
                		{!! Form::text('build_cost', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('ability_type_id', 'Ability Type', ['class' => 'control-label']) !!}
                		<div class="form-check">
                    		<label class="form-check-label">
                    			{!! Form::radio('ability_type_id', 0, old('ability_type_id', ($skill->ability_type_id == 0) ? true : false), ['class' => 'form-check-input']) !!}
                    			None
                    		</label>
                    	</div>
                		@forelse ($abilityTypes as $abilityType)
                    		<div class="form-check">
                    			<label class="form-check-label">
                    				{!! Form::radio('ability_type_id', $abilityType->id, old('ability_type_id', ($abilityType->id == $skill->ability_type_id) ? true : false), ['class' => 'form-check-input']) !!}
                    				{!! $abilityType->ability_type_name !!}
                    			</label>
                    		</div>
                    	@empty
                    		No spheres.
                    	@endforelse
                	</div>
                	<div class="form-group">
                		{!! Form::label('ap_cost', 'Ability Cost (if applicable)', ['class' => 'control-label']) !!}
                		{!! Form::number('ap_cost', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('is_base_skill', 'Base skill?', ['class' => 'control-label']) !!}
                		{!! Form::checkbox('is_base_skill', 1, old('is_base_skill', ($skill->is_base_skill == 1) ? true : false), ['class' => 'form-check-input']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('show_on_site', 'Show skill on site?', ['class' => 'control-label']) !!}
                		{!! Form::checkbox('show_on_site', 1, old('show_on_site', ($skill->show_on_site == 1) ? true : false), ['class' => 'form-check-input']) !!}
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
