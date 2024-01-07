<?php
require_once(__DIR__ . '/Models/BookProduct.php');
$bookProduct = new BookProduct();
$allProducts = $bookProduct->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scandiweb OOP APP | Product List</title>
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
      <a class="navbar-brand" href="#">Product List</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="btn-group ms-auto">
          <button type="button" class="btn btn-success mx-4 rounded-end">Add</button>
          <button type="button" class="btn btn-danger mx-4 rounded-start">Mass Delete</button>
        </div>
      </div>
    </div>
  </nav>
    <!-- navbar ends here -->

      <!-- Content here -->
  <div class="row d-flex justify-content-around">

      <!-- card one starts here -->
    <div class="container my-5 col-md-4">
      <div class=" d-flex justify-content-center">
        <div class="card card-position">
            <div class="form-check">
              <input class="form-check-input checkbox-position delete-checkbox" type="checkbox" value="" id="defaultCheck1" title="defaultCheck1">
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush list-position">
                <li class="list-group-item">Line property 1</li>
                <li class="list-group-item">Line property 2</li>
                <li class="list-group-item">Line property 3</li>
                <li class="list-group-item">Line property 4</li>
              </ul>
            </div>
        </div>
      </div>
    </div>
      <!-- card one ends here -->

      <!-- card two starts here -->
    <div class="container my-5 col-md-4">
      <div class=" d-flex justify-content-center">
        <div class="card card-position">
            <div class="form-check form-position">
              <input class="form-check-input checkbox-position delete-checkbox" type="checkbox" value="" id="defaultCheck2" title="defaultCheck2">
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush list-postion">
                <li class="list-group-item">Line property 1</li>
                <li class="list-group-item">Line property 2</li>
                <li class="list-group-item">Line property 3</li>
                <li class="list-group-item">Line property 4</li>
              </ul>
            </div>
        </div>
      </div>
    </div>
      <!-- card two ends here -->

      <!-- card three starts here -->
    <div class="container my-5 col-md-4">
      <div class=" d-flex justify-content-center">
        <div class="card card-position">
            <div class="form-check form-position">
              <input class="form-check-input checkbox-position delete-checkbox" type="checkbox" value="" id="defaultCheck3" title="defaultCheck3" placeholder="">
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush list-position">
                <li class="list-group-item">Line property 1</li>
                <li class="list-group-item">Line property 2</li>
                <li class="list-group-item">Line property 3</li>
                <li class="list-group-item">Line property 4</li>
              </ul>
            </div>
        </div>
      </div>
    </div>
      <!-- card three ends here -->

  </div>

    <button id="clickMe">click me</button>
   <div class="test" id="test">test</div>

<!--    --><?php //print_r($allProducts); ?>


    <?php if (is_array($allProducts)): ?>
        <?php foreach ($allProducts as $product): ?>
            <ul>
                <li><?php echo $product['id']; ?></li>
                <li><?php echo $product['name']; ?></li>
                <li><?php echo $product['price']; ?></li>
            </ul>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No products available.</p>
    <?php endif; ?>



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








      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="public/js/main.js"></script>
      <script>


          $(document).ready(function(){
              // action (view) for read() all products inside BookProduct
              $("#clickMe").click(function(){
                  $.ajax({
                      url: "Controllers/ProductController.php",
                      type: "POST",
                      data: {action: "getAllProducts"},
                      success: function(response){
                          $("#test").html(response);
                      }
                  })
              });
          });


      </script>

  </body>
</html>
