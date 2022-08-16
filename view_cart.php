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
    <script>
        .card-img-top{
            height: 50px;
            width: 50px;
            object-fit: contains;
        }
    </script>
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
        <div class="title text-center p-2" >
            <h2 class="text-info">Products in Cart.</h2>
        </div>
        <div class="row mb-5">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product title</th>
                        <th>product Image</th>
                        <th>Quantity</th>
                        <th>product Price</th>
                        <th>Remove</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        global $conn;
                        $get_ip_address = get_ip_address();
                        // Selecting IP address of Login User
                        $select_ip ="select * from cart_details where ip_address = '$get_ip_address'";
                        $results_ip = mysqli_query($conn,$select_ip);
                        // Initialing Total Price.............
                        $total_price=0;
                        while($row_product=mysqli_fetch_array($results_ip)){
                            $product_id =$row_product['product_id'];
                            // Selecting product Price.........
                            $select_product ="select * from products where product_id = '$product_id'";
                            $results_product = mysqli_query($conn,$select_product);
                            while($row_product=mysqli_fetch_array($results_product)){
                                $prices_to_pay = array($row_product['product_price']);

                                $product_id = $row_product['product_id'];
                                $product_title=$row_product['product_title'];
                                $product_image1 = $row_product['product_image1'];
                                $product_price = $row_product['product_price'];
                                $total_price +=array_sum($prices_to_pay);
                                echo "
                                <tr>
                        <td>$product_id</td>
                        <td>$product_title</td>
                        <td><img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'></td>
                        <td><input type='text'></td>
                        <th>$product_price</th>
                        <td><input type='checkbox'></td>
                        <td colspan='2'>
                            <button class='btn btn-info'>Update</button>
                        </td>
                    </tr>
                                ";
                            }
                        }
                    ?>
                    
                    
                </tbody>
            </table>

            <div class="d-flex">
                <h4 >Sub-Total: <strong class="text-info"><?php echo $total_price ?></strong></h4>
                <a href="index.php"><button class="btn btn-info p-1 ml-5">Cotinuue Shopping</button></a>
                <a href="index.php"><button class="btn btn-danger px-3 mx-5">Check out</button></a>
            </div>
        </div>
       
            
        </div>
        
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