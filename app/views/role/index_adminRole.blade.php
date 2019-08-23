@extends('layouts.index')

@section('title')
| Role
@stop

@section('css')
  @yield('css_role')
@stop

@section('activeAdministration')class="selected"@stop

@section('marco_contenido')
            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header hidden-xs">Role management
                        @yield('marco_botones')
                    </h2>
                </div>
                <!--end page header -->
            </div>

            @yield('marco_contenido_role')
@stop


@section('js')


 @yield('js_role')
@stop