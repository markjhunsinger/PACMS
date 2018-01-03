@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Skills by Sphere
                	<div class="pull-right"><a href="{{ url('skills') }}/create">Add New Skill</a></div>
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
					        			<div class="panel panel-default">
					    					<div class="panel-heading" role="tab" id="skillHeading{{ $sphereSkillData['data']->id }}-{{ $skill->id }}">
					      						<h4 class="panel-title">
					      						  	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#skillAccordion" href="#skillCollapse{{ $sphereSkillData['data']->id }}-{{ $skill->id }}" aria-expanded="false" aria-controls="skillCollapse{{ $sphereSkillData['data']->id }}-{{ $skill->id }}">
					          							{{ $skill->skill_name }}
					        						</a>
					        						<div class="pull-right">
                    									<a href="skills/{{ $skill->id }}/edit">Edit</a>
                    								</div>
					      						</h4>
					    					</div>
					    					<div id="skillCollapse{{ $sphereSkillData['data']->id }}-{{ $skill->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="skillHeading{{ $sphereSkillData['data']->id }}-{{ $skill->id }}">
					      						<div class="panel-body">
					        						{{ $skill->skill_description }}
					      						</div>
					   						</div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
