<?php

class LoginVerify
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function verifyData()
    {
        if ($this->emptyInputs($this->email, $this->password)) {
            $_SESSION['login-register-error'] = true;
            header("Location: ../views/llogaria.php?login=emptyfields");
        } else if ($this->correctLoginData($this->email, $this->password)) {
            header("Location: ../views/index.php?login=success");
        } else {
            $_SESSION['login-register-error'] = true;
            header("Location: ../views/llogaria.php?login=error");
        }
    }

    private function emptyInputs($email, $password)
    {
        if (empty($email) || empty($password))
            return true;
        else
            return false;
    }

    private function correctLoginData($email, $password)
    {
        $mapper = new UserMapper();
        $user = $mapper->getUserByEmail($email);
        if ($user == null || count($user) == 0) {
            return false;
        } else if (password_verify($password, $user['password'])) {
            if ($user['is_admin'] == 1) {
                $obj = new Admin($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['role']);
                $obj->setSession();
            } else {
                $obj = new User($user['first_name'], $user['last_name'], $user['email'], $user['password'], $user['role']);
                $obj->setSession();
            }
            return true;
        } else
            return false;
    }
}

class RegisterVerify
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct($firstname, $lastname, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function insertData()
    {
        //check if inputs are empty
        if ($this->emptyInputs($this->firstname, $this->lastname, $this->email, $this->password)) {
            $_SESSION['login-register-error'] = true;
            header("Location: ../views/llogaria.php?register=emptyfields");
        } // check if all data input is correct based on methods verify data, filter_var, emailExists and validPassword
        else if ($this->verifyData() == false) {
            $_SESSION['login-register-error'] = true;
            header("Location: ../views/llogaria.php?register=error");
        } // if all verification is correct proceed to register user
        else {
            $user = new User($this->firstname, $this->lastname, $this->email, $this->password, 0);
            $mapper = new UserMapper();
            $mapper->insertUser($user);
            //login user after registering
            $login = new LoginVerify($this->email, $this->password);
            $login->verifyData();
        }
    }

    private function verifyData()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            return false;
        else if ($this->emailExists())
            return false;
        else if ($this->validPassword() == false)
            return false;
        else
            return true;
    }

    public function emptyInputs($firstname, $lastname, $email, $password)
    {
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password))
            return true;
        else
            return false;
    }

    public function emailExists()
    {
        $mapper = new UserMapper();
        $userEmail = $mapper->getEmail($this->email);
        if ($userEmail == null || count($userEmail) == 0)
            return false;
        else if ($this->email == $userEmail['email'])
            return true;
    }

    public function validPassword()
    {
        $regex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
        if (preg_match($regex, $this->password))
            return true;
        else
            return false;
    }

    //Kjo metode shfrytezohet tek editimi i userit
    public function validEmailModification($id)
    {
        $mapper = new UserMapper();
        $emailList = $mapper->getConstraintEmail($id);
        foreach ($emailList as $email) {
            if ($email['email'] == $this->email)
                return false;
        }
        return true;
    }
}
