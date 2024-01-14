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
    public function getAllProducts() {
        //pass
    }
    public function deleteSelectedProducts($ids)
    {
        //pass
    }
    // Other specific methods for dvdProduct

    public function saveProduct(array $additionalData)
    {
        // Ensure all mandatory fields are present in the $additionalData array
        if (!isset($additionalData["sku"], $additionalData["name"], $additionalData["price"], $additionalData["productType"] ,$additionalData["size"])) {
            return "Missing required data for product.";
        }
        // Extract data from $additionalData
        $sku = $additionalData["sku"];
        $name = $additionalData["name"];
        $price = $additionalData["price"];
        $productType = $additionalData["productType"];
        $size = $additionalData["size"];

        // Prepare and execute the SQL query
        $sql = "INSERT INTO " . self::$table_name . " (sku, name, price, productType, size) VALUES (:sku, :name, :price, :productType, :size)";

        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':productType', $productType);
        $stmt->bindParam(':size', $size);
        $stmt->execute();
        //  return "Product saved successfully!";
    }

}


