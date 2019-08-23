@extends('indicator.index_adminIndicator')

@section('css_departament')



@stop


@section('marco_contenido_indicator')

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
    <ul class="breadcrumb">
         <li><a href="#">Indicators</a></li>
         <li><a href="#">New</a></li>
     </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
    {{ Form::open(array('url' => URL::route("indicator_departament_add",[$departament->id_dpto]),'method'=>"post",'id'=>"form_add_indicator",'action'=>"validators.html",'class'=>"form-horizontal")) }}
        <div class="clearfix"></div>
        <div class="row">
            <fieldset class="col-md-12">

                    <div class="form-group">

                           <label class="col-sm-2 control-label" >Department <span class="text-danger"> *</span></label>
                           <div class="col-sm-7">
                                     <input type="text" class="form-control" required="required"  maxlength="50" name="departament" id="departament" value="{{$departament->name}}" DISABLED/>
                                     <input type="hidden" name="id_dpto" value="{{$departament->id_dpto}}" id="id_market">
                           </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label">Name<span class="text-danger"> *</span> </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" required="required"  placeholder="Name"  name="name" id="name" maxlength="50"/>
                        </div>
                    </div>
                      <div class="form-group">
                                            <label class="col-md-3 col-lg-2 control-label" >Description</label>
                                            <div class="col-sm-12 col-md-8">
                                                <textarea id="description"   class="form-control" placeholder="Description"
                                                          cols="50" rows="3" name="description"></textarea>
                                            </div>
                                    </div>
                    <input type="hidden" name="id_market" value="" id="id_market">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="text-danger">*</span> - Required field
                    </div>

            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>
                <div class=" col-xs-12 col-sm-offset-6 col-sm-2">
                    <button type="submit"  class="col-xs-12  btn btn-primary">Save</button>
                </div>
                <div class=" col-xs-12 col-sm-2">
                    <a href="{{URL::route("indicator_list_departament",[$departament->id_dpto])}}" class="col-xs-12 btn btn-default">Cancel</a>
                </div>
            </fieldset>
        </div>
        <input name="flash_messages" value="1" type="hidden">
        <div class="row">
            <div class="col-md-12 form-error-container"></div>
        </div>
    {{Form::close()}}
</div>
</div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js_departament')
{{ HTML::script('assets/plugins/jquery.validate.min.js'); }}

<script type="text/javascript">
    $(document).ready(function() {

        $("#form_add_indicator").validate({
            rules: {
                name: { required: true}
            },
            messages: {
                name: "Name is requiered"
            }
        });
    });
</script>

@stop