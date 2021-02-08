<?php

abstract class Person {
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;
    protected $role;

    function __construct($name, $lastname, $email, $password, $role){
        $this->name=$name;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
    }
}