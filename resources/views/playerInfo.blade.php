@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<a href="{!! url('players') !!}">Players</a> <i class="fa fa-angle-right fa-fw"></i> {!! $player->last_name !!}, {!! $player->first_name !!}
					<div class="pull-right">
                    	<a href="{!! $player->id !!}/edit">Edit Player Info</a>
                    </div>
                </div>
                <div class="panel-body">
                	Name: {!! $player->last_name !!}, {!! $player->first_name !!}<br/>
                	Email: {!! $player->email !!}<br/>
                	Address 1: {!! $player->address1 !!}<br/>
                	Address 2: {!! $player->address2 !!}<br/>
                	City: {!! $player->city !!}<br/>
                	State: {!! $player->state !!}<br/>
                	Zip Code: {!! $player->zip !!}<br/>
                	Home Phone: {!! $player->home_phone !!}<br/>
                	Cell Phone: {!! $player->cell_phone !!}<br/>
                	Emergency Contact Name: {!! $player->emergency_contact_name !!}<br/>
                	Emergency Contact Phone: {!! $player->emergency_contact_phone !!}<br/>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Characters
                	<div class="pull-right">
                    	<a href="{!! url('characters') !!}/create/{!! $player->id !!}">New Character</a>
                    </div>
                </div>
                <div class="panel-body">
                	@forelse ($characters as $character)
                		<li class="list-group-item">
                    		<a href="{!! url('characters') !!}/{!! $character->id !!}">{{ $character->character_name }}</a>
                    	</li>
                	@empty
                		No characters for this player.
                	@endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
