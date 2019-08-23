@extends('layouts.index_admin')
@section('title_window')
 Department management
@stop
@section('activeMarket')class="selected"@stop
@section('marco_botones')
 <span   class="pull-right hidden-xs">
                     <a title="New departament" href="{{URL::to('/departament/add/'.$market->id_market)}}"
                     class=" btn btn-primary btn_add_depa">
                        <i id="" class="fa fa-plus fa-fw"></i><span class="hidden-sm">New department</span></a>
                     <a title="Indicators" id="" href="{{URL::to('/indicator/list/departament/{id_departament}')}}"
                     class="hidden btn btn-primary btn_add_indi">
                        <i class="fa fa-leaf fa-fw"></i><span class="hidden-sm">Indicators</span></a>
 </span>
@stop
 @section('title_panel')
 <ul class="breadcrumb mapa-options" >
    <li><a href="{{URL::route('index')}}">Home</a></li>
     <li><a href="{{URL::route('market_list')}}">Store {{$market->num_market}}</a></li>
     <li><a href="#">Departments</a></li>
 </ul>
 @stop
 @section('botons_hidden_xs')
   <ul class="dropdown-menu  pull-right"  role="menu">
       <li class=""><a class="btn_add_depa" href="{{URL::to('/departament/add/'.$market->id_market)}}">
       New department</a></li>
       <li class="disabled"><a class="btn_add_indi" href="{{URL::to('/indicator/list/departament/{id_departament}')}}" >
       Indicators</a></li>
   </ul>
  @stop
 @section('header_tabla')
        <th>Nombre</th>
        <th style="width: 78px" class="center hidden-xs">Actions</th>
@stop
 <?php
 $departments = $market->departments;

 ?>
 @section('body_tabla')
             @foreach($departments as $dpto)
             @if($dpto->removed == 0)
             <tr class="" data-val="{{$dpto->id_dpto}}">
                       <td>{{$dpto->name}}
                       <div id="" class="pull-right hidden visible-xs btn-flotantes">
                                  <span>
                                    <a  href="{{URL::route('departament_edit',[$dpto->id_dpto])}}" class="col-xs-6 ">
                                    <i class="fa fa-edit "></i>
                                    </a>
                                    </span>
                                 <span>
                                   <a href="#deleteModal" data-toggle="modal" data-url="{{URL::route('departament_delete',[$dpto->id_dpto])}}" class="col-xs-6 btn-delete">
                                   <i class=" fa fa-trash-o "></i>
                                   </a>
                                   </span>
                           </div>
                       </td>
                       <td class="hidden-xs center">

                        <span>
                        <a href="{{URL::route('departament_edit',[$dpto->id_dpto])}}" class="col-xs-6 ">
                        <i class="fa fa-edit "></i>
                        </a>
                        </span>
                        <span>
                        <a href="#deleteModal" data-toggle="modal" data-url="{{URL::route('departament_delete',[$dpto->id_dpto])}}" class="col-xs-6 btn-delete">
                        <i class=" fa fa-trash-o "></i>
                        </a>
                        </span>
                        </td>
                      </td>
             </tr>
             @endif
             @endforeach
 @stop

@section('js_listar')
    {{ HTML::script('assets/proyecto/js/departament.js'); }}
@stop