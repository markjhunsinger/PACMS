@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Players
                	<div class="pull-right">
                		<a href="{{ url('players/create') }}">Add New Player</a>
                	</div>
                </div>
                
                <div class="panel-body">
                	<ul class="list-group">
                    	@forelse ($players as $player)
                    		<li class="list-group-item">
                    			<a href="players/{!! $player->id !!}">{{ $player->last_name }}, {{ $player->first_name }}</a>
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
