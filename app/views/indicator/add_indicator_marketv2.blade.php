@extends('indicator.index_adminIndicator')

@section('css_indicator')
  <style rel="stylesheet">
        select[multiple]{
            padding: 0;
            height: 200px;
            overflow-x: auto;
        }
        select[multiple] option{
            padding: 8px;
        }
        select[multiple] option {
            border-bottom: solid 1px #ddd;
        }
        .form-indi .btn{
            width: 80px;
            margin-top: 15px;
        }
        form .btn {
            min-width: auto !important;
        }
    </style>
@stop


@section('marco_contenido_indicator')

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
    <ul class="breadcrumb">
    <li><a href="{{URL::route('index')}}">Home</a></li>
         <li><a href="">Market</a></li>
         <li><a href="">Indicators</a></li>
         <li><a href="#">New</a></li>
     </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
    <form id="defaultForm" method="post" action="" class="form-horizontal">
        <div class="row">
            <fieldset class="col-md-12">
                <div class="form-group col-xs-12 form-indi hidden">
                        <div class="well well-lg ">
                            <label class="">Options</label>
                            <div class="radio">
                                <label>
                                    <input name="optionsRadios" id="optionsRadios1" value="new" checked="" type="radio">New indicator
                                </label>
                                <div class="form-group new ">
                                    <label class="col-sm-3 control-label">Name<span class="text-danger"> *</span> </label>
                                    <div class="col-sm-7">
                                        <input id="nom_indi" type="text" class="form-control" required="required"  placeholder="Name"   maxlength="50"/>
                                    </div>
                                </div>
                                <div class="form-group new">
                                    <label class="col-sm-3 control-label" >Description</label>
                                    <div class="col-sm-7">
                                        <textarea id="desc_indi"    class="form-control" placeholder="Address"
                                                  cols="50" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="optionsRadios" id="optionsRadios2" value="exist" type="radio">Exist indicators
                                </label>
                                <div class="form-group exist hidden">
                                    <label class="col-sm-3 control-label">Name<span class="text-danger"> *</span> </label>
                                    <div class="col-sm-7">
                                        <select name="editable" multiple="multiple"  id="select_indi" class="form-control col-xs-8">
                                            <option value="1" >1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <a  class="btn btn-primary disabled" href="#" id="add-form"><i class="fa fa-plus" ></i>Add</a>
                                <a class="btn btn-default" href="#" id="cancel-form"><i class="fa fa-times"></i>Cancel</a>
                            </div>
                        </div>
                </div>
                <div class="form-group ">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label" style="text-align: left">Indicators list</label>
                    <div class="col-xs-12 col-sm-8 col-md-9 " style="text-align: right">
                        <a class="btn  btn-sm text-success col-sm-offset-8 "  id="add_ind" href="#"><i class="fa fa-plus fa-fw"></i></a>
                        <a class="btn  btn-sm text-danger disabled" href="#" id="delete-indi"><i class="fa fa-minus fa-fw"></i></a>
                    </div>
                    <div class="col-sm-12">
                        <select name="" multiple="multiple"  id="asoc_indi" class="form-control col-xs-8" >
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>
                <div class=" col-xs-6 col-sm-offset-6 col-sm-2">
                    <button type="submit" id="salvar"  class="col-xs-12  btn btn-primary disabled"><i class="fa fa-check" ></i>Save</button>
                </div>
                <div class=" col-xs-6 col-sm-2">
                    <a href="#" class="col-xs-12 btn btn-default"><i class="fa fa-times"></i>Cancel</a>
                </div>
            </fieldset>
        </div>
        <input name="flash_messages" value="1" type="hidden">
        <div class="row">
            <div class="col-md-12 form-error-container"></div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js_indicator')
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