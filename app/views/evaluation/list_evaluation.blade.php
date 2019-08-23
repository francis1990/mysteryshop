@extends('layouts.index_admin')
@section('title_window')
 Evaluation management
@stop
@section('activeEvaluation')class="selected"@stop
@section('marco_botones')
{{--
 <span   class="pull-right"><a id="btn_add_market" href="#--}}
{{--{{URL::route("evaluation_market_show",0)}}--}}{{--
" class=" btn btn-primary"><i class="fa fa-plus fa-fw"></i>New evaluation</a></span>
--}}
@stop
 @section('title_panel')
 <ul class="breadcrumb mapa-options" >
 <li><a href="{{URL::route('index')}}">Home</a></li>
     <li><a href="#">Evaluations</a></li>
 </ul>
 @stop
  @section('header_tabla')
         <th>Store name</th>
         <th>Date</th>
         <th>Evaluator</th>
         <th style="width:160px">Actions</th>
 @stop
  @section('body_tabla')
       @foreach($evaluations as $evaluation)
                                                   <?php
                                                        $fechaHora_eval = new DateTime($evaluation->date." ".$evaluation->time);
                                                        if(!empty($porMarket))
                                                        {
                                                          $datos_eval = $evaluation;
                                                        }
                                                        else
                                                          $datos_eval = $evaluation->datos_eval_market();
                                                    ?>
                                                   <tr class="">
                                                       <td>{{$datos_eval->num_market}}</td>
                                                       <td>{{$fechaHora_eval->format('j F Y, l g:ia')}}</td>
                                                       <td>{{$datos_eval->name." ".$datos_eval->surname}}</td>
                                                       <td class="center">
                                                       <span  class="">
                                                       <a href="{{URL::route("evaluation_edit",[$evaluation->id_evaluation])}}" title="Edit" class="btn link-icon">
                                                       <i class="fa fa-edit fa-fw"></i></a>
                                                       </span>
                                                       <span  class="">
                                                       <a href="{{URL::route("evaluation_show",[$evaluation->id_evaluation])}}" title="Show" class=" btn link-icon">
                                                       <i class=" fa fa-eye fa-fw"></i></a>
                                                       </span>
                                                       <span  class="">
                                                       <a href="#deleteModal" data-toggle="modal" data-url="{{URL::route("evaluation_delete",[$evaluation->id_evaluation])}}" title="Delete" class="btn link-icon btn-delete">
                                                       <i class="fa fa-trash-o fa-fw"></i></a>
                                                       </span>
                                                       </td>
                                                   </tr>
                                        @endforeach
  @stop







@section('js_listar')

    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop