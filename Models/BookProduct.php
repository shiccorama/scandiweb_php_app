<?php

require_once(__DIR__ . '/../Config/Database.php');
require_once 'Product.php';

class BookProduct extends Product {
    private $db;
    private static $table_name = "products";
    protected $productType = 'book';
    protected $weight;

    public function __construct(Database $db = null) {
        $this->db = $db ?: new Database();
    }

    // getter and setter
    public function setweight($weight)
    {
        $this->weight = $weight;
    }

    public function getweight()
    {
        return $this->weight;
    }

    // inherited methods
    // Other specific methods for BookProduct
    public function getAllProducts() {
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

        // Generating placeholders for the prepared statement
        $placeholders = rtrim(str_repeat('?, ', count($ids)), ', ');
    
        $sql = "DELETE FROM " . self::$table_name . " WHERE id IN ($placeholders)";
    
        // Get the PDO connection from the Database instance
        $stmt = $this->db->conn->prepare($sql);
    
        // Execute the query with the given IDs
        $stmt->execute($ids);
    
        // Return the number of affected rows
        return $stmt->rowCount();
    }
    


    public function saveProduct($sku, $name, $price, ...$params) 
    {
        list($size) = $params;
        $this->saveProductWithWeight($sku, $name, $price, $this->weight);
    }

    public function saveProductWithWeight($sku, $name, $price, $weight)
    {

        $sql = "INSERT INTO " . self::$table_name . " (sku, name, price, weight) VALUES (:sku, :name, :price, :weight)";
        
        $stmt = $this->db->conn->prepare($sql);
    
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':weight', $weight);
    
        $stmt->execute();
    
        return $stmt->rowCount();
    }

}



?>
