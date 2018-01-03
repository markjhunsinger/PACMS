@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Spheres
                	<div class="pull-right"><a href="{{ url('spheres') }}/create">Add New Sphere</a></div>
                </div>

                <div class="panel-body">
                	<ul class="list-group">
                		@forelse ($spheres as $sphere)
                    		<li class="list-group-item">
                    			{{ $sphere->sphere_name }}
                    			<div class="pull-right">
                    				<!-- <a href="{{ $sphere->id }}/edit">Edit</a> -->
                    			</div>
                    		</li>
                    	@empty
                    		No spheres.
                    	@endforelse
                	</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
