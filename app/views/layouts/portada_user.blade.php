@extends('layouts.index_user')
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

                                                      <div class="col-lg-3 ">
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
