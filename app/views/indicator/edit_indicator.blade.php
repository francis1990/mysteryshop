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
    <li><a href="{{URL::route('index')}}">Home</a></li>
         <li><a href="#">Indicators</a></li>
         <li><a href="#">Edit</a></li>
     </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
{{ Form::open(array('url' => URL::route("indicator_edit",[$indicator->id_indicator,$type,$id_type]),'method'=>"post",'id'=>"form_indi",'action'=>"validators.html",'class'=>"form-horizontal")) }}

        <div class="clearfix"></div>
        <div class="row">
            <fieldset class="col-md-12">
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
                    <div class="form-group">

                        <label class="col-sm-2 control-label">Name<span class="text-danger"> *</span> </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" required="required"  placeholder="Name"  name="name" id="name" value="{{$indicator->name}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-2 control-label">Values<span class="text-danger"> *</span> </label>
                         <div class="col-sm-7 tooltip-demo">
                             <input type="text" class="form-control" required="required"  placeholder="Values"  name="values" id="values" value="{{$indicator->default_values}}"
                             data-toggle="tooltip"
                            data-placement="right"
                              title="Set the values separated by commas that can catch the indicator. Example 1,3,5 or 1,2,3,4,5"/>
                         </div>
                     </div>
                     <div class="form-group">
                                              <label class="col-sm-2 control-label">Position</label>
                                              <div class="col-sm-7">
                                                  <input type="text" class="form-control"  placeholder="Position"  name="position" id="position" value="{{$entida->order_position}}"  />
                                              </div>
                                          </div>
                      <div class="form-group">
                                            <label class="col-md-3 col-lg-2 control-label" >Description</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="description"   class="form-control" placeholder="Description"
                                                          cols="50" rows="3" name="description" >{{$indicator->description}}</textarea>
                                            </div>
                                    </div>
                    <input type="hidden" name="id_indicator" value="{{$indicator->id_indicator}}" id="id_indicator">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="text-danger">*</span> - Required field
                    </div>

            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>
                <div class=" col-xs-12 col-sm-offset-6 col-sm-2">
                    <button type="submit" id="btn_edit" class="col-xs-12  btn btn-primary disabled">Save</button>
                </div>
                <div class=" col-xs-12 col-sm-2">
                    @if($type == "dep")
                      <a href="{{URL::route("indicator_list_departament",[$id_type])}}" class="col-xs-12 btn btn-default">Cancel</a>
                    @else
                      <a href="{{URL::route("indicator_list_market",[$id_type])}}" class="col-xs-12 btn btn-default">Cancel</a>
                    @endif
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

@section('js')
{{ HTML::script('assets/plugins/jquery.validate.min.js'); }}

<script type="text/javascript">

     $.validator.addMethod("valuesok", function(value, element){
        var arrValue = value.split(','), resp=true, val = "";
        for(var i=0;i<arrValue.length && resp == true;i++)
        {
          if(isNaN(arrValue[i].trim()))
          {
            resp = false;
          }
          else
              val = val+","+arrValue[i].trim(); //val.replace ('|', arrValue[i].trim()+",|")
        }
        if(resp)
        {
          val = val.replace(',', "");
          $('#values').val(val);
        }
        return resp;
     }, "* End date must be after start date");
    $(document).ready(function() {

        $("#form_indi").validate({
            rules: {
                name: { required: true},
                values: {required: true,valuesok:true},
                position: {number: true}

            },
            messages: {
                name: "Name is requiered",
                values: "Values that can be taken by the indicator are invalid",
                position: "The position is a number to define the order of the indicator"
            }
        });
        $('#description,#name,#values,#position').keyup(function(){
                if($('#form_indi').valid()==true)
                    $('#btn_edit').removeClass('disabled');
                else
                    $('#btn_edit').addClass('disabled');
            });
    });
</script>

@stop