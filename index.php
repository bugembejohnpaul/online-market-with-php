<?php
include('./connection.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Mushroom Market</title>
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
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="" height="40px">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" style="margin-left: 30%;" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="">Products</a>
                    </li>
                    <li class="nav-link">
                        <a href="">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search products">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
      <div class="container-fluid p-1">
        <div class="title  text-light text-center p-2" style="background-image: linear-gradient(white, blue);">
            <h2>Welcome to the online Shop.</h2>
        </div>
        <div class="row">
            <div class="col-lg-10">
            <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./images/mush2.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Mushroom Soup Powder</h4>
                        <p class="card-text">Now we have Mushroom Soup Powder</p>
                        <a href="" class="btn btn-primary ">Add to Cart</a>
                        <a href="" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./images/mush8.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Mushroom Biscuit</h4>
                        <p class="card-text">We also have Mushroom Biscuit</p>
                        <a href="" class="btn btn-primary ">Add to Cart</a>
                        <a href="" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./images/mushroom1.png" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Mushroom Chips</h4>
                        <p class="card-text">This about Mushroom Chips</p>
                        <a href="" class="btn btn-primary ">Add to Cart</a>
                        <a href="" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
        

        </div>
        <!-- Another product row -->
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./images/mush3.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Mushroom raw Product</h4>
                        <p class="card-text">Now we have Mushroom raw product</p>
                        <a href="" class="btn btn-primary ">Add to Cart</a>
                        <a href="" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./images/mush juice.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Mushroom Juice</h4>
                        <p class="card-text">We also have Mushroom Juice</p>
                        <a href="" class="btn btn-primary ">Add to Cart</a>
                        <a href="" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./images/mush immunity.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Mushroom Immunity</h4>
                        <p class="card-text">This about Mushroom Immunity</p>
                        <a href="" class="btn btn-primary ">Add to Cart</a>
                        <a href="" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
        

        </div>
            </div>
            <div class="col-lg-2 bg-light">
               
                <div class="brands bg-primary ">
                <h4 class="p-1">Brands</h4>
                </div>
                <div class="navbar text-info">
                    
                    <ul class="navbar-nav me-auto ">
                    <?php
                        $brands = "select * from brands";
                        $results = mysqli_query($conn,$brands);
                        while($row = mysqli_fetch_array($results)){
                            $id = $row['id'];
                            $brand_title = $row['brand_title'];
                            echo "<li class='nav-link'><a href=''>$brand_title</a></li>";
                        }

                    ?>
                    </ul>
                </div>
                <div class="categories bg-primary ">
                <h4 class="p-1">Categories</h4>
                </div>
                <div class="navbar text-info">
                    
                    <ul class="navbar-nav me-auto ">
                    <?php
                        $categories = "select * from categories";
                        $results = mysqli_query($conn,$categories);
                        while($row = mysqli_fetch_array($results)){
                            $id = $row['id'];
                            $category_title = $row['category_title'];
                            echo "<li class='nav-link'><a href=''>$category_title</a></li>";
                        }

                    ?>
                    </ul>
                </div>



            </div>
        </div>
        
      </div>
      <div class="footer text-center text-light p-3" style="background-image: linear-gradient(white, blue);">
        &copy;bjp quality mushrooms Uganda
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>