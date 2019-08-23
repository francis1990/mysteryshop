<?php


class Evaluation extends Eloquent{

    protected $table = 'tb_evaluation';

    protected $primaryKey = 'id_evaluation';

    public $timestamps = false;

    public $remember_token = false;


    public function user()
    {
        return $this->belongsTo('User','id_user');
    }

    public function market_true()
    {
        return $this->belongsTo('Market','id_market');
    }

    public function market()
    {
        $m = DB::table('tb_evaluation')
            ->join('tb_evaluation_market_indicator', 'tb_evaluation_market_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
            ->where('tb_evaluation.id_evaluation', '=', $this->id_evaluation)
            ->first();
        $market = Market::find($m->id_market);
        return $market;
    }

    public function datos_eval_market()
    {
        $datos = DB::table('tb_evaluation')
            ->join('tb_market', 'tb_market.id_market', '=', 'tb_evaluation.id_market')
            ->join('tb_user', 'tb_user.id_user', '=', 'tb_evaluation.id_user')
            ->where('tb_evaluation.id_evaluation', '=', $this->id_evaluation)
            ->first();
        return $datos;
    }
} 