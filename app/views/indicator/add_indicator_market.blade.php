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
         <li><a href="{{URL::route('market_list')}}">Market</a></li>
         <li><a href="{{URL::route("indicator_list_market",[$market->id_market])}}">Indicators</a></li>
         <li><a href="#">New</a></li>
     </ul>
</div>
<div class="panel-body">
<div class="row">
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
<div class=" col-xs-12 col-lg-12 col-sm-12">
    {{ Form::open(array('url' => URL::route("indicator_market_add",[$market->id_market]),'method'=>"post",'id'=>"form_add_indicator",'action'=>"validators.html",'class'=>"form-horizontal")) }}
        <div class="clearfix"></div>
        <div class="row">
            <fieldset class="col-md-12">

                    <div class="form-group">

                           <label class="col-md-3 col-lg-2 control-label" >Market <span class="text-danger"> *</span></label>
                           <div class="col-sm-12 col-md-8">
                                     <input type="text" class="form-control" required="required"  maxlength="50" name="market" id="market" value="{{$market->num_market}}" DISABLED/>
                                     <input type="hidden" name="id_market" value="{{$market->id_market}}" id="id_market"/>
                           </div>
                    </div>
                    <div class="form-group">

                        <label class="col-md-3 col-lg-2 control-label">Name<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
{{--
                            <input type="text" class="form-control" required="required"  placeholder="Name"  name="name" id="name" maxlength="50"/>
--}}
                        <select class="form-control input-sm" ><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>
                        </div>
                    </div>
                      <div class="form-group">
                                            <label class="col-md-3 col-lg-2 control-label" >Description</label>
                                            <div class="col-sm-12 col-md-8">
                                                <textarea id="description"   class="form-control" placeholder="Description"
                                                          cols="50" rows="3" name="description"></textarea>
                                            </div>
                                    </div>
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="text-danger">*</span> - Required field
                    </div>

            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>
                <div class=" col-xs-6  col-md-offset-6 col-md-3">
                    <button type="submit"  class="col-xs-12  btn btn-primary">
                     <i class="fa fa-check fa-fw"></i>
                    Save</button>
                </div>
                <div class=" col-xs-6 col-md-3">
                    <a href="{{URL::route("indicator_list_market",[$market->id_market])}}" class="col-xs-12 btn btn-default">
                    <i class="fa fa fa-times fa-fw"></i>
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