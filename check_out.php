<?php
include('connection.php');
include('./functions/common_functions.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Online Market</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="" height="40px">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" style="margin-left: 20%;" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin/index.php?home"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">View Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Login/Register</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="view_cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart = <?php count_cart_items();?></a>
                    </li>
                    <li class="nav-item">
                        <!-- Accessing Total Price of products in Cart.. -->
                        <a class="nav-link" href="">Total Price: Shs.<?php getting_total_price(); ?></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" name="search_data" placeholder="Search products">
                    <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                    <input type="submit" name="search_products" value="search" class="btn btn-outline-success">
                </form>
            </div>
        </nav>
        
    </header>
      <div class="container">
      

        <?php
        
        if(isset($_SESSION['username'])){
            include('payment.php');
        }else{
            include('customers/login.php');
        }
        ?>
      </div>
      
      <div class="footer text-center text-light p-3" style="background-image: linear-gradient(white, lightblue);">
        &copy;bjp quality mushrooms Uganda
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>