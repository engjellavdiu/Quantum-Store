<?php
class Cart{  
    protected $user_id;
    protected $product_id;

    public function __construct($user_id, $product_id){
        $this->user_id = $user_id;
        $this->product_id = $product_id;     
    }
    
    public function getUserId(){
        return $this->user_id;
    }
    public function getProductId(){
        return $this->product_id;
    }

    
}