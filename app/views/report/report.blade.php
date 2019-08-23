@extends('layouts.index')
@section('title')
| Report
@stop
@section('css')

@stop
@section('activeReport')class="selected"@stop


@section('marco_contenido')

   <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header hidden-xs">
                  Report management

                    </h2>
                </div>
                <!--end page header -->
            </div>

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
    <ul class="breadcrumb">
                 <li><a href="">Report</a></li>
                 <li><a href="#">Evaluation</a></li>
             </ul>
</div>
<div class="panel-body">

<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">

    {{ Form::open(array('url' => URL::route("report_excel_by_date"),'method'=>"post",'id'=>"form_report_date",'action'=>"validators.html",'class'=>"form-horizontal")) }}

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

                                        <label class=" col-md-3 col-lg-2 control-label" >Group market </label>
                                        <div class="col-sm-12 col-md-8">
                                            <select class="form-control chosen-select" required="required" name="group_type" id="group_type">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                    </div>
                    <div class="form-group col-xs-12">

                        <label class=" col-md-3 col-lg-2 control-label">Date period </label>
                        <div class="col-sm-6 col-md-4">
                            <input type="text" class="form-control js-datepicker" placeholder="Start" name="fechaIni" id="fechaIni"/>
                        </div>
                         <div class="col-sm-6 col-md-4">
                            <input type="text" class="form-control js-datepicker" placeholder="End" name="fechaFin" id="fechaFin"/>
                        </div>
                    </div>

            </fieldset>
            <fieldset class="col-sm-12 ">
                <legend></legend>
                <div class=" col-xs-6 col-sm-offset-6 col-sm-3">
                    <button type="submit"  class="col-xs-12  btn btn-primary"><i class="fa fa-download fa-fw"></i>Export</button>
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

$.validator.addMethod("esvalidointervalofecha", function(value, element){
    fi = value.replace("-", "/").replace("-", "/");
    ff = $('#fechaFin').val().replace("-", "/").replace("-", "/");
    var fechaIni = new Date(fi);
    var fechaFin = new Date(ff);
return fechaIni<=fechaFin;
}, "* End date must be after start date");
    $(document).ready(function() {
        $("#form_report_date").validate({
            rules: {
                group_type: { required: true, rangelength: [1,1]},
                fechaIni: { required: true, date: true,esvalidointervalofecha:true},
                fechaFin: { required: true, date: true}
            },
            messages: {
                group_type: "Select a group for the market",
                fechaIni: "A valid period of time is necessary to generate the report",
                fechaFin: "A valid period of time is necessary to generate the report"
            }
        });
    });
</script>

@stop