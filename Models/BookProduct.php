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
    public function getAllProducts() {
        //pass
    }

    public function deleteSelectedProducts($ids)
    {
        //pass
    }

    // Other specific methods for BookProduct
    public function saveProduct(array $additionalData)
    {
        // Ensure all mandatory fields are present in the $additionalData array
        if (!isset($additionalData["sku"], $additionalData["name"], $additionalData["price"], $additionalData["productType"] ,$additionalData["weight"])) {
            return "Missing required data for product.";
        }
        // Extract data from $additionalData
        $sku = $additionalData["sku"];
        $name = $additionalData["name"];
        $price = $additionalData["price"];
        $productType = $additionalData["productType"];
        $weight = $additionalData["weight"];

        // Prepare and execute the SQL query
        $sql = "INSERT INTO " . self::$table_name . " (sku, name, price, productType, weight) VALUES (:sku, :name, :price, :productType, :weight)";

        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':productType', $productType);
        $stmt->bindParam(':weight', $weight);
        $stmt->execute();

        //  return "Product saved successfully!";

    }

}



