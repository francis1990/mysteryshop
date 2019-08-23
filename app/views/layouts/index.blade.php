<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MysteryShop @yield('title')</title>
    @yield('head')
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Core CSS - Include with every page -->
             {{ HTML::style('assets/plugins/bootstrap/bootstrap.css'); }}
             {{ HTML::style('assets/font-awesome/css/font-awesome.css'); }}
             {{ HTML::style('assets/plugins/pace/pace-theme-big-counter.css'); }}
             {{ HTML::style('assets/plugins/datepicker/bootstrap-datepicker.css'); }}
             {{ HTML::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); }}
             {{ HTML::style('assets/plugins/chosen/chosen.css'); }}
             {{ HTML::style('assets/css/style.css'); }}
             {{ HTML::style('assets/css/main-style.css'); }}
             {{ HTML::style('assets/plugins/morris/morris-0.4.3.min.css'); }}
             {{ HTML::style('assets/plugins/complete/awesomplete.css'); }}

             {{ HTML::style('assets/proyecto/css/mysteryshop.css'); }}

           @yield('css')
             <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/proyecto/img/logoico.ico')}}" />
</head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::route("index")}}" style="font-weight:bold; color: #FFFFff;  font-size: 24px; text-shadow: 1px 3px rgba(0, 0, 0, 0.075); ">
               Mystery<span style="color: #86dd0d;font-size: 22px">Shop</span>
                    <img src="{{ asset('assets/proyecto/img/logo_ico.png')}}" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- Menu Horizontal -->
            <ul class="nav navbar-top-links navbar-right tooltip-demo">
                <!-- main dropdown -->
                <li class="dropdown" title="Stores Evaluation" data-placement="left" data-toggle="tooltip">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger"></span><i class="fa fa-list-alt fa-3x"></i><i class="fa fa-shopping-cart fa-1x"></i>
                    </a>
                    <!-- Menu de Horizontal -->
                    <ul class="dropdown-menu">
                        <?php
                             $globalAllMarket = Market::where('removed','=',0)->get();
                            ?>
                        @foreach($globalAllMarket as $globalMarket)
                        <li>
                            <a href="{{URL::route("evaluation_market_show",[$globalMarket->id_market])}}">
                                <div>
                                    <strong><span class=" label label-danger">Store: {{$globalMarket->num_market}}</span></strong>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach

                    </ul>
                    <!-- end dropdown-messages -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                     <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <!--<div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>-->
                            <div class="user-info">
                                <div><strong>{{Auth::user()->get()->name}} {{Auth::user()->get()->surname}}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                     </li>

                    <!-- Menu lateal-->

                    <!-- Administration-->

                    @if(Auth::user()->get()->role->type == "manager" || Auth::user()->get()->role->type == "administrator")
                     <li @yield('activeAdministration')>
                                    <a href="#"><i class="fa fa-cogs fa-2x"></i><strong> Administration</strong><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{URL::route('users_list')}}"><i class="fa fa-group fa-fw"></i><strong> Users</strong>{{--<span class="fa arrow"></span>--}}</a>
                    						{{--<ul class="nav nav-third-level">
                    						   <li>
                                                    <a href="{{URL::route('users_add')}}"><i class="fa fa-plus fa-fw"></i>New User</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::route('users_list')}}"><i class="fa fa-list fa-fw"></i>List of users</a>
                                                </li>

                                            </ul>--}}
                                        </li>
                                     @if(Auth::user()->get()->role->type == "administrator")
                                       <li>
                                            <a href="{{URL::route('role_list')}}"><i class="fa fa-key fa-fw"></i><strong> Roles</strong><!--<span class="fa arrow"></span>--></a>
                    						<!--<ul class="nav nav-third-level">
                    						    <li>
                                                     <a href="{{URL::route('role_add')}}"><i class="fa fa-plus fa-fw"></i>New Role</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::route('role_list')}}"><i class="fa fa-list fa-fw"></i>List of roles</a>
                                                </li>
                                            </ul>-->
                                        </li>
                                     @endif
                                    </ul>
                     </li>
                     <!-- Market-->
                     <li @yield('activeMarket') >
                         <a href="{{URL::route('market_list')}}"><i class="fa fa-home fa-2x"></i><i class="fa fa-shopping-cart fa-1x"></i><strong> Stores</strong></a>
                      </li>
                      <!-- Evaluation-->
                        <li @yield('activeReport') >
                               <a href="{{URL::route('report_excel_by_date')}}"><i class="fa fa-bar-chart-o fa-2x fa  "></i><strong> Reports</strong></a>
                            </li>

                     @endif
					 <li @yield('activeEvaluation') >
                           <a href="{{URL::route('evaluation_list')}}"><i class="fa fa-book fa-2x"></i><strong> Evaluations</strong></a>

                        </li>



                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            @yield('marco_contenido')
            @yield('modal')
            

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
        {{ HTML::script('assets/plugins/jquery-1.10.2.js'); }}
        {{ HTML::script('assets/plugins/bootstrap/bootstrap.min.js'); }}
        {{ HTML::script('assets/plugins/chosen/chosen.jquery.min.js'); }}
        {{ HTML::script('assets/plugins/metisMenu/jquery.metisMenu.js'); }}
        {{ HTML::script('assets/plugins/pace/pace.js'); }}
        {{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.min.js'); }}
        {{ HTML::script('assets/scripts/siminta.js'); }}
        {{ HTML::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); }}
        {{ HTML::script('assets/plugins/morris/raphael-2.1.0.min.js'); }}
        {{ HTML::script('assets/plugins/morris/morris.js'); }}
        {{ HTML::script('assets/plugins/complete/awesomplete.js'); }}

        {{ HTML::script('assets/proyecto/js/mysteryshop.js'); }}
      <script type="text/javascript">
             jQuery(document).ready(function () {

                 jQuery(".chosen-select").chosen();
                 $.fn.datepicker.defaults.format = "yyyy-mm-dd";
                 $('.js-datepicker').datepicker({

                     onSelect: function(date) {
                         alert(date)
                     },
                   autoclose:true
                  // startDate:'now'
                 });
                //Timepicker
              $(".timepicker").timepicker({
                            showInputs: false,
                            minuteStep: 1
                });
             });
         </script>
        @yield('js')

</body>

</html>
