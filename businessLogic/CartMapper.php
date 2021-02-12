<?php 

require_once "Database.php";

class CartMapper extends DatabaseConfig {
    private $connection;
    private $query;

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function insertToCart($user_id, $product_id){
        $this->query = "insert into cart (user_id, product_id) 
            values (:user_id, :product_id)";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":product_id", $product_id);
        $statement->bindParam(":user_id", $user_id);
        $statement->execute();
    }


    public function getCart(){
        $this->query = "select * from cart";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $resut = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $resut;
    }

    public function getCartID(){
        $this->query = "select id from cart where id = (SELECT id FROM users WHERE email = '".$_SESSION['email']."')";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $resut = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $resut;
    }
    
    // public function getCartDetails(){
    //     $this->query = "select * from products p, cart_items ic where p.id = ic.product_id";
    //     $statement = $this->connection->prepare($this->query);
    //     $statement->execute();
    //     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    public function getCartProducts($user_id){
        $this->query = "select * from cart where user_id=:user_id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":user_id", $user_id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}