<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MysteryShop @yield('title')</title>
    @yield('head')
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Core CSS - Include with every page -->
             {{ HTML::style('assets/plugins/bootstrap/bootstrap.css'); }}
             {{ HTML::style('assets/font-awesome/css/font-awesome.css'); }}
             {{ HTML::style('assets/plugins/pace/pace-theme-big-counter.css'); }}
             {{ HTML::style('assets/plugins/datepicker/bootstrap-datepicker.css'); }}
             {{ HTML::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); }}
             {{ HTML::style('assets/plugins/chosen/chosen.css'); }}
             {{ HTML::style('assets/css/style.css'); }}
             {{ HTML::style('assets/css/main-style.css'); }}
             {{ HTML::style('assets/plugins/morris/morris-0.4.3.min.css'); }}
             {{ HTML::style('assets/plugins/complete/awesomplete.css'); }}

             {{ HTML::style('assets/proyecto/css/mysteryshop.css'); }}

           @yield('css')
             <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/proyecto/img/logoico.ico')}}" />
</head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::route("index")}}" style="font-weight:bold; color: #FFFFff;  font-size: 24px; text-shadow: 1px 3px rgba(0, 0, 0, 0.075); ">
               Mystery<span style="color: #86dd0d;font-size: 22px">Shop</span>
                    <img src="{{ asset('assets/proyecto/img/logo_ico.png')}}" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- Menu Horizontal -->

            <ul class="nav navbar-top-links navbar-right tooltip-demo">
                <!-- main dropdown -->
                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                                    </a>
                                    <!-- dropdown alerts-->
                                    <ul class="dropdown-menu dropdown-alerts">
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-comment fa-fw"></i>New Comment
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-envelope fa-fw"></i>Message Sent
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-tasks fa-fw"></i>New Task
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <div>
                                                    <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="text-center" href="#">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- end dropdown-alerts -->
                                </li>
                <li class="dropdown" title="Stores Evaluation" data-placement="left" data-toggle="tooltip">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger"></span><i class="fa fa-list-alt fa-3x"></i><i class="fa fa-shopping-cart fa-1x"></i>
                    </a>
                    <!-- Menu de Horizontal -->
                    <ul class="dropdown-menu">
                        <?php
                             $globalAllMarket = Market::where('removed','=',0)->get();
                            ?>
                        @foreach($globalAllMarket as $globalMarket)
                        <li>
                            <a href="{{URL::route("evaluation_market_show",[$globalMarket->id_market])}}">
                                <div>
                                    <strong><span class=" label label-danger">Store: {{$globalMarket->num_market}}</span></strong>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach

                    </ul>
                    <!-- end dropdown-messages -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>-->

                        <li><a href="#setPasword" class="btn-setpwd" data-toggle="modal"><i class="fa fa-key fa-fw"></i>Set password</a>
                        </li>
                        <li><a href="{{URL::route('logout')}}"><i class="fa fa-user fa-fw"></i>Profile</a>
                        </li>
                         <li class="divider"></li>
                        <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
          @yield('left-side')

        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper" class="left-side-expand">
            @yield('marco_contenido')
            @yield('modal')
             <div style="display: none;" class="modal fade" id="setPasword" tabindex="-1" role="dialog"
                       aria-labelledby="insertModal" aria-hidden="true">
                                           <div class="modal-dialog">
                                           {{ Form::open(array('url' => URL::route("indicator_departament_add"),'method'=>"post",'id'=>"form_set_password",'class'=>"form-horizontal")) }}
                                               <div class="modal-content">
                                               <div class="modal-header"><h4>Set password</h4></div>
                                                   <div class="modal-body">

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
                        <label class="col-md-4 col-lg-4 control-label">New Password<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="password" class="form-control" required="required"  placeholder="Password" id="password" maxlength="50" name="password"/>
                        </div>
                    </div>
					<div class="form-group col-xs-12">
                        <label class="col-md-4 col-lg-4 control-label">Password repeat<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="password" class="form-control" required="required"  placeholder="Password repeat" id="repeat_password" name="repeat_password" maxlength="50"/>
                        </div>
                    </div>
            </fieldset>
        </div>
        <input name="flash_messages" value="1" type="hidden">
        <div class="row">
            <div class="col-md-12 form-error-container"></div>
        </div>
           </div>
           <div class="modal-footer">
                 <button  id="cancel-form"  class=" btn btn-default"
                  data-dismiss="modal"><i class="fa fa-times fa-fw"></i>Cancel</button>
                 <button  id="add-form" class="btn-save btn btn-primary disabled"><i class="fa fa-check fa-fw" ></i>Save</button>
             </div>
       </div>
       {{Form::close()}}
             </div>
         </div>
        </div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
        {{ HTML::script('assets/plugins/jquery-1.10.2.js'); }}
        {{ HTML::script('assets/plugins/bootstrap/bootstrap.min.js'); }}
        {{ HTML::script('assets/plugins/chosen/chosen.jquery.min.js'); }}
        {{ HTML::script('assets/plugins/metisMenu/jquery.metisMenu.js'); }}
        {{ HTML::script('assets/plugins/pace/pace.js'); }}
        {{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.min.js'); }}
        {{ HTML::script('assets/scripts/siminta.js'); }}
        {{ HTML::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); }}
        {{ HTML::script('assets/plugins/morris/raphael-2.1.0.min.js'); }}
        {{ HTML::script('assets/plugins/morris/morris.js'); }}
        {{ HTML::script('assets/plugins/complete/awesomplete.js'); }}
        {{ HTML::script('assets/plugins/jquery.validate.min.js'); }}
        {{ HTML::script('assets/proyecto/js/mysteryshop.js'); }}
      <script type="text/javascript">
             jQuery(document).ready(function () {

                 jQuery(".chosen-select").chosen();
                 $.fn.datepicker.defaults.format = "yyyy-mm-dd";
                 $('.js-datepicker').datepicker({

                     onSelect: function(date) {
                         alert(date)
                     },
                   autoclose:true
                  // startDate:'now'
                 });
                //Timepicker
              $(".timepicker").timepicker({
                            showInputs: false,
                            minuteStep: 1
                });
                $('.btn-setpwd').click(function(e){
                   $("#form_set_password").get(0).reset();
                   $('.icon-valid,label.error').remove();
                   $('input').removeClass('error');
                   $('input').removeClass('valid');
                });
                 $("#form_set_password").validate({
                            rules: {
                                password: {required: true, rangelength: [8,50]},
                                repeat_password:{equalTo: "#password"}                                                           },
                            messages: {
                                password: "Password must be between 8 and 50 characters",
                                repeat_password: "Passwords do not match"
                            }
                        });
                        $("#form_set_password input").keyup(function(){
                            if($("#form_set_password").valid())
                                $('.btn-save').removeClass('disabled')
                            else
                            $('.btn-save').addClass('disabled')
                        });

             });
         </script>
        @yield('js')

</body>

</html>
