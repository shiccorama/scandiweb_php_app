<?php

require_once(__DIR__ . '/Config/Database.php');
require_once(__DIR__ . '/Models/AllProducts.php');
require_once(__DIR__ . '/Models/BookProduct.php');
require_once(__DIR__ . '/Models/DvdProduct.php');
require_once(__DIR__ . '/Models/FurnitureProduct.php');

if (isset($_POST['saveProduct'])) {
    // taking instance of AllProducts
    $newAllProducts = new AllProducts();
    // Check if SKU is unique before saving
    $checkSKU = $_POST['sku'];
        // check the uniqueness to continue process
        if(!$newAllProducts->isSkuUnique($checkSKU)) {
            // SKU is not unique, show error message and stop form submission
            session_start();
            $_SESSION['error_message'] = "SKU already exists. Please choose a unique SKU.";
            header("Location: add-product.php");
            exit();
        }else{

            if ($_POST['productType'] == "book") {
                $newBook = new BookProduct();
                $formData = [
                    "sku" => $_POST['sku'],
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "productType" => $_POST['productType'],
                    "weight" => $_POST['weight']
                ];
                //var_dump($formData);
                $newBook->saveProduct($formData);
                // Redirect to product-list.php after saving
                header("Location: product-list.php");
                exit();
            } elseif ($_POST['productType'] == "dvd") {
                $newDvd = new DvdProduct();
                $formData = [
                    "sku" => $_POST['sku'],
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "productType" => $_POST['productType'],
                    "size" => $_POST['size']
                ];
                //var_dump($formData);
                $newDvd->saveProduct($formData);
                // Redirect to product-list.php after saving
                header("Location: product-list.php");
                exit();

            } elseif ($_POST['productType'] == "furniture") {
                $newFurniture = new FurnitureProduct();
                $formData = [
                    "sku" => $_POST['sku'],
                    "name" => $_POST['name'],
                    "price" => $_POST['price'],
                    "productType" => $_POST['productType'],
                    "width" => $_POST['width'],
                    "length" => $_POST['length'],
                    "height" => $_POST['height']
                ];
                //var_dump($formData);
                $newFurniture->saveProduct($formData);
                // Redirect to product-list.php after saving
                header("Location: product-list.php");
                exit();
            } else {
                var_dump("something wrong happened!");
            };
        };


};

