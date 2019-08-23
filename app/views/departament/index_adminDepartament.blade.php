@extends('layouts.index')

@section('title')
| Department
@stop

@section('css')


  @yield('css_departament')
@stop

@section('activeMarket')class="selected"@stop

@section('marco_contenido')

            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header">Department
                    </h2>
                </div>
                <!--end page header -->
            </div>

            @yield('marco_contenido_departament')
@stop


@section('js')


 @yield('js_departament')
@stop