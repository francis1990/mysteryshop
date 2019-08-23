@extends('layouts.index')

@section('title')
| Users
@stop

@section('css')


  @yield('css_user')
@stop

@section('activeAdministration')class="selected"@stop

@section('marco_contenido')

            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header hidden-xs">
                    User administration
                     @yield('marco_botones')


                    </h2>
                </div>
                <!--end page header -->
            </div>

            @yield('marco_contenido_user')
@stop


@section('js')


 @yield('js_user')
@stop