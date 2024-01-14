<?php

require_once(__DIR__ . '/../Config/Database.php');
require_once 'Product.php';

class FurnitureProduct extends Product {

    // main properties
    private $db;
    private static $table_name = "products";
    protected $productType = 'furniture';
    protected $width;
    protected $length;
    protected $height;

    // constructor

    public function __construct(Database $db = null) {
        $this->db = $db ?: new Database();
    }

    // getter and setter
    public function setwidth($width)
    {
        $this->width = $width;
    }

    public function getwidth()
    {
        return $this->width;
    }

    public function setlength($length)
    {
        $this->length = $length;
    }

    public function getlength()
    {
        return $this->length;
    }

    public function setheight($height)
    {
        $this->height = $height;
    }

    public function getheight()
    {
        return $this->height;
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
        if (!isset($additionalData["sku"], $additionalData["name"], $additionalData["price"], $additionalData["productType"],$additionalData["width"], $additionalData["length"], $additionalData["height"])) {
            return "Missing required data for product.";
        }
        // Extract data from $additionalData
        $sku = $additionalData["sku"];
        $name = $additionalData["name"];
        $price = $additionalData["price"];
        $productType = $additionalData["productType"];
        $width = $additionalData["width"];
        $length = $additionalData["length"];
        $height = $additionalData["height"];

        // Prepare and execute the SQL query
        $sql = "INSERT INTO " . self::$table_name . " (sku, name, price, productType, width, length, height) VALUES (:sku, :name, :price, :productType, :width, :length, :height)";

        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':productType', $productType);
        $stmt->bindParam(':width', $width);
        $stmt->bindParam(':length', $length);
        $stmt->bindParam(':height', $height);
        $stmt->execute();

        //  return "Product saved successfully!";

    }


}


