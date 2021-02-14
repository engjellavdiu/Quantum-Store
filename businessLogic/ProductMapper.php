<?php 

require_once "Database.php";

class ProductMapper extends DatabaseConfig {
    private $connection;
    private $query;

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function insertProduct($product){
        $this->query = "insert into products (emri, cmimi, pershkrimi, sasia, kategoria, image, admin_id, prodhuesi) 
            values (:emri, :cmimi, :pershkrimi, :sasia, :kategoria, :image, :admin_id, :prodhuesi)";
        $statement = $this->connection->prepare($this->query);
        $emri = $product->getEmri();
        $cmimi = $product->getCmimi();
        $pershkrimi = $product->getPershkrimi();
        $sasia = $product->getSasia();
        $kategoria = $product->getKategoria();
        $image = $product->getImage();
        $admin = $product->getAdminId();
        $prodhuesi = $product->getProdhuesi();
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":cmimi", $cmimi);
        $statement->bindParam(":pershkrimi", $pershkrimi);
        $statement->bindParam(":sasia", $sasia);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->bindParam(":image", $image);
        $statement->bindParam(":admin_id", $admin);
        $statement->bindParam(":prodhuesi", $prodhuesi);
        $statement->execute();
        return true;
    }

    public function getAllProducts(){
        $this->query = "select * from products order by id desc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // return the last 8 products from db
    public function getRecentProducts(){
        $this->query = "select * from (select * from products order by id desc limit 8)var1 order by id desc"; 
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // return products of the category given as argument
    public function getProductsByCategory($kategoria, $id){
        $this->query = "select * from (select * from products where kategoria=:kategoria and
         id!=:id order by id desc limit 3)var1 order by id asc"; 
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->bindParam(":id", $id);
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

    public function getPriceLowToHigh(){
        $this->query = "select * from products order by cmimi asc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPriceHighToLow(){
        $this->query = "select * from products order by cmimi desc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNameAtoZ(){
        $this->query = "select * from products order by emri asc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNameZtoA(){
        $this->query = "select * from products order by emri desc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNewest(){
        $this->query = "select * from products order by id desc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOldest(){
        $this->query = "select * from products order by id asc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteProduct($id){
        $this->query = "delete from products where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function updateProduct($id, $emri, $cmimi, $pershkrimi, $sasia, $kategoria){
        $this->query = "update products set emri=:emri, cmimi=:cmimi, pershkrimi=:desc, sasia=:qty, kategoria=:kategoria where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":cmimi", $cmimi);
        $statement->bindParam(":desc", $pershkrimi);
        $statement->bindParam(":qty", $sasia);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function promoteProduct($id){
        $this->query = "update products set is_promoted=1 where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function demoteProduct($id){
        $this->query = "update products set is_promoted=0 where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function getPromotedProducts(){
        $this->query = "select * from products where is_promoted=1";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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

    public function insertCategory($kategoria){
        $this->query = "insert into categories (emri) values (:kategoria)";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":kategoria", $kategoria);
        $statement->execute();
    }

    public function insertIntoSlider($image){
        $this->query = "insert into slider (image) values (:image)";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":image", $image);
        $statement->execute();
    }

    public function deleteFromSlider($id){
        $this->query = "delete from slider where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function getSliderImages(){
        $this->query = "select * from slider";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSliderImage($id){
        $this->query = "select * from slider where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertIntoBrands($image){
        $this->query = "insert into brands (image) values (:image)";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":image", $image);
        $statement->execute();
    }

    public function deleteFromBrands($id){
        $this->query = "delete from brands where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function getBrandImages(){
        $this->query = "select * from brands";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getBrandImage($id){
        $this->query = "select * from brands where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}    