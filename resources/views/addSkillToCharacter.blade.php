@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	{!! Form::open(array('route' => 'characters.storeCharacterSkill')) !!}
        	<div class="panel panel-default">
                <div class="panel-heading">
                	Learned Date
                </div>
                <div class="panel-body">
                	{!! Form::date('date_learned', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                	Skills by Sphere
                </div>

                <div class="panel-body">
                	@forelse ($sphereSkillDataArray as $sphereSkillData)
                		<div class="panel panel-default">
                			<div class="panel-heading" role="tab" id="sphereHeading{{ $sphereSkillData['data']->id }}">
                				<h4 class="panel-title">
					      		  	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#sphereAccordion" href="#sphereCollapse{{ $sphereSkillData['data']->id }}" aria-expanded="false" aria-controls="sphereCollapse{{ $sphereSkillData['data']->id }}">
					          			{{ $sphereSkillData['data']->sphere_name }}
					        		</a>
					      		</h4>
                			</div>
                			<div id="sphereCollapse{{ $sphereSkillData['data']->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sphereHeading{{ $sphereSkillData['data']->id }}">
					      		<div class="panel-body">
					        		@forelse ($sphereSkillData['skills'] as $skill)
					        			<div class="form-check">
	                    					<label class="form-check-label">
	                    						{!! Form::checkbox("skills[$skill->id][skillID]", $skill->id, old('skills[]', null), ['class' => 'form-check-input']) !!}
	                    						{!! $skill->skill_name !!}
	                    						<div id="numSelect_{!! $skill->id !!}" class="pull-right" style="display: none">
	                    							<input id="quantity_{!! $skill->id !!}" name="skills[{!! $skill->id !!}][quantity]" type="number" value="{!! old('quantity[]', 0) !!}" class="form-control" disabled>
	                    						</div>
	                    					</label>
	                    				</div>
					        		@empty
					        			No skills to display.
				        			@endforelse
					        		
					      		</div>
					   		</div>
                		</div>
                	@empty
                		No spheres to display.
                	@endforelse
                	
                	<div class="form-group">
            			{!! Form::hidden('character_id', $character->id) !!}
            			{!! Form::submit('Save', ['class' => 'btn btn-info pull-right']) !!}
            		</div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
	var skillID = 0;
	var checkbox;
	$("input[name^='skills']").on('click', function() {
		checkbox = $(this);
		skillID = $(checkbox).val();
		$('#numSelect_' + skillID).toggle(400, function() {
			if (checkbox.is(':checked') == true)
			{
				$('#quantity_' + skillID).prop('disabled', false);
				$('#quantity_' + skillID).val('1');
			}
			else
			{
				$('#quantity_' + skillID).prop('disabled', true);
				$('#quantity_' + skillID).val('0');
			}
		});
		
	});
});
</script>
@endsection
