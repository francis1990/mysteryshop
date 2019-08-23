@extends('market.index_adminMarket')

@section('css_market')



@stop


@section('marco_contenido_market')

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
    <ul class="breadcrumb">
    <li><a href="{{URL::route('index')}}">Home</a></li>
                     <li><a href="{{URL::route('market_list')}}">Store</a></li>
                     <li><a href="#">Details</a></li>
                 </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12 ">
        <div class="row">
            <fieldset class="col-md-12">
             <div class="form-static form-horizontal col-lg-12">
                <div class="row">
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
                            <div class="form-group col-sm-3 form-group-label"><label class="control-label" >Store number</label>
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

                </div>
            </div>
            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>


                 <div class="  col-xs-12 col-sm-3 col-md-2 pull-right ">
                    <a href="{{URL::route('market_list')}}" class="col-xs-12 btn btn-default"><i class="fa  fa-times fa-fw"></i>Close</a>
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