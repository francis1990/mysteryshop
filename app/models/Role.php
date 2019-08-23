<?php


class Role extends Eloquent{

    protected $table = 'tb_role';

    protected $primaryKey = 'id_role';

    public $timestamps = false;

    public $remember_token = false;


    public function users()
    {
        return $this->hasMany('User','id_role');
    }
} 