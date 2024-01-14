<?php

abstract class Product 
{

    // main properties
    protected $sku;
    protected $name;
    protected $price;

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
    abstract public function saveProduct(array $additionalData);

}

?>
