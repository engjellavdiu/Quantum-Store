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

    public function getUserByID($id){
        $this->query = "select * from users where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
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

    //Get all emails except the user whose id is given as argument
    public function getConstraintEmail($id){
        $this->query = "select email
        from users
        where id!=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllUsers(){
        $this->query = "select * from users";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteUser($id){
        $this->query = "delete from users where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function edit($user, $id){
        $this->query = "update users set first_name=:firstname, last_name=:lastname, email=:email, password=:password where id=:id";
        $statement = $this->connection->prepare($this->query);
        var_dump($user);
        $firstname = $user->getFirstName();
        $lastname = $user->getLastName();
        $email = $user->getEmail();
        $pw = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":lastname", $lastname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $pw);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function makeAdmin($id){
        $this->query = "update users set is_admin=1 where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function removeAdmin($id){
        $this->query = "update users set is_admin = 0 where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}