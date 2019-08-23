<?php

class DepartamentController extends BaseController {

    public function insert($id_market)
   {
       if(Input::server("REQUEST_METHOD") == "POST")
       {
           $campos = [
               'name'=>Input::get("name"),
               'id_market'=>Input::get("id_market")
           ];
           $reglas = [
               'name'=>'required',
               'id_market'=>'required|integer|exists:tb_market,id_market'
           ];
           $mensajesError = [
               'name'=>'Name is required',
               'id_market'=>'Select an market for the department',
           ];
           $validador = Validator::make($campos, $reglas,$mensajesError);
           if(!$validador->passes())
           {
               return Redirect::back()->withInput()->withErrors($validador);
           }
           else
           {
               $newDepartament = new Departament();
               $newDepartament->name = $campos['name'];
               $newDepartament->id_market = $campos['id_market'];
               if($newDepartament->save())
               {
                   return Redirect::route('departament_list_market',array($newDepartament->id_market));
               }
               else
               {
                   return Redirect::back()->withInput()->withErrors(['error'=>"Error saving departament ".$campos['name'].", try again"]);
               }
           }
       }
       $market = Market::where('id_market','=',$id_market)
           ->where('removed','=',0)
           ->first();
       if($market)
       {
           return View::make("departament.add_departament",array('market'=>$market));
       }
       return Redirect::route("error");

   }

    public function edit($id_departament)
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {
            $campos = [
                'name'=>Input::get("name")
            ];
            $reglas = [
                'name'=>'required'
            ];
            $mensajesError = [
                'name.required'=>'Name is required'
            ];
            $validador = Validator::make($campos, $reglas,$mensajesError);
            if(!$validador->passes())
            {
                return Redirect::back()->withInput()->withErrors($validador);
                //$resp['msg'] = $validarOperador->errors()->all()[0];
            }
            else
            {
                $departament = Departament::where('id_dpto','=',Input::get("id_dpto"))
                    ->where('removed','=',0)
                    ->first();
                if($departament)
                {
                    $departament->name = $campos['name'];
                    if($departament->save())
                    {
                        return Redirect::route('departament_list_market',[$departament->id_market]);
                    }
                    else
                        return Redirect::back()->withInput()->withErrors(['error'=>"Error saving departament ".$campos['name'].", try again"]);
                }
                else
                    return Redirect::route("error");
            }
        }
        $departament = Departament::where('id_dpto','=',$id_departament)
            ->where('removed','=',0)
            ->first();
        if($departament)
        {
            return View::make("departament.edit_departament",array('departament'=>$departament));
        }
        return Redirect::route("error");


    }

    public function list_depart_market($id_market)
    {
        $market = Market::find($id_market);
        return View::make('departament.list_departament',array('market'=>$market));
    }

    public function delete($id_departament)
    {
        $departament = Departament::find($id_departament);
        if($departament)
        {
            $id_market = $departament->id_market;
            $cant = DB::table('tb_evaluation_departament_indicator')
                ->where('id_dpto',"=",$id_departament)
                ->count();
            if($cant>0)
            {
                $departament->removed = 1;
                $departament->save();
            }
            else
            {
                $departament->delete();
            }
            return Redirect::route("departament_list_market",array('id_market'=>$id_market));
        }
        else
        {
            return Redirect::route("error");
        }
    }














}
