@extends('layouts.index')

@section('title')
| Evaluation
@stop

@section('css')

  @yield('css_evaluation')
@stop

@section('activeEvaluation')class="selected"@stop

@section('marco_contenido')

            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header">
                    Evaluation
                      @yield('marco_botones')
                    </h2>

                </div>
                <!--end page header -->
            </div>
            @yield('marco_contenido_evaluation')
@stop


@section('js')

 @yield('js_evaluation')
@stop