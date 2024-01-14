<?php
require_once(__DIR__ . '/Models/BookProduct.php');
require_once('ProductController.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scandiweb OOP APP | Add Product</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--  ajax cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="public/style.css">
</head>
<body>

<div class="main container">
  <!-- navbar starts here -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Product Add</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav"></div>
    </div>
  </nav>
    <!-- navbar ends here -->

      <!-- Content here -->
      <!-- form starts here -->
<div class="main">
  <form action="ProductController.php" method="POST" id="product_form">
      <!-- mandatory fields -->
  <div class="alert alert-info my-4 w-25" role="alert">
      NOTE: All FIELDS ARE MANDATORY
  </div>
  <div class="mb-3 w-50 p-1">
    <label for="sku" class="form-label">SKU</label>
    <input type="text" class="form-control" id="sku" name="sku" aria-describedby="skuHelp" placeholder="#sku">
      <?php
      session_start();
      if(isset($_SESSION["error_message"])){
          echo "<div id='skuHelp' class='form-text text-danger'>{$_SESSION['error_message']}</div>";
          unset($_SESSION["error_message"]);
      }
      ?>
  </div>
  <div class="mb-3 w-50 p-1">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="#name">
  </div>
  <div class="mb-3 w-50 p-1">
    <label for="price" class="form-label">Price ($)</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="priceHelp" placeholder="#price">
  </div>

  <!-- drop-down menu -->
  <div class="mb-3 w-50 p-1">
      <label for="productType" class="form-label">Type Switcher:</label>
      <select id="productType" name="productType" class="form-control w-50 p-1">
          <option class="" value="dvd">DVD</option>
          <option value="book">Book</option>
          <option value="furniture">Furniture</option>
      </select>
      <!-- Hidden input field to store the selected type -->
      <input type="hidden" id="selectedType" name="selectedType" value="">
  </div>

  <div class="mb-3 w-50 p-1">
    <div id="dvdForm" class="form-group-choice">
        <label for="size" class="form-label">Size (MB):</label>
        <input type="number" step="0.01" id="size" name="size" class="form-control" placeholder="#size">
        <div id="sizeHelp" class="form-text mb-4">Please, provide size</div>
    </div>

    <div id="bookForm" class="form-group-choice">
        <label for="weight" class="form-label">Weight (KG):</label>
        <input type="number" step="0.01" id="weight" name="weight"  class="form-control" placeholder="#weight">
        <div id="weightHelp" class="form-text mb-4">Please, provide weight</div>
    </div>

    <div id="furnitureForm" class="form-group-choice">
        <label for="width" class="form-label">Width (CM):</label>
        <input type="number" step="0.01" id="width" name="width" class="form-control" placeholder="#width">
        <div id="widthHelp" class="form-text mb-4">Please, provide width</div>
        <label for="length" class="form-label">Length (CM):</label>
        <input type="number" step="0.01" id="length" name="length" class="form-control" placeholder="#length">
        <div id="lengthHelp" class="form-text mb-4">Please, provide length</div>
        <label for="height" class="form-label">Height (CM):</label>
        <input type="number" step="0.01" id="height" name="height" class="form-control" placeholder="#height">
        <div id="heightHelp" class="form-text mb-4">Please, provide height</div>
    </div>
  </div>
  <div class="collapse alert alert-danger w-25" role="alert" id="formWarning">
      Please provide the data of indicated type
  </div>
  <div class="btn-group ms-auto mt-2">
            <button type="submit" class="btn btn-primary mx-1 rounded-end" id="saveButton" name="saveProduct" value="saveProduct">Save</button>
            <a href="product-list.php" id="cancelButton" type="button" class="btn btn-danger mx-4 rounded-start">Cancel</a>
        </div>
  </form>
</div>
<!-- form ends here -->

  <!-- footer starts here -->
  <footer class="bg-light text-center text-lg-start mt-4">
    <div class="container p-4">
      <div class="row">
        <div class="text-center">
          <h5 class="text-uppercase" id="footer-one">Scandiweb Test Assignment</h5>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer ends here -->
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            // hide and show menus according to productType
            // display product type form
            document.getElementById('productType').addEventListener('change', function () {
            var selectedOption = this.value;
            // Set the value of the hidden input field
            document.getElementById('selectedType').value = selectedOption;
            // Hide all form groups
            var formGroups = document.querySelectorAll('.form-group-choice');
            formGroups.forEach(function (formGroup) {
            formGroup.style.display = 'none';
            });
            // Show the form group for the selected type
            document.getElementById(selectedOption + 'Form').style.display = 'block';
            });

            // form validation for emptyness
            $('#product_form').submit(function(e) {
                var formWarning = document.getElementById("formWarning");

                // main fields
                if ($('#sku').val() === "" || $('#name').val() === "" || $('#price').val() === "") {
                    e.preventDefault();
                    formWarning.innerHTML = "Input fields cannot be empty!";
                    formWarning.classList.remove("collapse");
                }

                // chosen fields
                if($('#selectedType').val() === "book" && $('#weight').val() === "" ){
                    e.preventDefault();
                    formWarning.innerHTML = "Weight field cannot be empty!";
                    formWarning.classList.remove("collapse");
                } else if($('#selectedType').val() === "dvd" && $('#size').val() === "" ){
                    e.preventDefault();
                    formWarning.innerHTML = "Size field cannot be empty!";
                    formWarning.classList.remove("collapse");
                } else if($('#selectedType').val() === "furniture"){
                    if($('#width').val() === "" || $('#length').val() === "" || $('#height').val() === "" ){
                        e.preventDefault();
                        formWarning.innerHTML = "Either width, length, or height fields cannot be empty!";
                        formWarning.classList.remove("collapse");
                    }
                }

            });


        });


    </script>

  </body>
</html>
