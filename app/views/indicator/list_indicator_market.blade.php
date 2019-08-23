@extends('layouts.index_admin')
@section('css_listar')
 <style rel="stylesheet">
        select[multiple]{
            padding: 0;
        }
        select[multiple] option{
            padding: 5px;
            border-bottom: solid 1px #ddd;
        }
    </style>
@stop
@section('title_window')
 Indicator management
@stop
@section('marco_botones')
 <span   class="pull-right hidden-xs">
                     <span  class="" style="padding: 10px;"><a href="#insertModal"
                     class="pull-right btn btn-primary" data-toggle="modal">
                      <i class="fa fa-plus fa-fw"></i>New Indicator</a></span>

</span>
@stop
 @section('title_panel')
  <ul class="breadcrumb mapa-options">
  <li><a href="{{URL::route('index')}}">Home</a></li>
          <li><a href="{{URL::route('market_list')}}">Store {{$market->num_market}}</a></li>
          <li><a href="#"> Indicators</a></li>
      </ul>
 @stop
 @section('botons_hidden_xs')
   <ul class="dropdown-menu pull-right" role="menu">
       <li><a href="#insertModal" data-toggle="modal" >New Indicator</a>
       </li>

   </ul>
  @stop
 @section('header_tabla')
        <th>#</th>
        <th>Nombre</th>
        <th style="width: 78px" class="center hidden-xs">Actions</th>
@stop
@section('activeMarket')class="selected"@stop
 @section('body_tabla')
 <?php
 $indicators_market = DB::table('tb_indicator_market')
                  ->join('tb_indicator','tb_indicator_market.id_indicator','=','tb_indicator.id_indicator')
                  ->where('tb_indicator_market.id_market','=',$market->id_market)
                  ->where('tb_indicator.removed','=',0)
                  ->orderBy('tb_indicator_market.order_position')
                  ->get();
 //$indicators_market = $market->indicators
 ?>
     @foreach($indicators_market as $indic)
     <tr class="tooltip-demo">
                       <td data-toggle="tooltip" data-placement="top" title="" >{{$indic->order_position}}</td>
                       <td data-original-title="{{$indic->description}}" data-toggle="tooltip" data-placement="top" title="" >{{$indic->name}}
                        <div id="" class="pull-right hidden visible-xs btn-flotantes">
                          <span><a href="{{URL::route("indicator_edit",[$indic->id_indicator,'mark',$market->id_market])}}" class="col-xs-6 "><i class="fa fa-edit "></i></a> </span>
                          <span><a href="#deleteModal" data-toggle="modal" data-url="{{URL::route('indicator_delete',[$indic->id_indicator,"market",$market->id_market])}}" class="col-xs-6 btn-delete"><i class=" fa fa-trash-o "></i></a> </span>
                        </div>
                       </td>
                       <td class="center hidden-xs">
                        <a href="{{URL::route("indicator_edit",[$indic->id_indicator,'mark',$market->id_market])}}" class="col-xs-6 "><i class="fa fa-edit "></i></a>
                        <a href="#deleteModal" data-toggle="modal" data-url="{{URL::route('indicator_delete',[$indic->id_indicator,"market",$market->id_market])}}" class="col-xs-6 btn-delete"><i class=" fa fa-trash-o "></i></a>
                      </td>
     </tr>
   @endforeach
 @stop
 @section('modal')
       @parent
          <div style="display: none;" class="modal fade" id="insertModal" tabindex="-1" role="dialog"
          aria-labelledby="insertModal" aria-hidden="true">
                              <div class="modal-dialog">
                               {{ Form::open(array('url' => URL::route("indicator_market_add"),'method'=>"post",'id'=>"form-indi",'class'=>"form-horizontal")) }}
                                  <div class="modal-content">
                                  <div class="modal-header"><h4>New indicator</h4></div>
                                      <div class="modal-body">

                                               <div class="radio">
                                                   <label>
                                                       <input name="optionsRadios" id="optionsRadios1" value="new" type="radio"
                                                       checked>New indicator
                                                   </label>
                                                     @if($errors->any())
                                                                                    <div class="alert alert-danger" role="alert">
                                                                                        <p>Por favor corrige los errores:</p>
                                                                                       <ul>
                                                                                       @foreach($errors->all() as $error)
                                                                                       <li>{{$error}}</li>
                                                                                       @endforeach
                                                                                       </ul>
                                                                                    </div>
                                                                               @endif
                                                   <div class="form-group new ">
                                                       <label class="col-sm-2 control-label">Name<span class="text-danger"> *</span> </label>
                                                       <div class="col-sm-8">
                                                           <input id="nom_indi" type="text" class="form-control"   placeholder="Name"   name="name"/>
                                                           <input type="hidden" name="id_market" value="{{$market->id_market}}" id="id_market"/>
                                                       </div>
                                                   </div>
                                                   <div class="form-group new">
                                                                            <label class="col-sm-2 control-label">Values<span class="text-danger"> *</span> </label>
                                                                            <div class="col-sm-8 ">
                                                                                <input type="text" class="form-control" required="required"  placeholder="Values"  name="values" id="values" value=""

                                                                                title="Set the values separated by commas that can catch the indicator. Example 1,3,5 or 1,2,3,4,5"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group new">
                                                                                                 <label class="col-sm-2 control-label">Position</label>
                                                                                                 <div class="col-sm-8">
                                                                                                     <input type="text" class="form-control"  placeholder="Position"  name="position" id="position" value=""  />
                                                                                                 </div>
                                                                                             </div>
                                                   <div class="form-group new">
                                                       <label class="col-sm-2 control-label" >Description</label>
                                                       <div class="col-sm-8">
                                                           <textarea id="desc_indi" name="description"   class="form-control"
                                                            placeholder="Description" cols="50" ></textarea>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="radio">
                                                   <label>
                                                       <input name="optionsRadios" id="optionsRadios2" value="exist" type="radio">Exist indicators
                                                   </label>
                                                   <div class="form-group exist hidden">
                                                       <label class="col-sm-2 control-label">Name<span class="text-danger"> *</span> </label>
                                                       <div class="col-sm-12">
                                                           <select name="existentes[]" multiple=""  id="select_indi" class="form-control col-xs-8" style="height: 200px">
                                                           @foreach($arrIndicadoresResultado as $indicatorResult)
                                                               <option value="{{$indicatorResult['id_indicator']}}" title="{{$indicatorResult['description']}}">{{$indicatorResult['name']}}</option>
                                                           @endforeach
                                                           </select>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div>

                                               </div>

                                      </div>
                                      <div class="modal-footer">
                                            <button  id="cancel-form"  class="btn-cancel-modal btn btn-default"
                                             data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
                                            <button  id="add-form" class="btn-del-modal btn btn-primary disabled"><i class="fa fa-plus" ></i>Add</button>
                                        </div>
                                  </div>
                                    {{Form::close()}}
                              </div>
                      </div>
 @stop
 @section('js_listar')
  {{ HTML::script('assets/proyecto/js/indicator.js'); }}
  {{ HTML::script('assets/plugins/jquery.validate.min.js'); }}

  <script type="text/javascript">



  </script>
 @stop
