<?php

require_once(__DIR__ . '/../Config/Database.php');
require_once 'Product.php';
class AllProducts extends Product {

    private $db;
    private static $table_name = "products";

    public function __construct(Database $db = null) {
        $this->db = $db ?: new Database();
    }
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

        // Redirect to product-list.php after deleting
        header("Location: product-list.php");
    }

    public function saveProduct(array $additionalData)
    {
        //pass
    }

    public function isSkuUnique($sku)
    {
        // Check if the SKU already exists in the database
        $sql = "SELECT COUNT(*) as count FROM " . self::$table_name . " WHERE sku = :sku";
        $data = [':sku' => $sku];
        // Get the PDO connection from the Database instance
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute($data);
        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] == 0; // If count is 0, SKU is unique
    }



}