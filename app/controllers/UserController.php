<?php

class UserController extends BaseController {

    public function insert()
   {
       if(Input::server("REQUEST_METHOD") == "POST")
       {
           $campos = [
               'id_role'=>Input::get("role"),
               'user'=>Input::get("username"),
               'name'=>Input::get("name"),
               'surname'=>Input::get("surname"),
               'password'=>Input::get("password"),
               'email'=>Input::get("email")
           ];
           $reglas = [
               'id_role'=>'required|integer',
               'user'=>'required|unique:tb_user,user',
               'password'=>'required|between:8,50',
               'name'=>'required',
               'surname'=>'required',
               'email'=>'email'
           ];
           $mensajesError = [
               'id_role.required'=>'Role is required',
               'id_role.integer'=>'Select a role',
               'user.required'=>'User is required',
               'user.unique'=>'User '.$campos['user'].' already exists in the Database',
               'password.required'=>'Password is required',
               'password.between'=>'Password must be between 7 and 50 characters',
               'name.required'=>'Name is requiered',
               'surname.required'=>'Surname is requiered',
               'email.email'=>'The email is not valid'
           ];
           $validarOperador = Validator::make($campos, $reglas,$mensajesError);
           if(!$validarOperador->passes())
           {
               return Redirect::back()->withInput()->withErrors($validarOperador);
               //$resp['msg'] = $validarOperador->errors()->all()[0];
           }
           else
           {
               $newUser = new User();
               $newUser->id_role = $campos['id_role'];
               $newUser->user = $campos['user'];
               $newUser->name = $campos['name'];
               $newUser->surname = $campos['surname'];
               $newUser->password = Hash::make($campos['password']);
               //$campos['email'] = Input::get("email");
               if(!empty($campos['email']))
               {
                   $newUser->email = $campos['email'];
               }
               //print_r($campos);die;
               if($newUser->save())
               {
                   return Redirect::route('users_list');
               }
               else
               {
                   return Redirect::back()->withInput()->withErrors(['inValidos'=>"Error saving user ".$campos['user'].", try again"]);
               }
           }
       }
       $allRoles = Role::all();
       return View::make("user.add_user",array('allRoles'=>$allRoles));
   }

    public function edit($id_user)
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {
            $user = User::where('id_user','=',Input::get("id_user"))
                ->where('removed','=',0)
                ->first();
            $campos = [
                'id_role'=>Input::get("role"),
                'user'=>Input::get("username"),
                'name'=>Input::get("name"),
                'surname'=>Input::get("surname"),
                'password'=>Input::get("password"),
                'email'=>Input::get("email")
            ];
            $reglas = [
                'id_role'=>'required|integer',
                'user'=>"required|unique:tb_user,user,$id_user,id_user",
                'password'=>'required|between:8,50',
                'name'=>'required',
                'surname'=>'required',
                'email'=>'email'
            ];
            $mensajesError = [
                'id_role.required'=>'Role is required',
                'id_role.integer'=>'Select a role',
                'user.required'=>'User is required',
                'user.unique'=>'User '.$campos['user'].' already exists in the Database',
                'password.required'=>'Password is required',
                'password.between'=>'Password must be between 7 and 50 characters',
                'name.required'=>'Name is requiered',
                'surname.required'=>'Surname is requiered',
                'email.email'=>'The email is not valid'
            ];
            $validador = Validator::make($campos, $reglas,$mensajesError);
            if(!$validador->passes())
            {
                return Redirect::back()->withInput()->withErrors($validador);
            }
            else
            {
                if($user)
                {
                    $user->id_role = $campos['id_role'];
                    $user->user = $campos['user'];
                    $user->name = $campos['name'];
                    $user->surname = $campos['surname'];
                    if ($campos['password'] != "nullnull")
                    {
                        $user->password = Hash::make($campos['password']);
                    }
                    if(!empty($campos['email']))
                    {
                        $user->email = $campos['email'];
                    }
                    if($user->save())
                    {
                        return Redirect::route('users_list');
                    }
                    else
                        return Redirect::back()->withInput()->withErrors(['error'=>"Error saving user ".$campos['user'].", try again"]);
                }
                else
                    return Redirect::route("error");
            }
        }
        $user = User::where('id_user','=',$id_user)
            ->where('removed','=',0)
            ->first();
        if($user)
        {
            $roles = Role::where('id_role','<>',$user->id_role)
                ->get();
            return View::make("user.edit_user",array('user'=>$user,'roles'=>$roles));
        }
        return Redirect::route("error");
    }

    public function to_list()
    {
      if(Auth::user()->get()->role->type == "administrator")
      {
          $allUser = User::where('removed', '=', 0)
              ->get();
      }
      else
      {
          $allUser = User::where('removed', '=', 0)
              ->where('id_role','<>',1)
              ->get();
      }
        return View::make('user.list_user',array('allUser'=>$allUser));
    }

    public function show($id_user)
    {
        $user = User::find($id_user);
        return View::make('user.show_user',array('user'=>$user));
    }

    public function delete($id_user)
    {
        $user = User::find($id_user);
        if(count($user->evaluations)==0)
        {
            if($user->role->type == "administrator" && Auth::user()->get()->role->type <> "administrator")
            {
                return Redirect::route("error");
            }
            else
            {
                $user->delete();
            }
        }
        else
        {
            $user->removed = 1;
            $user->save();
        }
        return Redirect::route('users_list');
    }


}
