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
       <li><a href="#">New</a></li>
   </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
    {{ Form::open(array('url' => URL::route("role_add"),'method'=>"post",'id'=>"form_add_rol",'action'=>"validators.html",'class'=>"form-horizontal")) }}
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
                        <label class="col-md-3 col-lg-2 control-label">Name<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" required="required"  placeholder="Name" name="type" id="type"  maxlength="50"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-lg-2 control-label" >Description</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea id="description"   class="form-control" placeholder="Description"
                                      cols="50" rows="3" name="description"></textarea>
                        </div>
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="text-danger">*</span> - Required field
                    </div>
                </div>
            </fieldset>
               <fieldset class="col-sm-12">
                <legend></legend>
                <div class=" col-xs-6  col-md-offset-6 col-md-2">
                    <button type="submit"  class="col-xs-12  btn btn-primary disabled btn-add"><i class="fa fa-check fa-fw"></i>Save</button>
                </div>
                <div class=" col-xs-6  col-md-2">
                    <a href="{{URL::route('role_list')}}" class="col-xs-12 btn btn-default"><i class="fa fa fa-times fa-fw"></i>Cancel</a>
                </div>
            </fieldset>
        </div>
        <input name="flash_messages" value="1" type="hidden">
        <div class="row">
            <div class="col-md-12 form-error-container"></div>
        </div>
    {{ Form::close() }}
</div>
</div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js_role')

{{ HTML::script('assets/plugins/jquery.validate.min.js'); }}

<script type="text/javascript">
    $(document).ready(function() {

        $("#form_add_rol").validate({

        });
        $("#form_add_rol input,#form_add_rol textarea").keyup(function(){
                    if($("#form_add_rol").valid())
                        $('.btn-add').removeClass('disabled')
                    else
                    $('.btn-add').addClass('disabled')
                })
    });
</script>


@stop