@extends('departament.index_adminDepartament')

@section('css_departament')



@stop


@section('marco_contenido_departament')

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
 <ul class="breadcrumb">
        <li><a href="{{URL::route('index')}}">Home</a></li>
         <li><a href="{{URL::route("departament_list_market",array($departament->market->id_market))}}">Departments</a></li>
         <li><a href="#">Edit</a></li>
     </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
    {{ Form::open(array('url' => URL::route("departament_edit",[$departament->id_dpto]),'method'=>"post",'id'=>"form_edit_departament",'action'=>"validators.html",'class'=>"form-horizontal")) }}
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

                           <label class="col-sm-2 control-label" >Store </label>
                           <div class="col-sm-7">
                                     <input type="text" class="form-control" required="required"  maxlength="50" name="market" id="market" value="{{$departament->market->num_market}}" DISABLED/>
                           </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label">Name<span class="text-danger"> *</span> </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" required="required"  placeholder="Name"  name="name" id="name" maxlength="50" value="{{$departament->name}}"/>
                        </div>
                    </div>

                    <input type="hidden" name="id_dpto" value="{{$departament->id_dpto}}" id="id_dpto">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="text-danger">*</span> - Required field
                    </div>

            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>
                <div class=" col-xs-6  col-md-offset-6 col-md-3">
                    <button type="submit"  class="col-xs-12  btn btn-primary disabled btn-add">
                    <i class="fa fa-check fa-fw"></i>
                    Save</button>
                </div>
                <div class=" col-xs-6  col-md-3">
                    <a href="{{URL::route("departament_list_market",array($departament->market->id_market))}}"
                    class="col-xs-12 btn btn-default"><i class="fa fa fa-times fa-fw"></i>
                    Cancel</a>
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
@section('activeMarket')class="selected"@stop
@section('js_departament')
{{ HTML::script('assets/plugins/jquery.validate.min.js'); }}

<script type="text/javascript">
    $(document).ready(function() {

        $("#form_edit_departament").validate({
            rules: {
                name: { required: true}
            },
            messages: {
                name: "Name is requiered"
            }
        });
        $("#form_edit_departament input").keyup(function(){
                    if($("#form_edit_departament").valid())
                        $('.btn-add').removeClass('disabled');
                    else
                    $('.btn-add').addClass('disabled')
                })
    });
</script>

@stop