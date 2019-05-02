<?php


class Login extends Model {
  public $username, $password, $remember_me;

  public function __construct(){
		//normally we pass in table but there is no table for login
    parent::__construct('none');
  }


  public function getRememberMeChecked(){
    return $this->remember_me == 'on';
  }
}
