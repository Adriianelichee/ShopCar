<?php
include_once "Sesion.php";

Class Login {
    public $user;
    public $password;

    public function __construct($user,$password)
    {
        $this->user = $user;
        $this->password = $password;
    }

}