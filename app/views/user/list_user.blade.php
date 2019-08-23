@extends('user.index_adminUser')
@section('css_user')
{{ HTML::style('assets/plugins/dataTables/dataTables.bootstrap.css'); }}
@stop
@section('marco_botones')
<span  class=""><a href="{{URL::route('users_add')}}" class="pull-right btn btn-primary"><i class="fa fa-plus fa-fw"></i>New User</a></span>
@stop
@section('marco_contenido_user')
<div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <ul class="breadcrumb mapa-options" >
                                                          <li><a href="{{URL::route('index')}}">Home</a></li>
                                                              <li><a href="#">Users list</a></li>
                                                          </ul>
                             <div id="option-xs" class="visible-xs pull-right">
                                   <div class="btn-group">
                                       <a href="#" class="btn  btn-primary btn-sm dropdown-toggle " data-toggle="dropdown">
                                           <i class="fa fa-cog fa-1x"></i>
                                            <span class="caret"></span>
                                       </a>
                                       <ul class="dropdown-menu pull-right" role="menu">
                                           <li><a href="{{URL::route('users_add')}}">New user</a>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                        </div>
                        <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Role</th>
                                            <th class="hidden-xs hidden-sm hidden-md" style="width: 20%">Name</th>
                                            <th class="hidden-xs hidden-sm">Email</th>
											<th class="hidden-xs" style="width:130px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($allUser as $user)
                                        <tr class="">
                                            <td>{{$user->user}}</td>
                                            <td>{{$user->role->type}}
                                             <div id="" class="pull-right hidden visible-xs btn-flotantes">
                                                <span  class="">
                                                    <a href="{{URL::route("users_edit",[$user->id_user])}}" title="Edit" class=" link-icon">
                                                    <i class="fa fa-edit fa-fw"></i></a>
                                                </span>
                                                <span  class="">
                                                    <a href="{{URL::to('users/show/'.$user->id_user)}}" title="Show" class="  link-icon">
                                                    <i class=" fa fa-eye fa-fw"></i></a>
                                                </span>
                                                <span  class="">
                                                    <a href="#deleteModal" data-toggle="modal" data-url="{{URL::to('users/delete/'.$user->id_user)}}" title="Delete" class=" link-icon btn-delete">
                                                    <i class="fa fa-trash-o fa-fw"></i></a>
                                                </span>
                                              </div>
                                            </td>
                                            <td class="hidden-xs hidden-sm hidden-md">{{$user->name." ".$user->surname}}</td>
                                            <td class="hidden-xs hidden-sm">{{$user->email}}</td>
                                            <td class="hidden-xs center" >
											<span  class="">
       										<a href="{{URL::route("users_edit",[$user->id_user])}}" title="Edit" class=" link-icon">
                                            <i class="fa fa-edit fa-fw"></i></a>
											</span>
											<span  class="">
											<a href="{{URL::to('users/show/'.$user->id_user)}}" title="Show" class="  link-icon">
											<i class=" fa fa-eye fa-fw"></i></a>
											</span>
											<span  class="">
       										<a href="#deleteModal" data-toggle="modal" data-url="{{URL::to('users/delete/'.$user->id_user)}}" title="Delete" class=" link-icon btn-delete">
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
                                            <a href="#" id="btn_del_ok" class="btn-del-modal btn btn-primary"><i class="fa fa-check fa-fw"></i>Yes</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
@stop
@section('js_user')
    {{ HTML::script('assets/plugins/dataTables/jquery.dataTables.js'); }}
    {{ HTML::script('assets/plugins/dataTables/dataTables.bootstrap.js'); }}
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop