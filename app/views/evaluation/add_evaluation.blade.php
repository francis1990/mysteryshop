@extends('evaluation.index_adminEvaluation')
@section('css_evaluation')
{{ HTML::style('assets/plugins/dataTables/dataTables.bootstrap.css'); }}


@stop
@section('activeEvaluation')class="selected"@stop
@section('marco_contenido_evaluation')
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
   <ul class="breadcrumb">
   <li><a href="{{URL::route('index')}}">Home</a></li>
            <li><a href="{{URL::route('evaluation_list')}}">Store {{$market->num_market}}</a></li>
            <li><a href="#">New Evaluation</a></li>
        </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12 ">
<div class="clearfix"></div>
   <form  id="fm_add_eval">
<div class="row">

<fieldset class="">
<div class="form-static  ">
<div class="row">
<div class="col-md-12" >
            <input type="hidden" data-eval="" class="form-control" name="market" data-market="{{$market->id_market}}" id="market" value="{{$market->num_market}}" />
    <div class="row col-xs-10 ">
 <div class=" col-xs-6">
  <label for="date" >Date<span class="text-danger"> *</span>
                 </label>
                <div class="form-group">
                        <input type="date" class="form-control js-datepicker" required="" id="date" />
                </div><!-- /.form group -->
</div>
 <div class=" col-xs-6">
             <label >Time<span class="text-danger"> *</span></label>
                        <div class="form-group bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" required="" id="time"/>
                        </div><!-- /.form group -->
                    </div>
    </div>

</div>
<div class="col-xs-12">
<div class="panel-body" >
<div class="panel-group" id="accordion">
<div class="panel panel-info">
    <div class="panel-heading">
        <h4 class="panel-title" id="collapseCero-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseCero">Store</a>
        </h4>
    </div>
    <?php
                       $indicatorsMarket = DB::table('tb_indicator_market')
                                         ->join('tb_indicator','tb_indicator_market.id_indicator','=','tb_indicator.id_indicator')
                                         ->where('tb_indicator_market.id_market','=',$market->id_market)
                                         ->where('tb_indicator.removed','=',0)
                                         ->orderBy('tb_indicator_market.order_position')
                                         ->get();
                       //$indicatorsMarket = $market->indicators;
                       if(count($indicatorsMarket)>0){
                    ?>
    <div id="collapseCero" class="panel-collapse collapse in">
        <div class="panel-body" style="padding: 0">
                <div class="list-group" data-em="emCero">
                @foreach($indicatorsMarket as $indicator)
                   @if($indicator->removed == 0)
                                <span class="list-group-item tooltip-demo">
                              {{$indicator->order_position}} {{$indicator->name}}
                                    <span  data-toggle="tooltip"
                                          data-placement="left"
                                          title="{{$indicator->description}}"
                                          class="pull-right text-muted small  ">
                                        <select name="" class="form-control input-sm"  required="false" data-indicator="{{$indicator->id_indicator}}">
                                            <option value="0">0</option>
                                            <?php
                                               $arrValues = explode(",",$indicator->default_values);
                                            ?>
                                            @foreach($arrValues as $v)
                                            @if(!empty($v)))
                                               <option value="{{$v}}">{{$v}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </span>
                                </span>
                   @endif
                @endforeach
                </div>
               {{-- <div class=" col-xs-12 col-sm-12 " style="margin-bottom:5px ">
                    --}}{{--<span class="col-xs-12 ">Associate / Department Score: <em id="emCero" class="text-info">0</em>--}}{{--
                    <a href="#"  data-url="{{URL::route("evaluation_add_market")}}" class="pull-right col-xs-12 btn
                    btn-primary col-sm-4 col-md-2 btn_eval"
                     data-selector="collapseCero" data-elem="{{$market->id_market}}" data-type="market"><i
                            class=" fa fa-check fa-fw"></i>Evaluate</a></span>
                </div>--}}
                <!-- /.list-group -->
        </div>
    </div>
      <?php
            }
      ?>
</div>
<?php
    $departamentsMarket = $market->departments;
?>
@foreach($departamentsMarket as  $key=>  $dpto)
@if($dpto->removed == 0)
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title" id="collapse{{$key}}-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">{{$dpto->name}}</a>
        </h4>
    </div>

     <?php
                        $indicatorsDepartment = DB::table('tb_indicator_departament')
                                         ->join('tb_indicator','tb_indicator_departament.id_indicator','=','tb_indicator.id_indicator')
                                         ->where('tb_indicator_departament.id_departament','=',$dpto->id_dpto)
                                         ->where('tb_indicator.removed','=',0)
                                         ->orderBy('tb_indicator_departament.order_position')
                                         ->get();
                        //$indicatorsDepartment = $dpto->indicators;
                        if(count($indicatorsDepartment)>0){

      ?>
    <div id="collapse{{$key}}" class="panel-collapse collapse" data-elem="{{$dpto->id_dpto}}" data-type="dpto" >
        <div class="panel-body" style="padding: 0">
                <div class="row" style="margin-left: 2%; margin-top: 10px">
                    <div class="form-group col-sm-4  form-group-label" >
                        <label class="control-label">Employee name:</label>
                    </div>
                    <div class="form-group  col-sm-6" style="margin-bottom: 0px;">
                        <input  type="text" name=""   class="form-control  employee_name"/>
                    </div>
                </div>
                <div class="list-group" data-em="em{{$key}}">
                @foreach($indicatorsDepartment as $indicatDpto)
                    @if($indicatDpto->removed == 0)
                                <span class="list-group-item tooltip-demo">
                                  {{$indicatDpto->order_position}} {{$indicatDpto->name}}
                                    <span   data-toggle="tooltip"
                                          data-placement="left"
                                          title="{{$indicatDpto->description}}"
                                          class="pull-right text-muted small ">
                                        <select name="" class="  form-control  input-sm"  data-indicator="{{$indicatDpto->id_indicator}}">
                                            <option value="0">0</option>
                                                 <?php
                                                      $arrValues = explode(",",$indicatDpto->default_values);
                                                 ?>
                                                 @foreach($arrValues as $v)
                                                   @if(!empty($v)))
                                                       <option value="{{$v}}">{{$v}}</option>
                                                   @endif
                                                 @endforeach
                                        </select>

                                    </span>
                                </span>
                    @endif
                @endforeach

                </div>
               {{-- <div class=" col-xs-12 col-sm-12 " style="margin-bottom:5px ">
                   --}}{{-- <span class="col-xs-12 ">Associate / Department Score: <em id="em{{$key}}" class="text-info">0</em>--}}{{--
                    <a href="#"  data-url="{{URL::route("evaluation_add_departament")}}" class="pull-right btn btn-primary
                     col-xs-12 col-sm-4 col-md-2 btn_eval"
                    data-selector="collapse{{$key}}" data-elem="{{$dpto->id_dpto}}" data-type="dpto"><i
                            class=" fa fa-check fa-fw"></i>Evaluate</a></span>
                </div>--}}
                <!-- /.list-group -->


        </div>
    </div>
    <?php
    }
    ?>
</div>
@endif
@endforeach





</div>
</div>
</div>

</div>
</div>


</fieldset>
<fieldset class="col-sm-12">
    <legend></legend>

    <div class="  col-sm-6 col-sm-offset-6">
        <button  data-url="{{URL::route("evaluation_add_all")}}" id="btn_save" class=" btn btn-primary disabled"><i class=" fa fa-check fa-fw"></i>Save</button>
        <a href="{{URL::route('evaluation_list')}}" id="btn_close" class=" btn btn-default"><i class="fa fa fa-times fa-fw"></i>Close</a>
    </div>
</fieldset>
</div>
</form>
<input name="flash_messages" value="1" type="hidden">

<div class="row">
    <div class="col-md-12 form-error-container"></div>
</div>

</div>


</div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js_evaluation')
    {{ HTML::script('assets/plugins/jquery.validate.min.js'); }}
    {{ HTML::script('assets/proyecto/js/evaluate.js'); }}
@stop