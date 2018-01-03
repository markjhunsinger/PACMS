@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="{!! url('players') !!}">Players</a> <i class="fa fa-angle-right fa-fw"></i> <a href="{!! url('players') !!}/{!! $player->id !!}">{!! $player->last_name !!}, {!! $player->first_name !!}</a> <i class="fa fa-angle-right fa-fw"></i> Edit
                </div>
                <div class="panel-body">
                	{!! Form::model($player, ['method' => 'PATCH', 'route' => ['players.update', $player->id]]) !!}
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
                		{!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                		{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                		{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                		{!! Form::email('email', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('address1', 'Address 1', ['class' => 'control-label']) !!}
                		{!! Form::text('address1', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('address2', 'Address 2', ['class' => 'control-label']) !!}
                		{!! Form::text('address2', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('city', 'City', ['class' => 'control-label']) !!}
                		{!! Form::text('city', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('state', 'State', ['class' => 'control-label']) !!}
                		{!! Form::text('state', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('zip', 'Zip', ['class' => 'control-label']) !!}
                		{!! Form::text('zip', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('home_phone', 'Home Phone', ['class' => 'control-label']) !!}
                		{!! Form::text('home_phone', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('cell_phone', 'Cell Phone', ['class' => 'control-label']) !!}
                		{!! Form::text('cell_phone', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('emergency_contact_name', 'Emergency Contact Name', ['class' => 'control-label']) !!}
                		{!! Form::text('emergency_contact_name', null, ['class' => 'form-control']) !!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('emergency_contact_phone', 'Emergency Contact Phone', ['class' => 'control-label']) !!}
                		{!! Form::text('emergency_contact_phone', null, ['class' => 'form-control']) !!}
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
