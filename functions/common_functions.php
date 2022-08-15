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
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $product_brand = $row['product_id'];
                $product_category = $row['category_id'];
                echo "<div class='col-lg-4'>
                <div class='card my-2'>
                    <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                    <div class='card-body'>
                        <h4 class='card-title'>$product_title</h4>
                        <p class='card-text'>$product_description</p>
                        <a href='' class='btn btn-primary'>Add to Cart</a>
                        <a href='' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
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
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_id'];
            $product_category = $row['category_id'];
            echo "<div class='col-lg-4'>
            <div class='card my-2'>
                <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                <div class='card-body'>
                    <h4 class='card-title'>$product_title</h4>
                    <p class='card-text'>$product_description</p>
                    <a href='' class='btn btn-primary'>Add to Cart</a>
                    <a href='' class='btn btn-secondary'>View more</a>
                </div>
            </div>
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
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_id'];
            $product_category = $row['category_id'];
            echo "<div class='col-lg-4'>
            <div class='card my-2'>
                <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                <div class='card-body'>
                    <h4 class='card-title'>$product_title</h4>
                    <p class='card-text'>$product_description</p>
                    <a href='' class='btn btn-primary'>Add to Cart</a>
                    <a href='' class='btn btn-secondary'>View more</a>
                </div>
            </div>
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
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_id'];
            $product_category = $row['category_id'];
            echo "<div class='col-lg-4'>
            <div class='card my-2'>
                <img class='card-img-top' src='./admin/products_images/$product_image1' alt='$product_title'>
                <div class='card-body'>
                    <h4 class='card-title'>$product_title</h4>
                    <p class='card-text'>$product_description</p>
                    <a href='' class='btn btn-primary'>Add to Cart</a>
                    <a href='' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";
        }
    }
}

?>