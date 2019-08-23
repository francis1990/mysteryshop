@extends('role.index_adminRole')

@section('css_role')
 {{ HTML::style('assets/plugins/dataTables/dataTables.bootstrap.css'); }}
@stop
@section('marco_botones')
    <span  class="hidden-xs"><a title="New role" href="{{URL::route('role_add')}}" class="pull-right btn btn-primary"><i class="fa fa-plus fa-fw"></i><span class="hidden-sm">New role</span></a></span>
@stop
@section('marco_contenido_role')


<?php
//print_r($allRoles);die;
?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             <ul class="breadcrumb mapa-options" >
                               <li><a href="{{URL::route('index')}}">Home</a></li>
                                   <li><a href="#">Roles list</a></li>
                               </ul>
                               <div id="option-xs" class="visible-xs pull-right">
                                  <div class="btn-group">
                                      <a href="#" class="btn  btn-primary  btn-sm dropdown-toggle" data-toggle="dropdown">
                                          <i class="fa fa-cog fa-1x"></i>
                                          <span class="caret"></span>
                                      </a>
                                      <ul class="dropdown-menu pull-right" role="menu">
                                          <li><a href="{{URL::route('role_add')}}">New role</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                        </div>
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Role</th>
                                            <th class="hidden-xs" style="width:160px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($allRoles as $role)
                                        <tr class="" data-val="{{$role->id_role}}">
                                            <td>
                                            {{$role->type}}
                                            <div id="" class="pull-right hidden visible-xs btn-flotantes">
                                                <span  class="">
                                                    <a href="#" title="Edit" class=" link-icon">
                                                    <i class="fa fa-edit fa-fw"></i></a>
                                                    </span>
                                                    <span  class="">
                                                    <a href="{{URL::to('role/show/'.$role->id_role)}}" title="Show" class="  link-icon">
                                                    <i class=" fa fa-eye fa-fw"></i></a>
                                                    </span>
                                                    <span  class="">
                                                    <a href="#deleteModal" data-toggle="modal" data-url="{{URL::to('role/delete/'.$role->id_role)}}" title="Delete" class=" link-icon btn-delete">
                                                    <i class="fa fa-trash-o fa-fw"></i></a>
                                                    </span>
                                            </div>
                                            </td>
                                            <td class="center hidden-xs">
											<span  class="">
       										<a href="#" title="Edit" class=" link-icon">
                                            <i class="fa fa-edit fa-fw"></i></a>
											</span>
											<span  class="">
											<a href="{{URL::to('role/show/'.$role->id_role)}}" title="Show" class="  link-icon">
											<i class=" fa fa-eye fa-fw"></i></a>
											</span>
											<span  class="">
       										<a href="#deleteModal" data-toggle="modal" data-url="{{URL::to('role/delete/'.$role->id_role)}}" title="Delete" class=" link-icon btn-delete">
                                            <i class="fa fa-trash-o fa-fw"></i></a>
											</span>
											</td>
                                        </tr>

                                        @endforeach
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
                                            <button type="button"  class="btn-cancel-modal btn btn-default" data-dismiss="modal"><i class="fa fa fa-times fa-fw"></i>Cancel</button>
                                            <a href="#" {{--id="btn_del_ok"--}} class="btn-del-modal btn btn-primary"><i class="fa fa-check fa-fw"></i>Yes</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
@stop
@section('js_role')
{{ HTML::script('assets/plugins/dataTables/jquery.dataTables.js'); }}
{{ HTML::script('assets/plugins/dataTables/dataTables.bootstrap.js'); }}
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop