@extends('layouts.index')
@section('css')
<style type="text/css">
                .box-modulos a{
                text-decoration: none;
                font-size: 18px;
                }
                .box-modulos a:hover{
                text-shadow: 1px 2px rgba(0, 0, 0, 0.075);
                }
                .box-modulos .panel-body{
                    height: 100px;
                }
                .box-modulos i{
                margin-top: 20px;
                }
             </style>
@stop
       @section('left-side')
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
                                            <a href="{{URL::route('role_list')}}"><i class="fa fa-key fa-fw"></i><strong> Role</strong><!--<span class="fa arrow"></span>--></a>
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
        @stop
@section('marco_contenido')
           <div class="row">
                        <!-- Page Header -->
                        <div class="col-lg-12">
                            <h1 class="page-header">Home</h1>
                        </div>
                        <!--End Page Header -->
                    </div>
                  <div class="row box-modulos">
                                  <!--quick info section -->
                                   <div class="col-lg-3">
                                 <div class="panel panel-primary text-center no-boder">
                                                         <div class="panel-body alert-danger">
                                                           <a href="{{URL::route('users_list')}}" class="text-danger"><i class="fa fa-cogs fa-3x"></i></a>
                                                         </div>
                                                         <div class="panel-footer">
                                                               <a href="{{URL::route('users_list')}}">
                                                                      <span class="panel-eyecandy-title text-danger">Administration
                                                                                                                          </span>
                                                                      </a>
                                                         </div>
                                                     </div></div>
                                                      <div class="col-lg-3">
                                 <div class="panel panel-primary text-center no-boder">
                                                         <div class="panel-body alert-success ">
                                                         <a href="{{URL::route('market_list')}}" class="text-success">
                                                         <i class="fa fa-home fa-3x"></i><i class="fa fa-shopping-cart fa-2x"></i>
        </a>
                                                         </div>
                                                         <div class="panel-footer">
                                                               <a href="{{URL::route('market_list')}}">
                                                                  <span class="panel-eyecandy-title text-success">Stores
                                                                                                                      </span>
                                                                  </a>
                                                         </div>
                                                     </div></div>
                                                      <div class="col-lg-3">
                                 <div class="panel panel-primary text-center no-boder">
                                                         <div class="panel-body alert-info">
                                                         <a href="{{URL::route('evaluation_list')}}" class="text-info">
                                                         <i class="fa fa-book fa-3x"></i>
                                                         </a>


                                                         </div>
                                                         <div class="panel-footer">
                                                               <a href="{{URL::route('evaluation_list')}}">
                                                                  <span class="panel-eyecandy-title text-info">Evaluations
                                                                                                                       </span>
                                                                  </a>
                                                         </div>
                                                     </div></div>
                                                      <div class="col-lg-3">
                                 <div class="panel panel-primary text-center no-boder">
                                                         <div class="panel-body alert-warning">
                                                          <a href="{{URL::route('report_excel_by_date')}}" class="text-warning">
                                                             <i class="fa fa-bar-chart-o fa-3x"></i>
                                                           </a>
                                                         </div>
                                                         <div class="panel-footer">
                                                         <a href="{{URL::route('report_excel_by_date')}}">
                                                         <span class="panel-eyecandy-title text-warning">Reports
                                                                                                              </span>
                                                         </a>

                                                         </div>
                                                     </div></div>

                                  <!--end quick info section -->
                              </div>
@stop
