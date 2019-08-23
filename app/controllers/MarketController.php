<?php

class MarketController extends BaseController {

    public function insert()
   {
       if(Input::server("REQUEST_METHOD") == "POST")
       {
           $campos = [
               'num_market'=>Input::get("num_market"),
               'group_type'=>Input::get("group_type"),
               'address'=>Input::get("address")
           ];
           $reglas = [
               'num_market'=>'required|unique:tb_market,num_market',
               'group_type'=>'required'
           ];
           $mensajesError = [
               'num_market.required'=>'Market number is required',
               'num_market.unique'=>'Market number '.$campos['num_market'].' already exists in the Database',
               'group_type.required'=>'Group is required'
           ];
           $validador = Validator::make($campos, $reglas,$mensajesError);
           if(!$validador->passes())
           {
               return Redirect::back()->withInput()->withErrors($validador);
               //$resp['msg'] = $validarOperador->errors()->all()[0];
           }
           else
           {
               $newMarket = new Market();
               $newMarket->num_market = $campos['num_market'];
               $newMarket->group_type = $campos['group_type'];
               if(!empty($campos['address']))
               {
                   $newMarket->address = $campos['address'];
               }
               if($newMarket->save())
               {
                   $this->crearDeptManager($newMarket->id_market);
                   return Redirect::route('market_list');
               }
               else
               {
                   return Redirect::back()->withInput()->withErrors(['inValidos'=>"Error saving market ".$campos['num_market'].", try again"]);
               }
           }
       }
       return View::make("market.add_market");
   }

    public function to_list()
    {
        $allMarkets = Market::where('removed','=',0)
            ->get();
        return View::make('market.list_market',array('allMarkets'=>$allMarkets));
    }

    public function show($id_market)
    {
      $market = Market::find($id_market);
      return View::make('market.show_marketF',array('market'=>$market));
    }

    public function edit()
    {
        $campos = [
            'num_market'=>Input::get("num_market"),
            'group_type'=>Input::get("group_type"),
            'address'=>Input::get("address"),
            'id_market'=>Input::get("id_market")
        ];
        $reglas = [
            'num_market'=>'required',
            'group_type'=>'required',
            'id_market'=>'exists:tb_market,id_market'
        ];
        $mensajesError = [
            'num_market.required'=>'Market number is required',
            'num_market.unique'=>'Market number '.$campos['num_market'].' already exists in the Database',
            'group_type.required'=>'Group is required',
            'id_market.requiered'=>'Error editing the market',
            'id_market.exists'=>'Error editing the market'
        ];
        $validador = Validator::make($campos, $reglas,$mensajesError);
        if(!$validador->passes())
        {
            return Redirect::back()->withInput()->withErrors($validador);
            //$resp['msg'] = $validarOperador->errors()->all()[0];
        }
        else
        {
            $market = Market::find($campos['id_market']);
            if(!Market::where('num_market', '=', $campos['num_market'])
                ->where('id_market', '<>', $campos['id_market'])
                ->first())
            {
                $market->num_market = $campos['num_market'];
                $market->group_type = $campos['group_type'];
                if(!empty($campos['address']))
                {
                    $market->address = $campos['address'];
                }
                if($market->save())
                {
                    return Redirect::route('market_list');
                }
                else
                {
                    return Redirect::back()->withInput()->withErrors(['inValidos'=>"Error saving market ".$campos['num_market'].", try again",'market'=>$market]);
                }
            }
            else
                return Redirect::back()->withInput()->withErrors(['inValidos'=>"Error saving market ".$campos['num_market'].", try again",'market'=>$market,'num_market'=>"The market number already exists in the database"]);

        }
    }

    public function delete($id_market)
    {
            $market = Market::find($id_market);
            if($market)
            {
                $cant = DB::table('tb_evaluation_market_indicator')
                    ->where('id_market',"=",$id_market)
                    ->count();
                if($cant>0)
                {
                    $market->removed = 1;
                }
                else
                {
                    $departamentos = DB::table('tb_departament')
                        ->join('tb_evaluation_departament_indicator', 'tb_evaluation_departament_indicator.id_dpto', '=', 'tb_departament.id_dpto')
                        ->where('tb_departament.id_market',"=",$id_market)
                        ->first();
                    if($departamentos)
                    {
                        $market->removed = 1;
                        //echo "tienes departametos con evaluacuines";die;
                    }
                    else
                    {
                        $market->delete();
                        return Redirect::route("market_list");
                    }
                }
                $market->save();
                return Redirect::route("market_list");
            }
            else
            {
                return Redirect::route("error");
            }
    }

    private function crearDeptManager($id_market)
    {
        $newDepartament = new Departament();
        $newDepartament->name = "Manager";
        $newDepartament->id_market = $id_market;
        $newDepartament->save();
    }












}
