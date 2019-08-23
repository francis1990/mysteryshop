@extends('layouts.index')

@section('title')
| Market
@stop

@section('css')


  @yield('css_market')
@stop

@section('activeMarket')class="selected"@stop

@section('marco_contenido')

            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header hidden-xs">
                    Store management
                      @yield('marco_botones')
                    </h2>
                </div>
                <!--end page header -->
            </div>
            @yield('marco_contenido_market')
@stop


@section('js')


 @yield('js_market')
@stop