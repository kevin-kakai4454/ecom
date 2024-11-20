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

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" id="home" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="categories" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Trouser</a>
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

          <li class="nav-item">
            <a class="nav-link" href="#">Short</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Dress</a>
          </li>


          <!--<li class="nav-item dropdown">
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
          </li>-->
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



  <div class="container" style="margin: 30px auto;">
    <h1 class="mb-5  " style="text-align: center;">Clothes</h1>
    <h1 id="result" class="mb-5 cat" style="text-align: center;"></h1>
    <div class="row">
      <!-- <div class="col-sm-4">
        <div class="d-flex mt-3 gap-3">
          <div>
            <div class="card text-bg-light" style="width: 10rem;">
              <img src="images/short-2.jpg" class="card-image-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Trouser</h5>
                <p class="card-text">
                <p class="oldprice">Ksh. 400.00</p>
                <p class="price">Ksh. 300.00</p>
                </p>
              </div>
            </div>
          </div>

          <div>
            <div class="card text-bg-light" style="width: 10rem;">
              <img src="images/skirt-1.jpg" class="card-image-top" alt="">
              <div class="card-body">
                <h5 class="card-title">Troser</h5>
                <p class="card-text">
                <p class="oldprice">Ksh. 400.00</p>
                <p class="price">Ksh. 300.00</p>
                </p>
              </div>
            </div>
          </div>
        </div>
       </div> -->

    </div>
  </div>
  </div>

  <script src="index.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>