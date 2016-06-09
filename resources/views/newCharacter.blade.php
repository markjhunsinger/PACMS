@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><a href="{{ url('players/') }}">Players</a></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> New Player Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        {{ Form::open(array('route' => 'characters.store')) }}

                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::submit('Save Character', array('class' => 'btn btn-info pull-right')) }}
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
