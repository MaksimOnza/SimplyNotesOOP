<?php

class User
{

    function __construct($name, $password){
        $this->name = $name;
        $this->password = password_hash($password, PASSWORD_DEFAULT) ?? '';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }



}