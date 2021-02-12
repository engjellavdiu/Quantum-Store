<?php 

require_once "Database.php";

class CartMapper extends DatabaseConfig {
    private $connection;
    private $query;

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function insertCart($cart){
        $this->query = "insert into cart (product_id) values (:product_id)";
        $statement = $this->connection->prepare($this->query);
        $product_id = $cart->getProductId();
        $statement->bindParam(":product_id", $product_id);
        $statement->execute();
        return true;
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

}