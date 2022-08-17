<?php
include('./connection.php');
// Function to get Products.................This reduces the code in index file.......
function get_products(){
    global $conn;
    if(!(isset($_GET['category']))){
        if(!(isset($_GET['brand']))){
            $select_products ="select * from products order by rand() LIMIT 0,3";
            $results = mysqli_query($conn,$select_products);
            while($row=mysqli_fetch_array($results)){
                $product_id= $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $product_brand = $row['product_id'];
                $product_category = $row['category_id'];
                echo "<div class='col-lg-4'>
                <a href='product_details.php?product_id=$product_id' style='text-decoration: none; color: black;'>
                <div class='card my-2'>
                    <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                    <div class='card-body'>
                        <div class='title d-flex'>
                            <h4 class='card-title mr-5'>$product_title</h4><h5 class='card-title text-danger'>Price: Shs.$product_price</h5>
                        </div>
                        <p class='card-text'>$product_description</p>
                        <a href='index.php?cart_product_id=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
                </a>
            </div>";
            }
        }
    }
}
// Getting Unique Categories......................
function get_unique_categories(){
    global $conn;
    if(isset($_GET['category'])){
        $category_id =$_GET['category'];
        $select_products ="select * from products where category_id=$category_id";
        $results = mysqli_query($conn,$select_products);
        $num_rows = mysqli_num_rows($results);
        if($num_rows<1){
            echo"<h2 class='text-danger m-5'>Products of this category is Out of Stock.</h2>";
        }
        while($row=mysqli_fetch_array($results)){
            $product_id= $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_id'];
            $product_category = $row['category_id'];
            echo "<div class='col-lg-4'>
            <a href='product_details.php?product_id=$product_id' style='text-decoration: none; color: black;'>
            <div class='card my-2'>
                <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                <div class='card-body'>
                <div class='title d-flex'>
                    <h4 class='card-title mr-5'>$product_title</h4><h5 class='card-title text-danger'>Price: Shs.$product_price</h5>
                </div>
                    <p class='card-text'>$product_description</p>
                    <a href='index.php?product_id=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
            </a>
        </div>";
        }
    }
}

// Getting Unique Brands......................
function get_unique_brands(){
    global $conn;
    if(isset($_GET['brand'])){
        $category_id =$_GET['brand'];
        $select_products ="select * from products where category_id=$category_id";
        $results = mysqli_query($conn,$select_products);
        $num_rows = mysqli_num_rows($results);
        if($num_rows<1){
            echo"<h2 class='text-danger m-5'>Products of this Brand is Out of Stock.</h2>";
        }
        while($row=mysqli_fetch_array($results)){
            $product_id= $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_id'];
            $product_category = $row['category_id'];
            echo "<div class='col-md-4'>
            <a href='product_details.php?product_id=$product_id' style='text-decoration: none; color: black;'>
            <div class='card my-2'>
                <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                <div class='card-body'>
                <div class='title d-flex'>
                    <h4 class='card-title mr-5'>$product_title</h4><h5 class='card-title  text-danger'>Price: Shs.$product_price</h5>
                </div>
                    <p class='card-text'>$product_description</p>
                    <a href='index.php?cart_product_id=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
            </a>
        </div>";
        }
    }
}

// Function to get Brands.................This reduces the code in index file.......
function get_brands(){
    global $conn;
        $brands = "select * from brands";
        $results = mysqli_query($conn,$brands);
        while($row = mysqli_fetch_array($results)){
        $id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<li class='nav-link'><a href='index.php?brand=$id' name='brand'>$brand_title</a></li>";
        }
}
// Function to get Categories.................This reduces the code in index file.......
function get_categories(){
    global $conn;
    $categories = "select * from categories";
    $results = mysqli_query($conn,$categories);
    while($row = mysqli_fetch_array($results)){
        $id = $row['category_id'];
        $category_title = $row['category_title'];
        echo "<li class='nav-link'><a href='index.php?category=$id' name='category'>$category_title</a></li>";
    }

}
// Function to get Products.................This reduces the code in index file.......
function search_products(){
    global $conn;
    if(isset($_GET['search_products'])){
        $key_word = $_GET['search_data'];
        $search_products ="select * from products where product_keywords like '%$key_word%' ";
        $results = mysqli_query($conn,$search_products);
        while($row=mysqli_fetch_array($results)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_id'];
            $product_category = $row['category_id'];
            echo "<div class='col-lg-4'>
            <a href='product_details.php?product_id=$product_id' style='text-decoration: none; color: black;'>
            <div class='card my-2'>
                <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                <div class='card-body'>
                <div class='title d-flex'>
                    <h4 class='card-title mr-5'>$product_title</h4><h5 class='card-title  text-danger'>Price: Shs.$product_price</h5>
                </div>
                    <p class='card-text'>$product_description</p>
                    <a href='index.php?cart_product_id=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
            </div>
            </a>
        </div>";
        }
    }
}
// Viewing products details................
function view_product_details(){
    global $conn;
    if(!(isset($_GET['category']))){
        if(!(isset($_GET['brand']))){
            $product_id =$_GET['product_id'];
            $select_products ="select * from products where product_id=$product_id";
            $results = mysqli_query($conn,$select_products);
            while($row=mysqli_fetch_array($results)){
                $product_id= $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $product_brand = $row['product_id'];
                $product_category = $row['category_id'];
                echo "<div class='col-lg-4'>
                <a href='index.php?cart_product_id=$product_id' style='text-decoration: none; color: black;'>
                <div class='card my-2'>
                    <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                    <div class='card-body'>
                    <div class='title d-flex'>
                        <h4 class='card-title mr-5'>$product_title</h4><h5 class='card-title  text-danger'>Price: Shs.$product_price</h5>
                    </div>
                        <p class='card-text'>$product_description</p>
                        <a href='index.php?cart_product_id=$product_id' class='btn btn-primary'>Add to Cart</a>
                        
                    </div>
                </div>
                </a>
            </div>";
            echo "<div class='col-lg-4'>
                <div class=' my-4'>
                    <img class='card-img-top' src='./admin/products_images/$product_image2' alt='$product_title' height='250px'>
                </div>
            </div>";
            echo "<div class='col-lg-4'>
                <div class=' my-4'>
                    <img class='card-img-top' src='./admin/products_images/$product_image3' alt='$product_title'  height='250px'>
                </div>
            </div>";
            }
        }
    }
}

// Getting IP Address of the user device
function get_ip_address(){  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  


// Adding to cart function...............
function add_to_cart(){
    global $conn;
    if(isset($_GET['cart_product_id'])){
        $get_ip_address = get_ip_address();
        $get_cart_product_id= $_GET['cart_product_id'];
        $select_cart ="select * from cart_details where ip_address = '$get_ip_address' and product_id = '$get_cart_product_id'";
        $results_cart = mysqli_query($conn,$select_cart);
        $num_rows = mysqli_num_rows($results_cart);
        if($num_rows>0){
            echo"<script>alert('Sorry, this product is Already in cart.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert = "insert into cart_details(product_id,ip_address,quantity) values('$get_cart_product_id','$get_ip_address',1)";
            $insert_results= mysqli_query($conn,$insert);
            if($insert_results){
                echo"<script>alert('This product is Added to cart, Thanks.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }


    }
}
// Counting number of Items in cart table..........
function count_cart_items(){
    global $conn;
    if(isset($_GET['cart_product_id'])){
        $get_ip_address = get_ip_address();
        $select_cart ="select * from cart_details where ip_address = '$get_ip_address'";
        $results_cart = mysqli_query($conn,$select_cart);
        $num_cart_products = mysqli_num_rows($results_cart);
        echo $num_cart_products;
    }else{
        $get_ip_address = get_ip_address();
        $select_cart ="select * from cart_details where ip_address = '$get_ip_address'";
        $results_cart = mysqli_query($conn,$select_cart);
        $num_cart_products = mysqli_num_rows($results_cart);
        echo $num_cart_products;
    }
    
}
// Calculating Total PriceFunction.....................
function getting_total_price(){
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
            $total_price +=array_sum($prices_to_pay);
        }
    }
    // Displaying the Total Price of Items in Cart.........
    echo $total_price;
    
}
?>