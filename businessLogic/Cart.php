<?php
class Cart{
    protected $product_id;

    public function __construct($product_id){
        $this->product_id = $product_id;
    }
    
    public function getProductId(){
        return $this->product_id;
    }

}