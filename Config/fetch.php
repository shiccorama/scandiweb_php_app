<?php

require_once "Database.php";


function getAllProducts() {
    $db = new Database();
    $data = array();
    // Get all products from the database
    $sql = "SELECT * FROM " . "products";
    // Execute the query
    $stmt = $db->conn->query($sql);
    // Fetch all products
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // return all products
    return $products;
};

var_dump(getAllProducts());
