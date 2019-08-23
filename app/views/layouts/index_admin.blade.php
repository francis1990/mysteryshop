@extends('layouts.index')
@section('css')
{{ HTML::style('assets/plugins/dataTables/dataTables.bootstrap.css'); }}
  @yield('css_listar')
@stop

@section('marco_contenido')
         <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h2 class="page-header hidden-xs">
                     @yield('title_window')
                      @yield('marco_botones')
                    </h2>
                </div>
                <!--end page header -->
            </div>
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                              @yield('title_panel')
                             <div id="option-xs" class="visible-xs" style="text-align: right;">
                                 <div class="btn-group">
                                     <a href="#" class="btn  btn-primary   btn-sm dropdown-toggle" data-toggle="dropdown">
                                         <i class="fa fa-cog fa-1x"></i>
                                          <span class="caret"></span>
                                     </a>
                                     @yield('botons_hidden_xs')
                                 </div>
                             </div>
                        </div>
                        <div class="panel-body">

                                <table class=" table table-responsive table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
                                    <thead>
                                        @yield('header_tabla')
                                    </thead>
                                    <tbody>
                                        @yield('body_tabla')
                                    </tbody>
                                </table>


                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
@stop
@section('modal')
            <div style="display: none;" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                              Do you want remove this element?
                            </div>
                            <div class="modal-footer">
                                <button type="button"  class="btn-cancel-modal btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
                                <a href="#" {{--id="btn_del_ok"--}} class="btn-del-modal btn btn-primary" data-dismiss="modal"><i class="fa fa-plus" ></i>Yes</a>
                            </div>
                        </div>
                    </div>
            </div>
@stop
@section('js')
 {{ HTML::script('assets/plugins/dataTables/jquery.dataTables.js'); }}
    {{ HTML::script('assets/plugins/dataTables/dataTables.bootstrap.js'); }}
@yield('js_listar')
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
         $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })
    </script>
@stop