<?php

require_once(__DIR__ . '/../Config/Database.php');
require_once 'Product.php';

class DvdProduct extends Product {

    private $db;
    private static $table_name = "products";
    // main properties
    protected $productType = 'dvd';
    protected $size;

    // constructor

    public function __construct(Database $db = null) {
        $this->db = $db ?: new Database();
    }


    // getter and setter
    public function setsize($size)
    {
        $this->size = $size;
    }

    public function getsize()
    {
        return $this->size;
    }

    // inherited methods
    // Other specific methods for dvdProduct
    public function getAllProducts() {
        $data = array();
        // Get all products from the database
        $sql = "SELECT * FROM " . self::$table_name;
        // Execute the query
        $stmt = $this->db->conn->query($sql);
        // Fetch all products
        $allProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return all products
        return $allProducts;

    }

    public function deleteSelectedProducts($ids)
    {
        $db = new Database();
    
        // Generating placeholders for the prepared statement
        $placeholders = rtrim(str_repeat('?, ', count($ids)), ', ');
    
        $sql = "DELETE FROM " . self::$table_name . " WHERE id IN ($placeholders)";
    
        // Get the PDO connection from the Database instance
        $stmt = $db->conn->prepare($sql);
    
        // Execute the query with the given IDs
        $stmt->execute($ids);
    
        // Return the number of affected rows
        return $stmt->rowCount();
    }




    public function saveProduct($sku, $name, $price, ...$params) 
    {
        list($size) = $params;
        $this->saveProductWithSize($sku, $name, $price, $this->size);
    }
    
    public function saveProductWithSize($sku, $name, $price, $size)
    {
        // insert values into table
        $sql = "INSERT INTO" . self::$table_name . "(sku, name, price, size) VALUES (:sku, :name, :price, :size)";

        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':weight', $weight);

        $stmt->execute();

        return $stmt->rowCount();
    }


}



?>
