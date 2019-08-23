<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'tb_user';

    protected $primaryKey = 'id_user';

    public $timestamps = false;

    public $remember_token = false;



    public function set_password($password)
    {
        $this->set_attribute('password', Hash::make($password));
    }

    public function role()
    {
        return $this->belongsTo('Role','id_role');
    }

    public function evaluations()
    {
        return $this->hasMany('Evaluation','id_user');
    }
}
