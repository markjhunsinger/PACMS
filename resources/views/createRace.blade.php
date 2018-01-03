@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">New Race</div>
                <div class="panel-body">
                	{!! Form::open(array('route' => 'races.store')) !!}
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
                		{!! Form::label('race_name', 'Race Name', ['class' => 'control-label']) !!}
                		{!! Form::text('race_name', null, ['class' => 'form-control']) !!}
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
