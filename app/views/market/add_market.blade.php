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
                 <li><a href="#">New</a></li>
             </ul>
</div>
<div class="panel-body">

<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
    {{ Form::open(array('url' => URL::route("market_add"),'method'=>"post",'id'=>"form_add_market",'action'=>"validators.html",'class'=>"form-horizontal")) }}
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

                    <div class="form-group col-xs-12">

                                        <label class=" col-md-3 col-lg-2 control-label" >Group store<span class="text-danger"> *</span> </label>
                                        <div class="col-sm-12 col-md-8">
                                            <select class="form-control chosen-select" required="required" name="group_type" id="group_type">
                                                <option value="">Please select...</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                    </div>
                    <div class="form-group col-xs-12">
     {{--                   <div class="bg-danger" >{{$errors->first('num_market')}}</div>--}}
                        <label class=" col-md-3 col-lg-2 control-label">Store number<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" required="required"  placeholder="Store number"   maxlength="50" id="num_market" name="num_market"/>
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label class=" col-md-3 col-lg-2 control-label" >Address </label>
                        <div class="col-sm-12 col-md-8">
                            <textarea id="address"   class="form-control" placeholder="Address"
                                      cols="50" rows="5" name="address" ></textarea>
                        </div>
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="text-danger">*</span> - Required field
                    </div>
                </div>
            </fieldset>
            <fieldset class="col-sm-12 ">
                <legend></legend>
                <div class=" col-xs-6 col-sm-offset-6 col-sm-3">
                    <button type="submit"  class="col-xs-12  btn btn-primary disabled btn-add"><i class="fa fa-check fa-fw"></i>Save</button>
                </div>
                <div class=" col-xs-6 col-sm-3">
                    <a href="{{URL::route('market_list')}}" class="col-xs-12 btn btn-default"><i class="fa fa fa-times fa-fw"></i>Cancel</a>
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

@section('js_market')
{{ HTML::script('assets/plugins/jquery.validate.min.js'); }}

<script type="text/javascript">
    $(document).ready(function() {

        $("#form_add_market").validate({
            rules: {
                group_type: { required: true, rangelength: [1,1]},
                num_market: { required: true}
            },
            messages: {
                group_type: "Select a group for the store",
                num_market: "Store number is requiered"
            }
        });
         $("#form_add_market input,#form_add_market textarea").keyup(function(){
                                    if($("#form_add_market").valid())
                                        $('.btn-add').removeClass('disabled');
                                    else
                                    $('.btn-add').addClass('disabled')
                                });
                $("#form_add_market select").change(function(){
                    if($("#form_add_market").valid())
                        $('.btn-add').removeClass('disabled');
                    else
                    $('.btn-add').addClass('disabled')
                })
    });
</script>

@stop