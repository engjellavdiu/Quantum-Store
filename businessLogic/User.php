<?php
require_once 'Person.php';

class User extends Person {

    public function __construct($name, $lastname, $email, $password, $role){
        parent::__construct($name, $lastname, $email, $password, $role);
    }

    public function setSession(){
        $_SESSION['role'] = 0;
        $_SESSION['rolename'] = "SimpleUser";
        $_SESSION['is_logged_in'] = true;
    }

    public function setCookie(){
        setcookie("username", $this->getEmail(), time() + 120); //modify later
    }

    public function getFirstName(){
        return $this->name;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRole(){
        return $this->role;
    }
}