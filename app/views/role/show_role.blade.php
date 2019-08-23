@extends('role.index_adminRole')

@section('marco_contenido_role')

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
        <ul class="breadcrumb">
        <li><a href="{{URL::route('index')}}">Home</a></li>
                   <li><a href="{{URL::route('role_list')}}">Role</a></li>
                   <li><a href="#">Details</a></li>
               </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12 ">

        <div class="clearfix"></div>
        <div class="row">
            <fieldset class="col-md-12">
             <div class="form-static form-horizontal col-lg-8">
                <div class="row">
            <div class="col-md-12">
                  <div class="row">
                    <div class="form-group col-sm-3 form-group-label"><label class="control-label" >Type</label>
                    </div>
                        <div class="form-group col-sm-9">
                            <div class="form-control-static">
                                {{$role->type}}
                            </div>
                             </div>
                            </div>
                    <div class="row">
                    <div class="form-group col-sm-3 form-group-label">
                          <label class="control-label" >Description</label>
                         </div>
                        <div class="form-group col-sm-9">
                            <div class="form-control-static " >
                                {{$role->description}}
                            </div></div>
					</div>
            </div>
    </div>
            </div>


            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>

                <div class=" col-xs-12 col-sm-3 col-sm-offset-6">
                    <a href="{{URL::route('role_list')}}" class="col-xs-12 btn btn-default"><i class="fa fa fa-times fa-fw"></i>
                    Close</a>
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

@section('js_role')
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