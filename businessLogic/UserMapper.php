<?php 

require "Database.php";

class UserMapper extends DatabaseConfig {
    private $connection;
    private $query;

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function insertUser($user){
        $this->query = "insert into users (first_name, last_name, email, password, is_admin) values (:firstname, :lastname, :email, :password, :role)";
        $statement = $this->connection->prepare($this->query);
        $firstname = $user->getFirstName();
        $lastname = $user->getLastName();
        $email = $user->getEmail();
        $password = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $role = $user->getRole();
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":lastname", $lastname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":role", $role);
        $statement->execute();
    }

    public function getUserByEmail($email){
        $this->query = "select * from users where email=:email";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getEmail($email){
        $this->query = "select email from users where email=:email";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}