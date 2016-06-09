@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><a href="{{ url('players/') }}">Players</a><i class="fa fa-angle-right fa-fw"></i>{{ $player->first_name }} {{ $player->last_name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Player Information
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ url('players/'.$player->id.'/edit') }}"><button type="button" class="btn btn-info btn-xs">Edit Player</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $playerInfo !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Characters
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ url('/characters/create') }}"><input type="button" class="btn btn-info btn-xs" value="New Character"></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $charactersTable->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
