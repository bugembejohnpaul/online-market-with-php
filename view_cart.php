<?php
include('connection.php');
include('./functions/common_functions.php');
$_SESSION['username']="Paul123";
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
        <form action='' method='POST'>
            <table class="table table-bordered ">
                
                <tbody>
                    <?php
                       
                        
                        $get_ip_address = get_ip_address();
                        // Selecting IP address of Login User
                        $select_ip ="select * from cart_details where ip_address = '$get_ip_address'";
                        $results_ip = mysqli_query($conn,$select_ip);
                        $number_of_items_in_cart=mysqli_num_rows($results_ip);
                        if($number_of_items_in_cart>0){
                            echo "<thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product title</th>
                                <th>product Image</th>
                                <th>Quantity</th>
                                <th>product Price</th>
                                <th>Remove</th>
                                <th>Operations</th>
                            </tr>
                        </thead>";
                        
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
                                
                                ?>
                                
                                <tr>
                        <td><?php echo $product_id ?></td>
                        <td><?php echo $product_title ?></td>
                        <td><img class='card-img-top' src='./admin/products_images/<?php echo $product_image1?>' alt='$product_title'></td>
                        <td><input type='number' value='' name='quantity'></td>
                        <th><?php echo $product_price ?></th>
                        <td><input type='checkbox' name='remove_items[]'  value="<?php echo $product_id?>"></td>
                        <td colspan='2 ' class='d-flex'>
                            <!-- Buttons to Delete and Update Cart.... -->
                        <input type='submit' class='btn btn-info mr-1' name='update_cart' value='Update Cart'> 
                        <input type='submit' class='btn btn-danger ml-1' name='remove_cart' value='Remove Cart'>   
                        </td>
                        <?php 
                        $get_ip_address = get_ip_address();
                        if(isset($_POST['update_cart'])){  
                            $quantity = $_POST['quantity'];
                            $update_quantity = "update cart_details set quantity=$quantity where ip_address='$get_ip_address'";
                            $result_quantity_update = mysqli_query($conn,$update_quantity);
                            $total_price = $total_price*$quantity;
                        }

                        ?>
                    </tr>
                    <?php
                            }
                        }
                    }
                    else{
                        echo "<h2 class='text-center text-danger'>No Products in Cart.</h2>";
                    }
                    ?>
                    
                    
                </tbody>
            </table>



            <!-- Displaying Sub total when we have items in cart..... -->

            <div class="d-flex">
                <?php 
                $get_ip_address = get_ip_address();
                // Selecting IP address of Login User
                $select_ip ="select * from cart_details where ip_address = '$get_ip_address'";
                $results_ip = mysqli_query($conn,$select_ip);
                $number_of_items_in_cart=mysqli_num_rows($results_ip);
                if($number_of_items_in_cart>0){
                echo"<h4 >Sub-Total: <strong class='text-danger mr-5'>$total_price/-</strong></h4>
                <input type='submit' class='btn btn-info m-1' name='continue_shopping' value='Continue shopping'> 
                <input type='submit' class='btn btn-info m-1' name='check_out' value='Check out'> ";
                }else{
                    echo"<input type='submit' class='btn btn-info m-1' name='continue_shopping' value='Continue shopping'>";
                }
                ?>
                
            </div>












            <?php
                if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                }
            ?>
            <?php
            if(isset($_POST['check_out'])){
                echo "<script>window.open('check_out.php','_self')</script>";
            }
        ?>
            </form>
            
            <?php
            // Fuction to detete products in cart..........
            function delete_items(){
                global $conn;
                if(isset($_POST['remove_cart'])){
                    // Accessing product id when remove checkbox is checked. it is array of ids....
                    foreach($_POST['remove_items'] as $remove_id){
                        echo $remove_id;
                        $delete_query = "delete from cart_details where product_id = $remove_id";
                        $result_delete = mysqli_query($conn,$delete_query);
                        if($result_delete){
                            echo "<script>window.open('view_cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $delete_items=delete_items();
            ?>

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