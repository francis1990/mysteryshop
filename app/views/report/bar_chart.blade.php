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
                  <div class="panel-body">
                                            <div id="morris-bar-chart"></div>
                                        </div>

                </div>

            </div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js')
{{ HTML::script('assets/proyecto/js/charts.js'); }}


@stop