@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                	<div id="race_div"></div>
                    @piechart('Races', 'race_div')
                    
                    <div style="margin-top:20px"></div>
                    
                    <div id="sphere_div"></div>
                    @columnchart('Spheres', 'sphere_div')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
