<?php
require_once(__DIR__ . '/Models/AllProducts.php');
$Products = new AllProducts();
$allProducts = $Products->getAllProducts();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ids = $_POST["delete_id"];
        $deleteProducts = $Products->deleteSelectedProducts($ids);
    }

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
  <link rel="stylesheet" href="public/style.css">
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
            <a href="add-product.php" id="addButton" type="button" class="btn btn-success mx-4 rounded-end">Add</a>
          <button type="button" id="delete-product-btn" name="mass_delete" class="btn btn-danger mx-4 rounded-start delete-checkbox">Mass Delete</button>
        </div>
      </div>
    </div>
  </nav>
    <!-- navbar ends here -->

      <!-- Content here -->
  <div class="row d-flex justify-content-around">

      <!-- card three starts here -->
    <form class="form-inline row" action="" method="POST" id="checkboxForm">
      <?php if (is_array($allProducts)): ?>
          <?php foreach ($allProducts as $product): ?>
            <div class="container my-5 col-md-4">
	            <div class=" d-flex justify-content-center">
		            <div class="card card-position">
				            <div class="form-check form-position">
<!--                    <p type="text" id="productId" name="productId">--><?php //$product['id']; ?><!--</p>-->
                    <input class="form-check-input checkbox-position delete-checkbox" type="checkbox" id="defaultCheck3" name="delete_id[]" value="<?php echo $product['id']; ?>" />
				            </div>           
                  <div class="card-body">
                    <ul class="list-group list-group-flush list-position">
                      <li class="list-group-item"><?php echo $product['sku']; ?></li>
                      <li class="list-group-item"><?php echo $product['name']; ?></li>
                      <li class="list-group-item"><?php echo $product['price'] . " $"; ?></li>
                      <li class="list-group-item">
                        <?php
                        if($product['weight']){
                          echo "Weight: ".$product['weight'];
                        }elseif ($product['size']){
                          echo "Size: ".$product['size'];
                        }elseif ($product['width']){
                          echo "Dimensions: ".$product['width']."X".$product['length']."X".$product['height'];
                        };
                        ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
	          </div>
          <?php endforeach; ?>
      <?php else: ?>
          <p>No products available.</p>
      <?php endif; ?>
    </form>
    <!-- card three ends here -->
  </div>
</div>


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
      <script>

        $(document).ready(function() {
          $('#delete-product-btn').on('click', function() {
              $('#checkboxForm').submit();
          });
        });

      </script>

  </body>
</html>
