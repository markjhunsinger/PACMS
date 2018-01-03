@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Races
                	<div class="pull-right"><a href="{{ url('races') }}/create">Add New Race</a></div>
                </div>

                <div class="panel-body">
                	<ul class="list-group">
                		@forelse ($races as $race)
                    		<li class="list-group-item">
                    			{{ $race->race_name }}
                    			<div class="pull-right">
                    				<!-- <a href="{{ $race->id }}/edit">Edit</a> -->
                    			</div>
                    		</li>
                    	@empty
                    		No races.
                    	@endforelse
                	</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
