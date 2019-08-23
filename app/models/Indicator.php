<?php


class Indicator extends Eloquent{

    protected $table = 'tb_indicator';

    protected $primaryKey = 'id_indicator';

    public $timestamps = false;

    public $remember_token = false;

    public function departments()
    {
        return $this->belongsToMany('Departament','tb_indicator_departament','id_indicator','id_departament');
    }

    public function markets()
    {
        return $this->belongsToMany('Market','tb_indicator_market','id_indicator','id_market');
    }

} 