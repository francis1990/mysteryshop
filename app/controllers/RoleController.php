<?php

class RoleController extends BaseController {

    public function insert()
   {
       if(Input::server("REQUEST_METHOD") == "POST")
       {
           $campos = [
               'type'=>Input::get("type"),
               'description'=>Input::get("description")
           ];
           $reglas = [
               'type'=>'required|unique:tb_role,type'
           ];
           $mensajesError = [
               'type.required'=>'Name is required',
               'type.unique'=>'Role '.$campos['type'].' already exists in the Database'
           ];
           $validador = Validator::make($campos, $reglas,$mensajesError);
           if(!$validador->passes())
           {
               return Redirect::back()->withInput()->withErrors(['inValidos'=>$validador->errors()->all()[0]]);
               //$resp['msg'] = $validarOperador->errors()->all()[0];
           }
           else
           {
               $newRole = new Role();
               $newRole->type = $campos['type'];
               $campos['description'] = Input::get("description");
               if(!empty($campos['description']))
               {
                   $newRole->description = $campos['description'];
               }
               if($newRole->save())
               {
                   return Redirect::route('role_list');
               }
               else
               {
                   return Redirect::back()->withInput()->withErrors(['inValidos'=>"Error saving role ".$campos['type'].", try again"]);
               }
           }
       }
       return View::make("role.add_role");
   }

    public function to_list()
    {
        $allRoles = Role::all();
        return View::make('role.list_role',array('allRoles'=>$allRoles));
    }

    public function show($id_role)
    {
      $role = Role::find($id_role);
      return View::make('role.show_role',array('role'=>$role));
    }

    public function delete($id_role)
    {
        $role = Role::find($id_role);
        $role->delete();
        return Redirect::route('role_list');
    }










}
