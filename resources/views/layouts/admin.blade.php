<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Colony Alpha LARP</title>

    <!-- Styles -->
    {{ Html::style('css/styles.css') }}
    {{--{{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}--}}
    {{ Html::style('css/bootstrap.min.css') }}
    {{ Html::style('bower_components/metisMenu/dist/metisMenu.min.css') }}
    {{ Html::style('dist/css/timeline.css') }}
    {{ Html::style('dist/css/sb-admin-2.css') }}
    {{ Html::style('bower_components/morrisjs/morris.css') }}
    {{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="app-layout">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/dashboard') }}">Colony Alpha LARP</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/players') }}"><i class="fa fa-users fa-fw"></i> Players</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gamepad fa-fw"></i><span class="fa arrow"></span> Game Settings</a>
                            <ul class="nav nav-third-level collapse">
                                <li><a href="#"> Races</a></li>
                                <li><a href="#"> Classes</a></li>
                                <li><a href="#"> Knowledges</a></li>
                                <li><a href="#"> Skills</a></li>
                                <li><a href="#"> Spells</a></li>
                                <li><a href="#"> Prayers</a></li>
                            </ul>
                        </li>
                        <li>
                            {{--<a href="{{ url('/admin') }}"><i class="fa fa-wrench fa-fw"></i><span class="fa arrow"></span> Administration</a>--}}
                            <a href="#"><i class="fa fa-wrench fa-fw"></i><span class="fa arrow"></span> Administration</a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="#"><i class="fa fa-users"></i> Users</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')

    </div>
    <!-- /#wrapper -->

    {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
    {{--{{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}--}}
    {{ Html::script('js/bootstrap.min.js') }}
    {{ Html::script('bower_components/metisMenu/dist/metisMenu.min.js') }}
    {{ Html::script('bower_components/raphael/raphael-min.js') }}
    {{-- {{ Html::script('bower_components/morrisjs/morris.min.js') }} --}}
    {{-- }}{{ Html::script('js/morris-data.js') }}--}}
    {{ Html::script('dist/js/sb-admin-2.js') }}

    {{ Html::script('js/events.js') }}


</body>
</html>
