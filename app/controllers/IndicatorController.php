<?php

class IndicatorController extends BaseController {

    public function indicator_list_departament($id_departament)
    {
        $departament = Departament::where('id_dpto','=',$id_departament)
            ->where('removed','=',0)
            ->first();
        if($departament)
        {
            $indicadoresDepartament = DB::table('tb_indicator_departament')
                ->join('tb_indicator','tb_indicator_departament.id_indicator','=','tb_indicator.id_indicator')
                ->where('tb_indicator_departament.id_departament','=',$id_departament)
                ->where('tb_indicator.removed','=',0)
                ->groupBy('tb_indicator.id_indicator')
                ->get();
            $arrIdIndicadores = [];
            foreach($indicadoresDepartament as $i)
            {
                $arrIdIndicadores[] = $i->id_indicator;
            }
            $listaIndicatorDepartamento = DB::table('tb_indicator_departament')
                ->join('tb_indicator','tb_indicator_departament.id_indicator','=','tb_indicator.id_indicator')
                ->whereNotIn('tb_indicator.id_indicator',  $arrIdIndicadores)
                ->where('tb_indicator.removed','=',0)
                ->groupBy('tb_indicator.id_indicator')
                ->get();
            $arrIndicadores = [];
            foreach($listaIndicatorDepartamento as $indi)
            {
                $arrIndicadores[] = ['id_indicator'=>$indi->id_indicator,'name'=>$indi->name,'description'=>$indi->description];
                $arrIdIndicadores[] = $indi->id_indicator;
            }
            $listaIndicatorMarket = DB::table('tb_indicator_market')
                ->join('tb_indicator','tb_indicator_market.id_indicator','=','tb_indicator.id_indicator')
                ->where('tb_indicator.removed','=',0)
                ->whereNotIn('tb_indicator.id_indicator',  $arrIdIndicadores)
                ->groupBy('tb_indicator.id_indicator')
                ->get();
            foreach($listaIndicatorMarket as $indi)
            {
                $arrIndicadores[] = ['id_indicator'=>$indi->id_indicator,'name'=>$indi->name,'description'=>$indi->description];
            }
            return View::make('indicator.list_indicator_departament',array('departament'=>$departament,'arrIndicadoresResultado'=>$arrIndicadores));
        }
        else
            return Redirect::route("error");
    }

    public function indicator_list_market($id_market)
    {
        $market = Market::where('id_market','=',$id_market)
            ->where('removed','=',0)
            ->first();
        if($market)
        {
            $indicadoresMarket = DB::table('tb_indicator_market')
                ->join('tb_indicator','tb_indicator_market.id_indicator','=','tb_indicator.id_indicator')
                ->where('tb_indicator_market.id_market','=',$id_market)
                ->where('tb_indicator.removed','=',0)
                ->groupBy('tb_indicator.id_indicator')
                ->get();
            $arrIdIndicadores = [];
            foreach($indicadoresMarket as $i)
            {
                $arrIdIndicadores[] = $i->id_indicator;
            }
            $listaIndicatorMarket = DB::table('tb_indicator_market')
                ->join('tb_indicator','tb_indicator_market.id_indicator','=','tb_indicator.id_indicator')
                ->where('tb_indicator.removed','=',0)
                ->whereNotIn('tb_indicator.id_indicator',  $arrIdIndicadores)
                ->groupBy('tb_indicator.id_indicator')
                ->get();
            /*echo "<pre>";
            print_r($listaIndicatorMarket);
            echo "<pre>";die;*/
            $arrIndicadores = [];
            foreach($listaIndicatorMarket as $indi)
            {
                $arrIndicadores[] = ['id_indicator'=>$indi->id_indicator,'name'=>$indi->name,'description'=>$indi->description];
                $arrIdIndicadores[] = $indi->id_indicator;
            }
            $listaIndicatorDepartamento = DB::table('tb_indicator_departament')
                ->join('tb_indicator','tb_indicator_departament.id_indicator','=','tb_indicator.id_indicator')
                ->whereNotIn('tb_indicator.id_indicator',  $arrIdIndicadores)
                ->where('tb_indicator.removed','=',0)
                ->groupBy('tb_indicator.id_indicator')
                ->get();
            foreach($listaIndicatorDepartamento as $indi)
            {
                $arrIndicadores[] = ['id_indicator'=>$indi->id_indicator,'name'=>$indi->name,'description'=>$indi->description];
            }
            return View::make('indicator.list_indicator_market',array('market'=>$market,'arrIndicadoresResultado'=>$arrIndicadores));
        }
        else
            return Redirect::route("error");
    }

    public function insert_Endepartament()
   {
       if(Input::server("REQUEST_METHOD") == "POST")
       {
           if(Input::get("optionsRadios")=="new")
           {
               $campos = [
                   'name'=>Input::get("name"),
                   'id_dpto'=>Input::get("id_dpto"),
                   'values'=>Input::get("values"),
                   'pos'=>Input::get("position")
               ];
               $reglas = [
                   'name'=>'required',
                   'id_dpto'=>'required|integer|exists:tb_departament,id_dpto',
                   'values'=>'required',
                   'pos'=>'integer'
               ];
               $mensajesError = [
                   'name'=>'Name is required',
                   'id_dpto'=>'The departament is not valid',
                   'values'=>'The format of the values is incorrect',
                   'pos'=>'The position must be a number for the order'
               ];
               $validador = Validator::make($campos, $reglas,$mensajesError);
               if(!$validador->passes())
               {
                   return Redirect::back()->withInput()->withErrors($validador);
               }
               else
               {
                   $val = explode(",",Input::get("values"));
                   foreach($val as $v)
                   {
                       if(!is_numeric($v))
                       {
                           return Redirect::back()->withInput()->withErrors(['inValidos'=>"The format of the values is incorrect"]);
                       }
                   }
                   $newIndicator = new Indicator();
                   $newIndicator->name = $campos['name'];
                   $newIndicator->description = Input::get("description");
                   $newIndicator->default_values = $campos['values'];
                   //$newIndicator->default_values = $campos['values'];
                   $newIndicator->ismarket = 0;
                   if($newIndicator->save())
                   {
                       $newIndicator->departments()->attach($campos['id_dpto']);
                       DB::table('tb_indicator_departament')->where('id_indicator','=',$newIndicator->id_indicator)
                           ->where('id_departament','=',$campos['id_dpto'])
                           ->update(array('order_position'=>$campos['pos']));
                       return Redirect::route('indicator_list_departament',[$campos['id_dpto']]);
                   }
                   else
                   {
                       return Redirect::back()->withInput()->withErrors(['error'=>"Error saving indicator ".$campos['name'].", try again"]);
                   }
               }
           }
           else if(Input::get("optionsRadios")=="exist")
           {
               //print_r(Input::get("existentes"));die;
               $campos = [
                   'id_dpto'=>Input::get("id_dpto")
               ];
               $reglas = [
                   'id_dpto'=>'required|integer|exists:tb_departament,id_dpto'
               ];
               $mensajesError = [
                   'id_dpto'=>'The departament is not valid',
               ];
               $validador = Validator::make($campos, $reglas,$mensajesError);
               if(!$validador->passes())
               {
                   return Redirect::back()->withInput()->withErrors($validador);
               }
               else
               {
                   $ids_indicator = Input::get("existentes");
                   foreach($ids_indicator as $i)
                   {
                       DB::table('tb_indicator_departament')->insert([
                           'id_indicator'=>$i,
                           'id_departament'=>$campos['id_dpto']
                       ]);
                   }
                   return Redirect::route('indicator_list_departament',[$campos['id_dpto']]);
               }
           }
       }
       return Redirect::route("error");
   }

    public function insert_Enmarket()
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {
            if(Input::get("optionsRadios")=="new")
            {
                $campos = [
                    'name'=>Input::get("name"),
                    'id_market'=>Input::get("id_market"),
                    'values'=>Input::get("values"),
                    'pos'=>Input::get("position")
                ];
                $reglas = [
                    'name'=>'required',
                    'id_market'=>'required|integer|exists:tb_market,id_market',
                    'values'=>'required',
                    'pos'=>'required|integer'
                ];
                $mensajesError = [
                    'name'=>'Name is required',
                    'id_market'=>'The market is not valid',
                    'values'=>'The format of the values is incorrect',
                    'pos'=>'The position must be a number for the order'
                ];
                $validador = Validator::make($campos, $reglas,$mensajesError);
                if(!$validador->passes())
                {
                    return Redirect::back()->withInput()->withErrors($validador);
                }
                else
                {
                    $val = explode(",",Input::get("values"));
                    foreach($val as $v)
                    {
                        if(!is_numeric($v))
                        {
                            return Redirect::back()->withInput()->withErrors(['inValidos'=>"The format of the values is incorrect"]);
                        }
                    }
                    $newIndicator = new Indicator();
                    $newIndicator->name = $campos['name'];
                    $newIndicator->description = Input::get("description");
                    $newIndicator->default_values = $campos['values'];
                    $newIndicator->ismarket = 1;
                    if($newIndicator->save())
                    {
                        $newIndicator->markets()->attach($campos['id_market']);
                        DB::table('tb_indicator_market')->where('id_indicator','=',$newIndicator->id_indicator)
                            ->where('id_market','=',$campos['id_market'])
                            ->update(array('order_position'=>$campos['pos']));
                        return Redirect::route('indicator_list_market',[$campos['id_market']]);
                    }
                    else
                    {
                        return Redirect::back()->withInput()->withErrors(['error'=>"Error saving indicator ".$campos['name'].", try again"]);
                    }
                }
            }
            else if(Input::get("optionsRadios")=="exist")
            {
                $campos = [
                    'id_market'=>Input::get("id_market")
                ];
                $reglas = [
                    'id_market'=>'required|integer|exists:tb_market,id_market'
                ];
                $mensajesError = [
                    'id_market'=>'The market is not valid',
                ];
                $validador = Validator::make($campos, $reglas,$mensajesError);
                if(!$validador->passes())
                {
                    return Redirect::back()->withInput()->withErrors($validador);
                }
                else
                {
                    $ids_indicator = Input::get("existentes");
                    foreach($ids_indicator as $i)
                    {
                        DB::table('tb_indicator_market')->insert([
                            'id_indicator'=>$i,
                            'id_market'=>$campos['id_market']
                        ]);
                    }
                    return Redirect::route('indicator_list_market',[$campos['id_market']]);
                }
            }
        }
        return Redirect::route("error");
    }

    public function delete($id_indicator,$type,$id_type)
    {
        $indicator = Indicator::find($id_indicator);
        if($indicator)
        {
            switch ($type)
            {
                case "market":
                    DB::table('tb_indicator_market')
                        ->where('id_market', '=', $id_type)
                        ->where('id_indicator', '=', $id_indicator)
                        ->delete();
                    break;
                case "departament":
                    DB::table('tb_indicator_departament')
                        ->where('id_departament', '=', $id_type)
                        ->where('id_indicator', '=', $id_indicator)
                        ->delete();
                    break;
            }
            $cantEvalDep = DB::table('tb_evaluation_departament_indicator')
                ->where('id_indicator',"=",$id_indicator)
                ->count();
            $cantEvalMarket = DB::table('tb_evaluation_market_indicator')
                ->where('id_indicator',"=",$id_indicator)
                ->count();
            if(count($indicator->departments)==0 && count($indicator->markets)==0)
            {
                if($cantEvalDep>0 || $cantEvalMarket>0)
                {
                    $indicator->removed = 1;
                    $indicator->save();
                }
                else
                {
                    $indicator->delete();
                }
            }
            switch ($type)
            {
                case "market":
                    return Redirect::route("indicator_list_market",[$id_type]);
                    break;
                case "departament":
                    return Redirect::route("indicator_list_departament",[$id_type]);
                    break;
            }
        }
        else
        {
            return Redirect::route("error");
        }
    }

    public function show_insert($id_departament)
    {
        $departament = Departament::find($id_departament);
        return View::make("indicator.add_departament",array('departament'=>$departament));
    }

    public function show($id_market)
    {
      $market = Market::find($id_market);
      return View::make('market.show_marketF',array('market'=>$market));
    }

    public function edit($id_indicator,$type,$id_type)
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {
            $campos = [
                'name'=>Input::get("name"),
                'values'=>Input::get("values"),
                'position'=>Input::get("position"),
                'description'=>Input::get("description")
            ];
            $reglas = [
                'name'=>'required',
                'values'=>'required'
            ];
            $mensajesError = [
                'name.required'=>'The name is required',
                'values.required'=>'The name is required'
            ];
            $validador = Validator::make($campos, $reglas,$mensajesError);
            if(!$validador->passes())
            {
                return Redirect::back()->withInput()->withErrors($validador);
                //$resp['msg'] = $validarOperador->errors()->all()[0];
            }
            else
            {
                $indicator = Indicator::find($id_indicator);
                if($indicator)
                {
                    $indicator->name = $campos['name'];
                    $indicator->description = $campos['description'];
                    $indicator->default_values = $campos['values'];
                    if($indicator->save())
                    {
                        if($type == "dep")
                        {
                            DB::table('tb_indicator_departament')
                                ->where('id_indicator','=',$id_indicator)
                                ->where('id_departament','=',$id_type)
                                ->update(array(
                                    'order_position'=>$campos['position']
                                ));
                            return Redirect::route("indicator_list_departament",[$id_type]);
                        }
                        else if($type == "mark")
                        {
                            DB::table('tb_indicator_market')
                                ->where('id_indicator','=',$id_indicator)
                                ->where('id_market','=',$id_type)
                                ->update(array(
                                    'order_position'=>$campos['position']
                                ));
                            return Redirect::route("indicator_list_market",[$id_type]);
                        }
                    }
                }
            }
        }
        $indicator = Indicator::find($id_indicator);
        if($indicator)
        {
            if($type == "dep")
            {
                $entida = DB::table('tb_indicator_departament')
                    ->where('id_indicator','=',$id_indicator)
                    ->where('id_departament','=',$id_type)
                    ->first();
            }
            else if($type == "mark")
            {
                $entida = DB::table('tb_indicator_market')
                    ->where('id_indicator','=',$id_indicator)
                    ->where('id_market','=',$id_type)
                    ->first();
            }

            return View::make("indicator.edit_indicator",array('indicator'=>$indicator,'type'=>$type,'id_type'=>$id_type,'entida'=>$entida));
        }
        return Redirect::route("error");

    }

















}
