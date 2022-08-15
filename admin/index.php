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
    
    <div class="row ">
        <!-- Sidebar -->
        <div class="col-lg-2 sidebar shadow bg-light p-1">
            <img src="../images/logo.png" alt="" height="90px" style="margin-left: 25%" class="p-2">
            <h5 class="text-center p-1">Admin Panel</h5>
            <a href="index.php?home">  
            <div class="home my-1">
            <button type="submit" name="home" class="form-control">
                <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="ml-3">Home</span>
            </button>
            </div>
            </a>
            <a href="../index.php">
            <div class="brand my-1">
                <button type="submit" name="home" class="form-control">View site</button>  
            </div>
            </a>
            <a href="index.php?add_brand">
            <div class="brand my-1">
                <button type="submit" name="add_brand" class="form-control">Register Brand</button>  
            </div>
            </a>
            <a href="index.php?add_category">
            <div class="category my-1">
                <button type="submit" name="add_category" class="form-control">Register Category</button>
            </div>
            </a>
            <a href="index.php?add_product">
            <div class="product my-1 ">
                <button type="submit" name="add_product" class="form-control">Register Product</button>
            </div>
            </a>
            
            <a href="logout.php">
            <div class="logout ">
                <input type="text" name="logout" value="Logout" class="form-control">
            </div>
            </a>
        </div>
        <!-- End of Sidebar -->
        <!-- Main Content -->
        <div class="col-lg-10 main-content">
            <div class="title bg-light m-1 p-2">
            <h1 class="text-center">Admin, Manage products</h1>
            </div>
                
            <!-- Including dash board..... -->
            <div class="home">
                <?php
                    if(isset($_GET['home'])){
                        include('dashboard.php');
                    }
                ?>
            </div>
            <!-- Include Add Category form -->
            <div class="add_category">
                <?php
                    if(isset($_GET['add_category'])){
                        include('add_category.php');
                    }
                ?>
            </div>
            <!-- Include Add Brand form -->
            <div class="add_band">
                <?php
                    if(isset($_GET['add_brand'])){
                        include('add_brand.php');
                    }
                ?>
            </div>
            <!--  Incuding Add Product Form -->
            <div class="add_product">
                <?php
                    if(isset($_GET['add_product'])){
                        include('add_product.php');
                    }
                ?>
            </div>

            <!-- Drawing Graph.................... -->
            <div class="row">
                
            </div>
                    <!--End of Graph  -->
        </div>
    </div>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.js"></script>
</body>
</html>