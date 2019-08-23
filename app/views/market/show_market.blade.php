@extends('market.index_adminMarket')

@section('css_market')



@stop


@section('marco_contenido_market')
 <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Market management
                    <span  class=""><a href="{{URL::route('market_add')}}" class="pull-right btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add market</a></span>
                    </h1>
                </div>
                <!--end page header -->
            </div>
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
    Market details
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12 ">
        <div class="row">
            <fieldset class="col-md-12">
             <div class="form-static form-horizontal col-lg-12">
                <div class="row">
                    <ul class="nav nav-tabs">
                                            <li class=""><a href="#home" data-toggle="tab">Data</a>
                                            </li>
                                            <li class="active"><a href="#profile" data-toggle="tab">Departments</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade" id="home">
                                                <div class="col-md-12">
                                                                  <div class="row">
                                                                       <div class="form-group col-sm-3 form-group-label"><label class="control-label" >Group</label></div>
                                                                                          <div class="form-group col-sm-9">
                                                                                              <div class="form-control-static">
                                                                                                  {{$market->group_type}}
                                                                                              </div>
                                                                                          </div>
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="form-group col-sm-3 form-group-label"><label class="control-label" >Market number</label>
                                                                    </div>
                                                                        <div class="form-group col-sm-9">
                                                                            <div class="form-control-static">
                                                                                {{$market->num_market}}
                                                                            </div>
                                                                        </div>
                                                                   </div>
                                                                    <div class="row">
                                                                    <div class="form-group col-sm-3 form-group-label">
                                                                          <label class="control-label" >Address</label>
                                                                         </div>
                                                                        <div class="form-group col-sm-9">
                                                                            <div class="form-control-static " >
                                                                               {{$market->address}}
                                                                            </div></div>
                                                					</div>
                                                					</div>
                                            <div class="tab-pane fade active in " id="profile">
                                           <div class="row">
                                            <div class="col-xs-12">

                                               <span  class="pull-right"><a href="{{URL::to('/departament/add/'.$market->id_market)}}" class=" btn btn-primary">
                                               <i class="fa fa-plus fa-fw"></i>New department</a></span>
                                            </div>
                                           </div>


                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <td style="width: 10px"><input type="checkbox"/></td>
                                            <th>Nombre</th>
                                            <th>Area</th>
                                            <th style="width: 78px" class="center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                      $departments = $market->departments;
                                      $classTR = "odd gradeX";
                                      ?>
                                      @foreach($departments as $dpto)
                                      <tr class="{{$classTR}}">
                                                        <td style="width: 10px"><input type="checkbox"/></td>
                                                        <td>{{$dpto->name}}</td>
                                                        <td>{{$dpto->area->nombre}}</td>
                                                        <td class="center">
                                                        <a href="#" class="col-xs-6 "><i class=" fa fa-trash-o "></i></a>

                                                        <a href="sw_departament.html" class="col-xs-6 "><i class="fa fa-eye "></i></a>
                                                      </td>
                                      </tr>
                                      <?php
                                            if($classTR == "odd gradeX")
                                               $classTR = "even gradeC";
                                            else
                                               $classTR = "odd gradeX";
                                       ?>
                                      @endforeach

                                    </tbody>
                                </table>
                            </div>                                            </div>

                                        </div>

    </div>
            </div>


            </fieldset>

            <fieldset class="col-sm-12">
                <legend></legend>


                 <div class="  col-xs-12 col-sm-2 ">
                    <a href="{{URL::route('market_list')}}" class="col-xs-12 btn btn-default"><i class="fa  fa-times fa-fw"></i>Cancel</a>
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

@section('js_market')

{{ HTML::script('assets/scripts/devoops.js'); }}
<script type="text/javascript">
    // Run Select2 plugin on elements
    $(document).ready(function () {
        // Add tooltip to form-controls
        $('.form-control').tooltip();
        // Load example of form validation
        LoadBootstrapValidatorScript(DemoFormValidator);

    });
</script>

@stop