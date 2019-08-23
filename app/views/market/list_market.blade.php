@extends('market.index_adminMarket')

@section('css_market')

{{ HTML::style('assets/plugins/dataTables/dataTables.bootstrap.css'); }}

@stop

@section('marco_botones')
 <span   class="pull-right hidden-xs"><a title="New market" id="btn_add_market" href="{{URL::route('market_add')}}" class=" btn btn-primary">
 <i class="fa fa-plus fa-fw"></i><span class="hidden-sm">New store</span></a>
    <a title="Departaments" id="" href="{{URL::to('/departament/list/market/{id_market}')}}" class="hidden btn btn-primary btn_add_depa">
               <i class="fa fa-cog fa-fw"></i><span class="hidden-sm">Manager</span></a>
                <a title="Departaments" id="" href="{{URL::to('/departament/list/market/{id_market}')}}" class="hidden btn btn-primary btn_add_depa">
               <i class="fa fa-shopping-cart fa-fw"></i><span class="hidden-sm">Departments</span></a>
    <a title="Indicators" id="" href="{{URL::to('/indicator/list/market/{id_market}')}}" class="hidden btn btn-primary btn_add_indi">
               <i class="fa  fa-leaf fa-fw"></i><span class="hidden-sm">Indicators</span></a>
                <a title="Evaluations" id="" href="{{URL::to('/evaluation/list/market/{id_market}')}}" class="hidden btn btn-primary btn_list_eval">
               <i class="fa  fa-pencil fa-fw"></i><span class="hidden-sm">Evaluations</span></a></span>

@stop
@section('marco_contenido_market')

<div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             <ul class="breadcrumb mapa-options" >
                               <li><a href="{{URL::route('index')}}">Home</a></li>
                                   <li><a href="#">Stores list</a></li>
                               </ul>
                             <div id="option-xs" class="visible-xs pull-right">
                                 <div class="btn-group">
                                     <a href="#" class="btn  btn-primary  btn-sm dropdown-toggle" data-toggle="dropdown">
                                          <i class="fa fa-cog fa-1x"></i>
                                           <span class="caret"></span>
                                     </a>
                                     <ul class="dropdown-menu pull-right" role="menu">
                                         <li><a href="{{URL::route('market_add')}}">New store</a>
                                         </li>
                                         <li class="disabled"><a class="btn_add_depa" href="{{URL::to('/departament/list/market/{id_market}')}}">Manager</a>
                                         </li>
                                         <li class="disabled"><a class="btn_add_depa" href="{{URL::to('/departament/list/market/{id_market}')}}">Departments</a>
                                         </li>
                                         <li class="disabled"><a class="btn_add_indi" href="{{URL::to('/indicator/list/market/{id_market}')}}" >Indicators</a>
                                         </li>
                                         <li class="disabled"><a class="btn_list_eval" href="{{URL::to('/evaluation/list/market/{id_market}')}}" >Evaluations</a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                <table class="table-responsive table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <th class="hidden-xs">Group</th>
                                           <th>Store number</th>
                                           <th style="width:150px;" class="hidden-xs">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($allMarkets as $market)
                                        <tr class="" data-val="{{$market->id_market}}">

                                        <td class="hidden-xs">{{$market->group_type}} </td>
                                            <td>{{$market->num_market}}
                                            <div id="" class="pull-right hidden visible-xs btn-flotantes">
                                                <span  class="">
                                                    <a href="{{URL::route("market_edit_show",array($market->id_market))}}" title="Edit" class="link-icon">
                                                    <i class="fa fa-edit fa-fw"></i></a>
                                                    </span>
                                                <span  class="">
                                                <a href="{{URL::to('market/show/'.$market->id_market)}}" title="Show" class="link-icon">
                                                <i class=" fa fa-eye fa-fw"></i></a>
                                                </span>
                                                <span  class="">
                                                <a href="#deleteModal" title="Delete"
                                                data-toggle="modal" class=" link-icon btn-delete"  data-url="{{URL::to('market/delete/'.$market->id_market)}}">
                                                <i class="fa fa-trash-o fa-fw"></i></a>
                                                </span>
                                            </div></td>

                                             <td class="hidden-xs center">
											<span  class="">
                                                <a href="{{URL::route("market_edit_show",array($market->id_market))}}" title="Edit" class="link-icon">
                                                <i class="fa fa-edit fa-fw"></i></a>
                                                </span>
											<span  class="">
											<a href="{{URL::to('market/show/'.$market->id_market)}}" title="Show" class="  link-icon">
											<i class=" fa fa-eye fa-fw"></i></a>
											</span>

											<span  class="">
                                            <a href="#deleteModal" title="Delete" data-toggle="modal" class="link-icon btn-delete"  data-url="{{URL::to('market/delete/'.$market->id_market)}}">
                                            <i class="fa fa-trash-o fa-fw"></i></a>
                                            </span>
											</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

@stop
@section('modal')

                        <div style="display: none;" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                             Do you want remove this element?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn-cancel-modal btn btn-default" data-dismiss="modal"><i class="fa fa fa-times fa-fw"></i>Cancel</button>
                                            <a href="#" {{--id="btn_del_ok"--}} class="btn-del-modal btn btn-primary"><i class="fa fa-check fa-fw"></i>Yes</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
@stop
@section('js_market')
    {{ HTML::script('assets/plugins/dataTables/jquery.dataTables.js'); }}
    {{ HTML::script('assets/plugins/dataTables/dataTables.bootstrap.js'); }}
   {{ HTML::script('assets/proyecto/js/market.js'); }}

    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop