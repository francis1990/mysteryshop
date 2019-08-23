<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MysteryShop | Login</title>
    <!-- Core CSS - Include with every page -->


    {{ HTML::style('assets/plugins/bootstrap/bootstrap.css'); }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.css'); }}
    {{ HTML::style('assets/plugins/pace/pace-theme-big-counter.css'); }}
    {{ HTML::style('assets/css/style.css'); }}
    {{ HTML::style('assets/css/main-style.css'); }}
    {{ HTML::style('assets/proyecto/css/mysteryshop.css'); }}


<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/proyecto/img/logoico.ico')}}" />
</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin " style="font-weight:bold; color: #FFFFff;  font-size: 28px;
            text-shadow: 1px 3px rgba(0, 0, 0, 0.075);">
                 Mystery<span style="color: #a7dd2a;">Shop</span>
                                  <img src="{{ asset('assets/proyecto/img/logo_ico.png')}}" alt="" />

                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
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
              {{--   <div class="bg-danger" >{{$errors->first('inValidos')}}</div>--}}
                    <div class="panel-body">
                    {{ Form::open(array('url' => URL::route("showlogin"),'method'=>"post",'id'=>"form_login")) }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user" id="user" autofocus>
                                 {{--   <div class="bg-danger" >{{$errors->first('user')}}</div>--}}
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                  {{--  <div class="bg-danger" >{{$errors->first('password')}}</div>--}}
                                </div>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <!--<input type="button" value="Login" onClick="Validar(this.form)" class="btn btn-lg btn-success btn-block" id="btn_login">-->
                                <input type="submit" value="Login"  class="btn btn-lg btn-success btn-block" id="btn_login">
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    {{ HTML::script('assets/plugins/jquery-1.10.2.js'); }}
    {{ HTML::script('assets/plugins/jquery.validate.min.js'); }}
    {{ HTML::script('assets/plugins/bootstrap/bootstrap.min.js'); }}
    {{ HTML::script('assets/plugins/metisMenu/jquery.metisMenu.js'); }}
    {{--{{ HTML::script('assets/proyecto/login/js/validacion_login.js'); }}--}}
    <script type="text/javascript">
    $(document).ready(function() {

        $("#form_login").validate({
            rules: {
                user: {required: true},
                password: { required: true, minlength: 8}
            },
            messages: {
                user: { required: "Please enter your username"},
                password: "The password must be at least 8 letters"
            }
        });
    });
    </script>



</body>

</html>
