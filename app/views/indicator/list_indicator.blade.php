@extends('layouts.index_admin')
@section('title_window')
 Indicator management
@stop
@section('marco_botones')
 <span   class="pull-right hidden-xs">
                     <span  class="" style="padding: 10px;"><a href="{{URL::route('indicator_departament_add',[$departament->id_dpto])}}" class="pull-right btn btn-primary">
                                                                   <i class="fa fa-plus fa-fw"></i>New Indicator</a></span>

</span>
@stop
 @section('title_panel')
 Indicator list
 @stop
 @section('botons_hidden_xs')
   <ul class="dropdown-menu pull-right" role="menu">
       <li><a href="{{URL::route('indicator_departament_add')}}">New Indicator</a>
       </li>
   </ul>
  @stop
 @section('header_tabla')
        <th>Nombre</th>
        <th style="width: 78px" class="center">Actions</th>
@stop
 @section('body_tabla')
 <?php
 $indicators_dept = $departament->indicators
 ?>

                                         @foreach($indicators_dept as $indic)
                                         <tr class="">

                                                           <td>{{$indic->name}}</td>
                                                           <td class="center">
                                         					<a href="{{URL::route('indicator_delete',[$indic->id_indicator])}}" class="col-xs-6 "><i class=" fa fa-trash-o "></i></a>

                                         					<a href="sw_departament.html" class="col-xs-6 "><i class="fa fa-edit "></i></a>
                                         				  </td>
                                         </tr>

                                         @endforeach

 @stop
