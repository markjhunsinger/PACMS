@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><a href="{{ route('players.index') }}">Players</a><i class="fa fa-angle-right fa-fw"></i><a href="{{ route('players.show', $character->player->id) }}">{{ $character->player->first_name }} {{ $character->player->last_name }}</a><i class="fa fa-angle-right fa-fw"></i>{!! $character->character_name !!}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Character Information
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('characters.print', $character->id) }}" title="Print Card" target="_blank"><i class="fa fa-print"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $characterInfo !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Character Notes
                    </div>
                    <div class="panel-body">
                        Under construction.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
