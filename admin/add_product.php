<?php
include('../connection.php');
if(isset($_POST['add_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_brand = $_POST['product_brand'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_status='True';
    // Accessing images............................
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    // Accessing image tempory name....................
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking for empty................
    if($product_title=="" or $product_description=="" or $product_keywords=="" or $product_brand==""or $product_category=="" or
    $product_image1=="" or $product_image2=="" or $product_image3=="" or $product_price="" ){
        echo "<script>alert('Fill All fields Please');</script>";
        exit();
    }else{
        // move images................
        move_uploaded_file($temp_image1,"./products_images/$product_image1");
        move_uploaded_file($temp_image2,"./products_images/$product_image2");
        move_uploaded_file($temp_image3,"./products_images/$product_image3");
        // Inserting products..................
        $insert = "insert into products(product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
        values('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result=mysqli_query($conn,$insert);
        if($result){
            echo "<script>alert('Hey, Inserted, Thanks');</script>";
        }else{
            echo "<script>alert('Hey, Not Inserted, Try again....');</script>";
        }
    }

   
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Chart.js link for drawing graphs and charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Products Management</title>
    
</head>
<body>

    <div class="container">
    <div class="title text-center"><h2>Add Product</h2></div>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="shadow p-5 mx-4">
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="form-group product_name ">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" name="product_title"  id="product_name" placeholder="Enter Product Name" required="required" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group product_description ">
                        <label for="product_description">Product Description:</label>
                        <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Enter Product Description" required="required" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="form-group product_keywords ">
                        <label for="product_keywords">Product keywords:</label>
                        <input type="text" class="form-control" name="product_keywords"  id="product_keywords" placeholder="Enter Product Keywords" required="required" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group product_brand">
                    <label for="product_brand">Product Brand:</label>
                        <select name="product_brand" id="product_brand" class="form-control" required="required">
                            <option value="">Select product_brand</option>
                            <?php 
                                $brand = "select * from brands";
                                $results= mysqli_query($conn,$brand);
                                while($row = mysqli_fetch_array($results)){
                                    $brand_id = $row['brand_id'];
                                    $brand_title = $row['brand_title'];
                                    echo "<option value='$brand_id'>$brand_title</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                <label for="product_name">Product Category:</label>
                    <div class="form-group product_category ">
                        <select name="product_category" id="product_category" class="form-control" required="required">
                            <option value="">Select product_category</option>
                            <?php 
                                $category = "select * from categories";
                                $results= mysqli_query($conn,$category);
                                while($row = mysqli_fetch_array($results)){
                                    $category_id = $row['category_id'];
                                    $category_title = $row['category_title'];
                                    echo "<option value='$category_id'>$category_title</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="product_image1">Choose Product Image1:</label>
                        <input type="file" class="form-control" name="product_image1" id="product_image1" required="required" >
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="product_image2">Choose Product Image2:</label>
                        <input type="file" class="form-control" name="product_image2" id="product_image1" required="required" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="product_image3">Choose Product Image3:</label>
                        <input type="file" class="form-control" name="product_image3" id="product_image3" required="required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                        <div class="form-group product_price ">
                            <label for="product_name">Product Price:</label>
                            <input type="text" class="form-control" name="product_price"  id="product_price" placeholder="Enter Product Price" required="required" autocomplete="off">
                        </div>
                    </div>
                </div>
            <div class="row mb-2">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="button">
                        <button type="submit" name="add_product" class="btn btn-success form-control">Add Product</button>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </form>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.js"></script>
</body>
</html>