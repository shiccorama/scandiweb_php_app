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
  <link rel="stylesheet" href="public/css/style.css">
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
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="btn-group ms-auto">
          <button type="button" class="btn btn-primary mx-4 rounded-end" id="saveButton">Save</button>
          <button type="button" class="btn btn-danger mx-4 rounded-start" id="cancelButton">Cancel</button>
        </div>
      </div>
    </div>
  </nav>
    <!-- navbar ends here -->

      <!-- Content here -->
      <!-- form starts here -->
<div class="main">
  <form action="process_form.php" method="post">
      <!-- mandatory fields -->
    <div id="mandatory" class="mandatory-text p-4">* Please note: all fields are MANDATORY</div>
  <div class="mb-3 w-50 p-1">
    <label for="sku" class="form-label">SKU</label>
    <input type="number" class="form-control" id="sku" name="sku" aria-describedby="skuHelp" placeholder="#sku">
    <div id="skuHelp" class="form-text">sku validation</div>
  </div>
  <div class="mb-3 w-50 p-1">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="#name">
    <div id="nameHelp" class="form-text">name validation</div>
  </div>
  <div class="mb-3 w-50 p-1">
    <label for="price" class="form-label">Price ($)</label>
    <input type="number" class="form-control" id="price" name="price" aria-describedby="priceHelp" placeholder="#price">
    <div id="priceHelp" class="form-text">price validation</div>
  </div>

  <!-- drop-down menu -->
  <div class="mb-3 w-50 p-1">
      <label for="productType" class="form-label">Type Switcher:</label>
      <select id="productType" name="productType" class="form-control w-50 p-1">
          <option value="dvd">DVD</option>
          <option value="book">Book</option>
          <option value="furniture">Furniture</option>
      </select>
      <!-- Hidden input field to store the selected type -->
      <input type="hidden" id="selectedType" name="selectedType" value="">
  </div>

  <div class="mb-3 w-50 p-1">
    <div id="dvdForm" class="form-group-choice">
        <label for="size" class="form-label">Size (MB):</label>
        <input type="text" id="size" name="size" class="form-control" placeholder="#size">
        <p id="validate-input-1" class="validation-input">Please, submit required data</p>
    </div>

    <div id="bookForm" class="form-group-choice">
        <label for="weight" class="form-label">Weight (KG):</label>
        <input type="text" id="weight" name="weight"  class="form-control" placeholder="#weight">
        <p id="validate-input-2" class="validation-input">Please, submit required data</p>
    </div>

    <div id="furnitureForm" class="form-group-choice">
    <label for="height" class="form-label">Height (CM):</label>
        <input type="text" id="height" name="height" class="form-control mb-4" placeholder="#height">
        <label for="width" class="form-label">Width (CM):</label>
        <input type="text" id="width" name="width" class="form-control mb-4" placeholder="#width">
        <label for="length" class="form-label">Length (CM):</label>
        <input type="text" id="length" name="length" class="form-control mb-4" placeholder="#length">
        <p id="validate-input-3" class="validation-input">Please, submit required data</p>
    </div>
  </div>



  </form>
</div>
<!-- form ends here -->

  <!-- footer starts here -->
  <footer class="bg-light text-center text-lg-start">
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
    <script src="public/js/main.js"></script>

  </body>
</html>
