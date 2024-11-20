<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css">
  <title>Bootstrap Sandbox | Cards</title>
</head>

<body>
  <?php
  include_once("db.php")
  ?>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="categories" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">trouser</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">skirt</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">T-shirts</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Sweaters</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </a>
          </li>
          <!-- <li class="nav-item">
                <a class="nav-link " aria-disabled="true">Disabled</a>
              </li> -->
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container border mt-2">

    <div class="row border bg-light" style="width: 400px; align-items: center; margin: 5px auto;">
      <h1 style="text-align: center;">Add Products</h1>
      <form action="preciever.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="prod_name">Product Name</label>
          <input type="text" class="form-control prod_name" name="prod_name" required />
          <div class="invalid-feedback">Enter correct product name</div>
        </div>
        <div class="mb-3">
          <label for="prod_price">Product Price</label>
          <input type="number" class="form-control prod_price" name="prod_price" required>
          <div class="invalid-feedback">Enter correct product price</div>
        </div>
        <div class="mb-3">
          <label for="prod_desc">Product Description</label>
          <input type="text" class="form-control prod_desc" name="prod_desc" required>
          <div class="invalid-feedback">Enter correct product Descriptin</div>
        </div>
        <div class="mb-3">
          <label for="prod_size">Product Size</label>
          <input type="number" class="form-control prod_size" name="prod_size" required>
        </div>
        <div class="mb-3">
          <label for="prod_image">Product Image</label>
          <input type="file" class="form-control prod_image" name="prod_image" required>
          <div class="invalid-feedback">Select correct product image</div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary form-control submit">
      </form>
    </div>
  </div>

  <!-- <script src="prod1.js"></script> -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>