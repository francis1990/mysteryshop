<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/





Route::any('login', [
    "as"=>"showlogin",
    "uses"=>"AuthController@login"
]);

Route::get('prueba',function(){
    return View::make('evaluation.show_evaluation',array('var'=>"hola"));
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    echo "clear-cache";die;
});

Route::get('generar', function()
{
    $html = View::make("hello");
    return PDF::load($html, 'A4', 'portrait')->show();
});





/*Route::get('logout',
    ['as'=>"logout",
        'uses'=>function(){
            Auth::user()->logout();
            return Redirect::route("index");
        }]);*/


Route::group(array('before'=>'authUsuario'),function(){

    Route::any('/', [
        "as"=>"index",
        "uses"=>"AuthController@index"
    ]);

    Route::any('/logout', [
        "as"=>"logout",
        "uses"=>"AuthController@logOut"
    ]);


    Route::group(array('before'=>'roleManager'),function(){

        //Administracion user
        Route::any('/users/add', [
            "as"=>"users_add",
            "uses"=>"UserController@insert"
        ]);

        Route::any('/users/edit/{id_user}', [
            "as"=>"users_edit",
            "uses"=>"UserController@edit"
        ]);

        Route::any('/users/list', [
            "as"=>"users_list",
            "uses"=>"UserController@to_list"
        ]);

        Route::get('/users/show/{id_user}', [
            "uses"=>"UserController@show"
        ]);

        Route::get('/users/delete/{id_user}', [
            "uses"=>"UserController@delete"
        ]);


        Route::group(array('before'=>'roleAdministrator'),function(){

            //administracion de role
            Route::any('/role/add', [
                "as"=>"role_add",
                "uses"=>"RoleController@insert"
            ]);

            Route::any('/role/list', [
                "as"=>"role_list",
                "uses"=>"RoleController@to_list"
            ]);

            Route::get('/role/show/{id_role}', [
                "uses"=>"RoleController@show"
            ]);

            Route::get('/role/delete/{id_role}', [
                "uses"=>"RoleController@delete"
            ]);
        });

        //administracion de Market
        Route::any('/market/list', [
            "as"=>"market_list",
            "uses"=>"MarketController@to_list"
        ]);

        Route::any('/market/add', [
            "as"=>"market_add",
            "uses"=>"MarketController@insert"
        ]);

        Route::get('/market/show/{id_market}', [
            "as"=>"market_show",
            "uses"=>"MarketController@show"
        ]);

        Route::get('/market/edit/{id_market}', [
            "as"=>"market_edit_show",
            "uses"=>function($id_market){
                $market = Market::find($id_market);
                return View::make('market.edit_market',array('market'=>$market));
            }
        ]);

        Route::post('/market/edit', [
            "as"=>"market_edit",
            "uses"=>"MarketController@edit"
        ]);

        Route::get('/market/delete/{id_market}', [
            "uses"=>"MarketController@delete"
        ]);


        //administracion de Departament
        Route::any('/departament/add/{id_market}', [
            "as"=>"departament_add",
            "uses"=>"DepartamentController@insert"
        ]);

        Route::get('/departament/list/market/{id_market}', [
            "as"=>"departament_list_market",
            "uses"=>"DepartamentController@list_depart_market"
        ]);

        Route::any('/departament/edit/{id_departament}', [
            "as"=>"departament_edit",
            "uses"=>"DepartamentController@edit"
        ]);

        Route::get('/departament/delete/{id_departament}', [
            "as"=>"departament_delete",
            "uses"=>"DepartamentController@delete"
        ]);


        //administracion de Indicator
        Route::get('/indicator/list/departament/{id_departament}', [
            "as"=>"indicator_list_departament",
            "uses"=>"IndicatorController@indicator_list_departament"
        ]);

        Route::get('/indicator/list/market/{id_market}', [
            "as"=>"indicator_list_market",
            "uses"=>"IndicatorController@indicator_list_market"
        ]);

        Route::post('/indicator/departament_add', [
            "as"=>"indicator_departament_add",
            "uses"=>"IndicatorController@insert_Endepartament"
        ]);

        Route::post('/indicator/market_add', [
            "as"=>"indicator_market_add",
            "uses"=>"IndicatorController@insert_Enmarket"
        ]);

        Route::get('/indicator/delete/{id_indicator}/{type}/{id_type}', [
            "as"=>"indicator_delete",
            "uses"=>"IndicatorController@delete"
        ]);

        Route::any('/indicator/edit/{id_indicator}/{type}/{id_type}', [
            "as"=>"indicator_edit",
            "uses"=>"IndicatorController@edit"
        ]);


        Route::get('/evaluation/list/market/{id_market}', [
            "as"=>"evaluation_list_market",
            "uses"=>"EvaluationController@evaluation_list_market"
        ]);


        Route::any('report/excel/by_date', [
            'as'=>"report_excel_by_date",
            "uses"=>"ReportController@reportGroupPorFecha"
        ]);

        Route::any('report/chart', [
            'as'=>"report_chart",
            "uses"=>"ReportController@reportChart"
        ]);

    });

    //administracion de Evaluation
    Route::get('/evaluation/list', [
        "as"=>"evaluation_list",
        "uses"=>"EvaluationController@to_list"
    ]);

    Route::get('/evaluation/market/show/{id_market}', [
        "as"=>"evaluation_market_show",
        "uses"=>"EvaluationController@evaluation_market_show"
    ]);

    Route::get('/evaluation/show/{id_evaluation}', [
        "as"=>"evaluation_show",
        "uses"=>"EvaluationController@evaluation_show"
    ]);

    Route::get('/evaluation/edit/{id_evaluation}', [
        "as"=>"evaluation_edit",
        "uses"=>"EvaluationController@evaluation_edit"
    ]);

    Route::post('/evaluation/add/market', [
        "as"=>"evaluation_add_market",
        "uses"=>"EvaluationController@evaluation_add_market"
    ]);

    Route::post('/evaluation/add/departament', [
        "as"=>"evaluation_add_departament",
        "uses"=>"EvaluationController@evaluation_add_departament"
    ]);

    Route::post('/evaluation/add/all', [
        "as"=>"evaluation_add_all",
        "uses"=>"EvaluationController@evaluation_add_all"
    ]);

    Route::get('/evaluation/delete/{id_evaluation}', [
        "as"=>"evaluation_delete",
        "uses"=>"EvaluationController@delete"
    ]);














});

Route::any('error', [
    "as"=>"error",
    "uses"=>function(){
        return View::make('error.error404');
    }
]);
/*Redirecion a error 404*/
App::missing(function($exception){
  return Response::view('error.error404', array(), 404);
});



