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
            <li><a href="{{URL::route('evaluation_list')}}">Store {{--{{$market->num_market}}--}}</a></li>
            <li><a href="#">Evaluation details</a></li>
        </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12 ">
        <div class="clearfix"></div>
        <div class="row">
            <fieldset class="col-md-12">
             <div class="form-static form-horizontal col-lg-12">
                <div class="row">
                    <div class="col-md-4"  >
                        <div class="row">
                            <div class="form-group col-sm-6 form-group-label">
                                <label class="control-label" >Store Name:</label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-control-static">
                                 {{$market->num_market}}
                                </div>
                            </div>
                        </div>
 <div class="row">
                            <div class="form-group col-sm-6 form-group-label">
                                <label class="control-label" >Total for shop::</label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-control-static">
                                    4.30
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4" >
                    <div class="row">
                    <?php
                       $fechaHora_eval = new DateTime($evaluation->date." ".$evaluation->time);

                    ?>
                                                <div class="form-group col-sm-6 form-group-label">
                                                    <label class="control-label" >Date:
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="form-control-static " >
                                                        {{$fechaHora_eval->format('j F Y')}}
                                                    </div></div>
                                            </div>

                        <div class="row">
                            <div class="form-group col-sm-6 form-group-label">
                                <label class="control-label" >Total for the Store::
                                </label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-control-static " >
                                    4.8
                                </div></div>
                        </div>

                    </div><div class="col-md-4" >
                     <div class="row">
                                                <div class="form-group col-sm-6 form-group-label">
                                                    <label class="control-label" >Day and Time:</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="form-control-static " >
                                                        {{$fechaHora_eval->format('l, g:ia')}}
                                                    </div></div>
                                            </div>
                        <div class="row">
                                                    <div class="form-group col-sm-6 form-group-label">
                                                        <label class="control-label" >Incentive Program Score::</label>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <div class="form-control-static " >
                                                            4.8
                                                        </div></div>
                                                </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                            <?php
                                                 $indicatorsMarketEvaluados =  DB::table('tb_evaluation_market_indicator')
                                                            ->join('tb_indicator','tb_evaluation_market_indicator.id_indicator','=','tb_indicator.id_indicator')
                                                            ->where('tb_evaluation_market_indicator.id_evaluation','=',$evaluation->id_evaluation)
                                                            ->where('tb_evaluation_market_indicator.id_market','=',$evaluation->id_market)
                                                            ->get();
                             ?>
                             @if(count($indicatorsMarketEvaluados)>0)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Store</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body" style="padding: 0">
                                            <div class="list-group" style="margin: 0;">
                                            @foreach($indicatorsMarketEvaluados as $key=>$indicator)
                                              @if($indicator->removed == 0)
                                                      <a  class="list-group-item">
                                                         {{($key+1)."."}}  {{$indicator->name}} @if($indicator->description!='') ({{$indicator->description}}) @endif
                                                         <span class="pull-right text-muted small"><em>{{$indicator->points}}</em></span>
                                                      </a>
                                              @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endif

                             <?php
                              $departamentsMarketEvaluados =  DB::table('tb_evaluation_departament_indicator')
                                                             ->join('tb_departament','tb_evaluation_departament_indicator.id_dpto','=','tb_departament.id_dpto')
                                                             ->where('tb_evaluation_departament_indicator.id_evaluation','=',$evaluation->id_evaluation)
                                                             ->groupBy('tb_evaluation_departament_indicator.id_dpto')
                                                             ->get();
                                 //$departamentsMarketEvaluados = $market->departments;
                             ?>
                             @foreach($departamentsMarketEvaluados as  $key=>  $dpto)
                             @if($dpto->removed == 0)
                                <?php
                                      $indicatorsDepartmentEvaluado = DB::table('tb_evaluation_departament_indicator')
                                                                               ->join('tb_indicator','tb_evaluation_departament_indicator.id_indicator','=','tb_indicator.id_indicator')
                                                                               ->where('tb_evaluation_departament_indicator.id_evaluation','=',$evaluation->id_evaluation)
                                                                               ->where('tb_evaluation_departament_indicator.id_dpto','=',$dpto->id_dpto)
                                                                               ->get();
                                                            //$indicatorsDepartment = $dpto->indicators;
                                          ?>
                                 @if(count($indicatorsDepartmentEvaluado)>0)
                                <div class="panel panel-default">
                                                                   <div class="panel-heading">
                                                                       <h4 class="panel-title">
                                                                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">{{$dpto->name}}</a>
                                                                       </h4>
                                                                   </div>
                                                                   <div id="collapse{{$key}}" class="panel-collapse collapse ">
                                                                       <div class="panel-body" style="padding: 0">
                                                                           <div class="list-group" style="margin: 0;">
                                                                           @foreach($indicatorsDepartmentEvaluado as $key=>$indicatDpto)
                                                                             @if($indicatDpto->removed == 0)
                                                                                     <a  class="list-group-item">
                                                                                        {{($key+1)."."}}  {{$indicatDpto->name}}@if($indicatDpto->description!='') ({{$indicatDpto->description}}) @endif
                                                                                        <span class="pull-right text-muted small"><em>{{$indicatDpto->points}}</em></span>
                                                                                     </a>
                                                                             @endif
                                                                           @endforeach
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                               @endif
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

                <div class=" col-xs-12 col-sm-2 col-sm-offset-6">
                    <a href="{{URL::route("evaluation_list")}}" class="col-xs-12 btn btn-default">Close</a>
                </div>
            </fieldset>
        </div>
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
    {{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.min.js'); }}
    {{ HTML::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); }}
    {{ HTML::script('assets/proyecto/js/evaluate.js'); }}
    <script type="text/javascript">
        // Run Select2 plugin on elements
        $(document).ready(function () {
            // Add tooltip to form-controls
            $('.form-control').tooltip();
            // Load example of form validation
          //  LoadBootstrapValidatorScript(DemoFormValidator);
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";
            $('.js-datepicker').datepicker({
                startDate: 'now()',
                onSelect: function (date) {
                    alert(date)
                },
                pickTime: false,
                autoclose: true
            });
           /* $(".timepicker").timepicker({
                showInputs: true
            });*/
        });
    </script>
@stop