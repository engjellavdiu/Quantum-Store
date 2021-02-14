<?php

require_once 'Person.php';

class Admin extends Person {

    public function __construct($name, $lastname, $email, $password, $role){
        parent::__construct($name, $lastname, $email, $password, $role);
    }

    public function setSession(){
        $_SESSION['role'] = 1;
        $_SESSION['rolename'] = "Admin";
        $_SESSION['is_logged_in'] = true;
        $_SESSION['email'] = $this->email;
    }

    public function setCookie(){
        setcookie("email", $this->getEmail(), time() + 3600); //subject to change
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