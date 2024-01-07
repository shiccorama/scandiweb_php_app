<?php

abstract class Product 
{

    // main properties
    protected $sku;
    protected $name;
    protected $price;
        
    // constructor
    // public function __construct($sku, $name, $price) {
    //     $this->sku = $sku;
    //     $this->name = $name;
    //     $this->price = $price;
    // }

    // // getter and setter

    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function getSku() {
        return $this->sku;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    abstract public function getAllProducts();
    abstract public function deleteSelectedProducts($ids);
    abstract public function saveProduct($sku, $name, $price, ...$params);

    // abstract public function getProductById($id);
}

?>
