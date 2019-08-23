<?php


class Departament extends Eloquent{

    protected $table = 'tb_departament';

    protected $primaryKey = 'id_dpto';

    public $timestamps = false;

    public $remember_token = false;


    public function market()
    {
        return $this->belongsTo('Market','id_market');
    }

    public function indicators()
    {
        return $this->belongsToMany('Indicator','tb_indicator_departament','id_departament','id_indicator');
    }



} 