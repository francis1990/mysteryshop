<?php

class AuthController extends BaseController {


    public function login()
    {
        if(Auth::user()->check())
        {
            return Redirect::route('index');
        }
        else
        {
            if(Input::server("REQUEST_METHOD") == "POST")
            {
                //echo Hash::make(Input::get("password"));die;
                $reglas = [
                    "user" => 'required',
                    "password" => "required|min:8"
                ];
                $campos = [
                    'user'=>Input::get("user"),
                    'password'=>Input::get("password")
                ];
                $mensajesError = [
                    'user.required' => "User is required",
                    'password.required' => "Password is required",
                    'password.min' => "The password must be at least 8 letters"
                ];
                $validador = Validator::make($campos, $reglas,$mensajesError);
                if($validador->passes())
                {
                    //echo $p;die;
                    $user = User::where('user', '=', $campos['user'])
                        ->where('removed','=',0)
                        ->first();
                    if($user && Hash::check($campos['password'], $user->password))
                    {
                        Auth::user()->login($user);
                        return Redirect::route('index');
                    }

                    /*$conexion = DB::connection('mysql');
                    if(Auth::user()->attempt($campos))
                    {
                        echo Auth::usuario()->get()->address;die;

                    }*/
                    return Redirect::back()->withInput()->withErrors(['inValidos'=>"Incorrect user or password"]);
                }
                return Redirect::back()->withInput()->withErrors($validador);
            }
            return View::make("login.login");
        }

    }

    public function login_no()
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {
            $campos = [
                'user'=>Input::get("user"),
                'password'=>Input::get("password")
            ];
            //echo Hash::make(Input::get("password"));die;
            //print_r($campos);die;
            return View::make('layouts.index',  $campos);
        }
        return View::make("login.login");
    }

    public function index()
    {
        $userLogin = Auth::user()->get();
        /*$acciones = DB::table('tb_accion')
            ->join('tb_modulo', 'tb_accion.id_modulo', '=', 'tb_modulo.id_modulo')
            ->join('tb_acciones_roles', 'tb_accion.id_accion', '=', 'tb_acciones_roles.id_accion')
            ->join('tb_rol', 'tb_acciones_roles.id_rol', '=', 'tb_rol.id_rol')
            ->where('tb_rol.id_rol', '=', $userLogin->rol->id_rol)
            ->orderby('tb_accion.id_modulo', 'asc')
            ->get(array('tb_modulo.nomb_modulo', 'tb_accion.id_accion'));*/
        //print_r($userLogin);die;

        return View::make("layouts.portada");
    }

    public function logOut()
    {
        Auth::user()->logout();
        return Redirect::route("showlogin");
    }

    public function prueba()
    {
        return "ok";
    }





}
