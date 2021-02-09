<?php 

require "Database.php";

class ProductMapper extends DatabaseConfig {
    private $connection;
    private $query;

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function insertProduct($product){
        $this->query = "insert into products (id, emri, cmimi,pershkrimi, sasia, kategoria, image) values (:id, :emri, :cmimi, :pershkrimi, :sasia, :kategoria, :image)";
        $statement = $this->connection->prepare($this->query);
        $id = $product->getId();
        $emri = $product->getEmri();
        $pershkrimi = $product->getPershkrimi();
        $sasia = $product->getSasia();
        $kategoria = $product->getKategoria();
        $image = $product->getImage();
        $statement->bindParam(":id", $id);
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":pershkrimi", $pershkrimi);
        $statement->bindParam(":sasia", $sasia);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->bindParam(":image", $image);
        $statement->execute();
    }

    public function getAllProducts(){
        $this->query = "select * from products";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getProductsById($id){
        $this->query = "select * from products where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}    