<?php 

require_once "Database.php";

class ProductMapper extends DatabaseConfig {
    private $connection;
    private $query;

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function insertProduct($product){
        $this->query = "insert into products (emri, cmimi, pershkrimi, sasia, kategoria, image, admin_id) 
            values (:emri, :cmimi, :pershkrimi, :sasia, :kategoria, :image, :admin_id)";
        $statement = $this->connection->prepare($this->query);
        $emri = $product->getEmri();
        $cmimi = $product->getCmimi();
        $pershkrimi = $product->getPershkrimi();
        $sasia = $product->getSasia();
        $kategoria = $product->getKategoria();
        $image = $product->getImage();
        $admin = $product->getAdmin();
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":cmimi", $cmimi);
        $statement->bindParam(":pershkrimi", $pershkrimi);
        $statement->bindParam(":sasia", $sasia);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->bindParam(":image", $image);
        $statement->bindParam(":admin_id", $admin);
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

    public function deleteProduct($id){
        $this->query = "delete from products where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function updateProduct($product, $id){
        $this->query = "update products set emri=:emri, cmimi=:cmimi, pershkrimi=:desc, sasia=:qty, kategoria=:kategoria where id=:id";
        $statement = $this->connection->prepare($this->query);
        var_dump($product);
        $emri = $product->getEmri();
        $cmimi = $product->getCmimi();
        $pershkrimi = $product->getPershkrimi();
        $sasia = $product->getSasia();
        $kategoria = $product->getKategoria();
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":cmimi", $cmimi);
        $statement->bindParam(":desc", $pershkrimi);
        $statement->bindParam(":qty", $sasia);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function getAllCategories(){
        $this->query = "select * from categories";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getCategoriesExcept($catName){
        $this->query = "select * from categories where emri!=:emri";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":emri", $catName);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}    