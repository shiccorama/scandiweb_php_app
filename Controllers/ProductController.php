<?php
require_once(__DIR__ . '/../Config/Database.php');
require_once(__DIR__ . '/../Models/BookProduct.php');
require_once(__DIR__ . '/../Models/DvdProduct.php');
require_once(__DIR__ . '/../Models/FurnitureProduct.php');

class ProductController {
    public $allProducts = [];
    public function getAllProducts() {

//        $allProducts = []; // Initialize an empty array
//
//        // Fetch products from BookProduct table
//        $bookProduct = new BookProduct();
//        $bookProducts = $bookProduct->getAllProducts();
//        $allProducts = array_merge($allProducts, $bookProducts);

//        // Fetch products from DvdProduct table
//        $dvdProduct = new DvdProduct();
//        $dvdProducts = $dvdProduct->getAllProducts();
//        $allProducts = array_merge($allProducts, $dvdProducts);
//
//        // Fetch products from FurnitureProduct table
//        $furnitureProduct = new FurnitureProduct();
//        $furnitureProducts = $furnitureProduct->getAllProducts();
//        $allProducts = array_merge($allProducts, $furnitureProducts);
//
//        // Sort products by ID
//        usort($allProducts, function ($a, $b) {
//            return $a['id'] - $b['id'];
//        });

        require_once(__DIR__ . '/../product-list.php');
    }




























}


?>