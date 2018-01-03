@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">New Skill</div>
                <div class="panel-body">
                	{!! Form::open(array('route' => 'skills.store')) !!}
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
	                    				{!! Form::checkbox('spheres[]', $sphere->id, Input::old('spheres[]', false), ['class' => 'form-check-input']) !!}
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
                		{!! Form::text('build_cost', 0, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('ability_type_id', 'Ability Type', ['class' => 'control-label']) !!}
                		<div class="form-check">
                    		<label class="form-check-label">
                    			<input class="form-check-input" type="radio" name="ability_type_id" value="0" />
                    			None
                    		</label>
                    	</div>
                		@forelse ($abilityTypes as $abilityType)
                    		<div class="form-check">
                    			<label class="form-check-label">
                    				{!! Form::radio('ability_type_id', $abilityType->id, Input::old('ability_type_id', false), ['class' => 'form-check-input']) !!}
                    				{!! $abilityType->ability_type_name !!}
                    			</label>
                    		</div>
                    	@empty
                    		No spheres.
                    	@endforelse
                	</div>
                	<div class="form-group">
                		{!! Form::label('ap_cost', 'Ability Cost (if applicable)', ['class' => 'control-label']) !!}
                		{!! Form::number('ap_cost', 0, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('is_base_skill', 'Base skill?', ['class' => 'control-label']) !!}
                		{!! Form::checkbox('is_base_skill', 1, Input::old('is_base_skill', false), ['class' => 'form-check-input']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('show_on_site', 'Show skill on site?', ['class' => 'control-label']) !!}
                		{!! Form::checkbox('show_on_site', 1, Input::old('show_on_site', false), ['class' => 'form-check-input']) !!}
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
