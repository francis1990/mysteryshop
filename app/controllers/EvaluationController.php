<?php

class EvaluationController extends BaseController {

    public function evaluation_market_show($id_market)
    {
        $market = Market::where('id_market','=',$id_market)
            ->where('removed','=',0)
            ->first();
        if($market)
        {
            return View::make('evaluation.add_evaluation',array('market'=>$market));
        }
        else
            return Redirect::router('error');
    }

    public function insert_evaluation($id_market,$date,$time)
    {
        $newEvaluation = new Evaluation();
        $newEvaluation->date = $date;//date("Y-m-d");
        $hora = explode(":",explode(" ",$time)[0]);
        if(explode(" ",$time)[1] == "PM")
        {
            if((int)$hora[0]+12<=23)
            {
                $hora[0] = (int)$hora[0]+12;
            }
            else
                $hora[0] = "00";
        }
        $hora = $hora[0].":".$hora[1];
        $newEvaluation->time = $hora;//date("H:i");
        $newEvaluation->id_user = Auth::user()->get()->id_user;
        $newEvaluation->id_market = $id_market;
        $newEvaluation->update_date=date("Y-m-d");
        $newEvaluation->update_person=Auth::user()->get()->name." ".Auth::user()->get()->surname;
        if($newEvaluation->save())
        {
            $market = Market::find($id_market);
            $indicatorsMark = DB::table('tb_indicator_market')
                ->join('tb_indicator','tb_indicator_market.id_indicator','=','tb_indicator.id_indicator')
                ->where('tb_indicator_market.id_market','=',$id_market)
                ->groupBy('tb_indicator_market.id_indicator')
                ->orderBy('tb_indicator_market.order_position')
                ->get();
            //$indicatorsMark = $market->indicators;
            $indicatorsMarket = [];
            foreach($indicatorsMark as $indt)
            {
                $indicatorsMarket[]= ['id_indicator'=>$indt->id_indicator,'points'=>0];
            }
            $this->eval_market($newEvaluation->id_evaluation,$id_market,$indicatorsMarket);
            $departamentosMarket=$market->departments;
            foreach($departamentosMarket as $dept)
            {
                $indicatorsD = DB::table('tb_indicator_departament')
                    ->join('tb_indicator','tb_indicator_departament.id_indicator','=','tb_indicator.id_indicator')
                    ->where('tb_indicator_departament.id_departament','=',$dept->id_dpto)
                    ->groupBy('tb_indicator_departament.id_indicator')
                    ->orderBy('tb_indicator_departament.order_position')->get();
                $indicatorsDpto = [];
                foreach($indicatorsD as $indt)
                {
                    $indicatorsDpto[]=['id_indicator'=>$indt->id_indicator,'points'=>0];
                }
                $this->eval_departament($newEvaluation->id_evaluation,$dept->id_dpto,"",$indicatorsDpto);
            }

            return $newEvaluation->id_evaluation;
        }
        return false;
    }

    public function evaluation_add_market()
    {
        $id_market = Input::get("id_market");
        if(Input::get("id_evaluation") == "")
        {
            $id_evaluation = $this->insert_evaluation($id_market,Input::get("date"),Input::get("time"));
        }
        else
        {
            $id_evaluation = Input::get("id_evaluation");
        }
        $id_market = Input::get("id_market");
        $indicatorsMarket = Input::get("indicadores");
        $this->eval_market($id_evaluation,$id_market,$indicatorsMarket);

        /*foreach($indicatorsMarket as $indicat)
        {
            $eval = DB::table('tb_evaluation_market_indicator')
                ->where('id_evaluation', '=', $id_evaluation)
                ->where('id_market', '=', $id_market)
                ->where('id_indicator', '=', $indicat['id_indicator'])
                ->first()
            ;
            if($eval)
            {
                DB::table('tb_evaluation_market_indicator')
                    ->where('id_evaluation', '=', $id_evaluation)
                    ->where('id_market', '=', $id_market)
                    ->where('id_indicator', '=', $indicat['id_indicator'])
                    ->update(array(
                    'points'=>$indicat['points']
                ));
            }
            else
            {
                DB::table('tb_evaluation_market_indicator')->insert(array(
                    'id_evaluation'=>$id_evaluation,
                    'id_market'=>$id_market,
                    'id_indicator'=>$indicat['id_indicator'],
                    'points'=>$indicat['points']
                ));
            }
        }*/
        $resp = ['success' => true, 'msg'=>"The general market evaluation was saved correctly", 'id_evaluation'=>$id_evaluation];
        return Response::json($resp);
    }

    public function evaluation_add_departament()
    {
        $id_dpto = Input::get("id_dpto");
        if(Input::get("id_evaluation") == "")
        {
            $id_market = Departament::find($id_dpto)->id_market;
            $id_evaluation = $this->insert_evaluation($id_market,Input::get("date"),Input::get("time"));
        }
        else
        {
            $id_evaluation = Input::get("id_evaluation");
        }
        $id_dpto = Input::get("id_dpto");
        $indicatorsDpto = Input::get("indicadores");
        $employee_name = Input::get("employee_name");
        $this->eval_departament($id_evaluation,$id_dpto,$employee_name,$indicatorsDpto);

        /*foreach($indicatorsDpto as $indicat)
        {
            $eval = DB::table('tb_evaluation_departament_indicator')
                ->where('id_evaluation', '=', $id_evaluation)
                ->where('id_dpto', '=', $id_dpto)
                ->where('id_indicator', '=', $indicat['id_indicator'])
                ->first()
            ;
            if($eval)
            {
                DB::table('tb_evaluation_departament_indicator')
                    ->where('id_evaluation', '=', $id_evaluation)
                    ->where('id_dpto', '=', $id_dpto)
                    ->where('id_indicator', '=', $indicat['id_indicator'])
                    ->update(array(
                    'points'=>$indicat['points'],
                    'employee_name'=>$employee_name
                ));
            }
            else
            {
                DB::table('tb_evaluation_departament_indicator')->insert(array(
                    'id_evaluation'=>$id_evaluation,
                    'id_dpto'=>$id_dpto,
                    'id_indicator'=>$indicat['id_indicator'],
                    'points'=>$indicat['points'],
                    'employee_name'=>$employee_name
                ));
            }
        }*/
        $resp = ['success' => true, 'msg'=>"The department evaluation was saved correctly", 'id_evaluation'=>$id_evaluation];
        return Response::json($resp);
    }

    public function evaluation_add_all()
    {
        $id_market = Input::get("id_market");
        if(Input::get("id_evaluation")!="")
        {
            $id_evaluation = Input::get("id_evaluation");
            $evaluacion = Evaluation::find($id_evaluation);
            if(false/*aqui va la restrincion para editar las evaluaciones*/)
            {
                 echo "estoy en la validacion del usuario para editas";
            }
            else
            {
                $evaluacion->date = Input::get("date");
                $hora = explode(":",explode(" ",Input::get("time"))[0]);
                if(explode(" ",Input::get("time"))[1] == "PM")
                {
                    if((int)$hora[0]+12<=23)
                    {
                        $hora[0] = (int)$hora[0]+12;
                    }
                    else
                        $hora[0] = "00";
                }
                $hora = $hora[0].":".$hora[1];
                $evaluacion->time = $hora;
                $evaluacion->update_date=date("Y-m-d");
                $evaluacion->update_person=Auth::user()->get()->name." ".Auth::user()->get()->surname;
                if(Auth::user()->get()->role->type == "user")
                {
                    $evaluacion->approved=0;
                }
                $evaluacion->save();
            }
        }
        else
        {
            $id_evaluation = $this->insert_evaluation($id_market,Input::get("date"),Input::get("time"));
        }
        $datos = Input::get("datos");
        foreach($datos as $area)
        {
            if(empty($area['id_dpto']))
            {
                if(!empty($area['indicadores']))
                {
                    $this->eval_market($id_evaluation,$id_market,$area['indicadores']);
                }
            }
            else
            {
                if(!empty($area['indicadores']))
                {
                    $this->eval_departament($id_evaluation,$area['id_dpto'],$area['employee_name'],$area['indicadores']);
                }
            }
        }
        $resp = ['success' => true, 'msg'=>"The evaluation of the market and its departments was correctly saved", 'id_evaluation'=>$id_evaluation];
        return Response::json($resp);




        /*foreach($datos as $evaluacion)
        {
           if(empty($evaluacion['id_dpto']))
           {
               //es un market evaluacion
               $id_market = $evaluacion['id_market'];
               if($id_evaluation == "" && $evaluacion['id_evaluation'] == "")
               {
                   $id_evaluation = $this->insert_evaluation($id_market,$evaluacion['date'],$evaluacion['time']);
               }
               else
               {
                   if(!empty($evaluacion['id_evaluation']))
                   {
                       $id_evaluation = $evaluacion['id_evaluation'];
                   }
               }
               if(!empty($evaluacion['indicadores']))
               {
                   $indicatorsMarket = $evaluacion['indicadores'];
                   $this->eval_market($id_evaluation,$id_market,$indicatorsMarket);
               }
           }
           else
           {
               $id_dpto = $evaluacion['id_dpto'];
               if($id_evaluation == "" && $evaluacion['id_evaluation'] == "")
               {
                   $id_market = Departament::find($id_dpto)->id_market;
                   $id_evaluation = $this->insert_evaluation($id_market,$evaluacion['date'],$evaluacion['time']);
               }
               else
               {
                   if(!empty($evaluacion['id_evaluation']))
                   {
                       $id_evaluation = $evaluacion['id_evaluation'];
                   }
               }
               $employee_name = $evaluacion['employee_name'];
               if(!empty($evaluacion['indicadores']))
               {
                   $indicatorsDpto = $evaluacion['indicadores'];
                   $this->eval_departament($id_evaluation,$id_dpto,$employee_name,$indicatorsDpto);
               }
           }
        }
        $resp = ['success' => true, 'msg'=>"The evaluation of the market and its departments was correctly saved", 'id_evaluation'=>$id_evaluation];
        return Response::json($resp);*/
    }

    private function eval_market($id_evaluation,$id_market,$indicatorsMarket)
    {
        foreach($indicatorsMarket as $indicat)
        {
            $eval = DB::table('tb_evaluation_market_indicator')
                ->where('id_evaluation', '=', $id_evaluation)
                ->where('id_market', '=', $id_market)
                ->where('id_indicator', '=', $indicat['id_indicator'])
                ->first()
            ;
            if($eval)
            {
                DB::table('tb_evaluation_market_indicator')
                    ->where('id_evaluation', '=', $id_evaluation)
                    ->where('id_market', '=', $id_market)
                    ->where('id_indicator', '=', $indicat['id_indicator'])
                    ->update(array(
                        'points'=>$indicat['points']
                    ));
            }
            else
            {
                DB::table('tb_evaluation_market_indicator')->insert(array(
                    'id_evaluation'=>$id_evaluation,
                    'id_market'=>$id_market,
                    'id_indicator'=>$indicat['id_indicator'],
                    'points'=>$indicat['points']
                ));
            }
        }
    }

    private function eval_departament($id_evaluation,$id_dpto,$employee_name,$indicatorsDpto)
    {
        foreach($indicatorsDpto as $indicat)
        {
            $eval = DB::table('tb_evaluation_departament_indicator')
                ->where('id_evaluation', '=', $id_evaluation)
                ->where('id_dpto', '=', $id_dpto)
                ->where('id_indicator', '=', $indicat['id_indicator'])
                ->first()
            ;
            if($eval)
            {
                DB::table('tb_evaluation_departament_indicator')
                    ->where('id_evaluation', '=', $id_evaluation)
                    ->where('id_dpto', '=', $id_dpto)
                    ->where('id_indicator', '=', $indicat['id_indicator'])
                    ->update(array(
                        'points'=>$indicat['points'],
                        'employee_name'=>$employee_name
                    ));
            }
            else
            {
                DB::table('tb_evaluation_departament_indicator')->insert(array(
                    'id_evaluation'=>$id_evaluation,
                    'id_dpto'=>$id_dpto,
                    'id_indicator'=>$indicat['id_indicator'],
                    'points'=>$indicat['points'],
                    'employee_name'=>$employee_name
                ));
            }
        }
    }

    public function to_list()
    {
        if(Auth::user()->get()->role->type == 'administrator' || Auth::user()->get()->role->type == 'manager')
        {
            $evaluations = Evaluation::orderby('date', 'desc')->orderby('time','desc')->get();
            //print_r($evaluations;die;
        }
        else
            $evaluations = Auth::user()->get()->evaluations()->orderby('date', 'desc')->orderby('time','desc')->get();
        /*echo "<pre>";
        print_r($evaluations);
        echo "<pre>";die;*/
        return View::make('evaluation.list_evaluation',array('evaluations'=>$evaluations));
    }

    public function evaluation_edit($id_evaluation)
    {
        $evaluation = Evaluation::where('id_evaluation','=',$id_evaluation)
            ->first();
        if($evaluation && (Auth::user()->get()->role->type == 'administrator' || Auth::user()->get()->role->type == 'manager' || (Auth::user()->get()->id_user == $evaluation->id_user && $this->esValidoPermisosUser($evaluation->date))))
        {
            $id = Evaluation::find($id_evaluation)->id_market;
            $market = Market::find($id);
            return View::make('evaluation.edit_evaluation',array('evaluation'=>$evaluation,'market'=>$market));
        }
        return Redirect::route('error');
    }

    public function evaluation_show($id_evaluation)
    {
        $evaluation = Evaluation::where('id_evaluation','=',$id_evaluation)
            ->first();
        if($evaluation && (Auth::user()->get()->role->type == 'administrator' || Auth::user()->get()->role->type == 'manager' || Auth::user()->get()->id_user == $evaluation->id_user))
        {
            $id = Evaluation::find($id_evaluation)->id_market;
            $market = Market::find($id);
            return View::make('evaluation.show_evaluation',array('evaluation'=>$evaluation,'market'=>$market));
        }
        return Redirect::route('error');
    }

    function esValidoPermisosUser($fechaBD)
    {
        $f1 = str_replace("-", "", $fechaBD);
        $f2 = date("Ymd");
        if($f2-$f1<2)
        {
            return true;
        }
        return false;
    }

    public function delete($id_evaluation)
    {
        $evaluation = Evaluation::where('id_evaluation','=',$id_evaluation)
            ->first();
        if($evaluation && (Auth::user()->get()->role->type == 'administrator' || Auth::user()->get()->role->type == 'manager' || (Auth::user()->get()->id_user == $evaluation->id_user && $this->esValidoPermisosUser($evaluation->date))))
        {
            $evaluation->delete();
            return Redirect::route("evaluation_list");
        }
        return Redirect::route('error');

    }

    public function evaluation_list_market($id_market)
    {
        $evaluations = DB::table('tb_evaluation')
            ->join('tb_user', 'tb_evaluation.id_user', '=', 'tb_user.id_user')
            ->join('tb_market', 'tb_evaluation.id_market', '=', 'tb_market.id_market')
            ->where('tb_market.id_market','=',$id_market)
            ->groupby('tb_evaluation.id_evaluation')
            ->orderby('tb_evaluation.date', 'desc')->orderby('tb_evaluation.time','desc')
            ->get();
        return View::make('evaluation.list_evaluation',array('evaluations'=>$evaluations,'porMarket'=>true));
    }

















}
