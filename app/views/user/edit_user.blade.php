@extends('user.index_adminUser')

@section('marco_contenido_user')

<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
     <ul class="breadcrumb">
         <li><a href="{{URL::route('index')}}">Home</a></li>
          <li><a href="{{URL::route('users_list')}}">User</a></li>
          <li><a href="#">Edit</a></li>
      </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12">
    {{ Form::open(array('url' => URL::route("users_edit",[$user->id_user]),'method'=>"post",'id'=>"form_edit_user",'action'=>"validators.html",'class'=>"form-horizontal")) }}
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
                        <label class="col-md-3 col-lg-2 control-label">Name<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" required="required"  placeholder="Name" maxlength="50" name="name" id="name" value="{{$user->name}}"/>
                        </div>
                    </div>
					<div class="form-group col-xs-12">
                        <label class="col-md-3 col-lg-2 control-label">Surname<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" required="required"  placeholder="Surname" name="surname" id="surname" maxlength="50" value="{{$user->surname}}"/>
                        </div>
                    </div>
					<div class="form-group col-xs-12">
                    <label class="col-md-3 col-lg-2 control-label" >Role<span class="text-danger"> *</span> </label>
                    <div class="col-sm-12 col-md-8">
                        <select class="form-control chosen-select" required="required" name="role" id="role">
                            <option value="{{$user->id_role}}">{{$user->role->type}}</option>
                            @foreach($roles as $role)
                              <option value="{{$role->id_role}}">{{$role->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
				<div class="form-group col-xs-12">
				       {{-- <div class="bg-danger" >{{$errors->first('user')}}</div>--}}
                        <label class="col-md-3 col-lg-2 control-label">Username<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" class="form-control" required="required"  placeholder="Username"  name="username" id="username" maxlength="50" value="{{$user->user}}"/>
                        </div>
                    </div>
					<div class="form-group col-xs-12">
					   {{-- <div class="bg-danger" >{{$errors->first('password')}}</div>--}}
                        <label class="col-md-3 col-lg-2 control-label">Password<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="password" class="form-control" required="required"  placeholder="Password" id="password" maxlength="50" name="password" value="nullnull"/>
                        </div>
                    </div>
					<div class="form-group col-xs-12">
                        <label class="col-md-3 col-lg-2 control-label">Password repeat<span class="text-danger"> *</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="password" class="form-control" required="required"  placeholder="Password repeat" id="repeat_password" name="repeat_password" maxlength="50" value="nullnull"/>
                        </div>
                    </div>
                    <div class="form-group col-xs-12">
                        <label class="col-md-3 col-lg-2 control-label" >Email </label>
                        <div class="col-sm-12 col-md-8">
                              <input type="email" class="form-control"   placeholder="Email" id="email" name="email"  maxlength="50" value="{{$user->email}}"/>
                        </div>
                        </div>
                    <div class="form-group col-xs-12">
                    <div class="col-sm-9 col-sm-offset-3">
                       <span class="text-danger">*</span> - Required field
                       </div>
                    </div>
            <input type="hidden" name="id_user" value="{{$user->id_user}}" id="id_user">
            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>
                <div class="  col-xs-6 col-sm-offset-6 col-sm-3">
                    <button type="submit"  class="col-xs-12  btn btn-primary disabled btn-add">
                    <i class="fa fa-check fa-fw"></i>Save
                    </button>
                </div>
                <div class=" col-xs-6 col-sm-3">
                    <a href="{{URL::route('users_list')}}" class="col-xs-12 btn btn-default">
                    <i class="fa fa fa-times fa-fw"></i>Cancel
                    </a>
                </div>
            </fieldset>
        </div>
        <input name="flash_messages" value="1" type="hidden">
        <div class="row">
            <div class="col-md-12 form-error-container"></div>
        </div>
    {{Form::close()}}
</div>
</div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js_user')
{{ HTML::script('assets/plugins/jquery.validate.min.js'); }}
<script type="text/javascript">
    $(document).ready(function() {

        $("#form_edit_user").validate({
            rules: {
                name: { required: true},
                surname: { required: true},
                role: {required: true, min: 1},
                username: {required: true},
                password: {required: true, rangelength: [8,50]},
                repeat_password:{equalTo: "#password"},
                email: {email: true}
            },
            messages: {
                name: "Name is requiered",
                surname: "Surname is requiered",
                role: "Select a role for the user",
                username: "Username is requiered",
                password: "Password must be between 8 and 50 characters",
                repeat_password: "Passwords do not match",
                email: "The email is not valid"
            }
        });
        $("#form_edit_user input").keyup(function(){
                    if($("#form_edit_user").valid())
                        $('.btn-add').removeClass('disabled')
                    else
                    $('.btn-add').addClass('disabled')
                })
                $("#form_edit_user select").change(function(){
                    if($("#form_edit_user").valid())
                        $('.btn-add').removeClass('disabled')
                    else
                    $('.btn-add').addClass('disabled')
                })
    });
</script>
@stop