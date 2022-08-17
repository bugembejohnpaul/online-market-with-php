<?php
include('../connection.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select = "select * from user";
    $result = mysqli_query($conn,$select);
    $array_results = mysqli_fetch_array($result);
    if(($username==$array_results['username'])&&($password==$array_results['password'])){
        echo"<script>alert('User Logged In Successfully')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }else{
        echo"<script>alert('Invalid User Details')</script>";
        

    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Register User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 shadow m-5">
            <h2 class="text-center m-2">Login Here </h2>
        <form action="" method="POST" enctype="multipart/form-data" class="m-5">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="" placeholder="Enter password">
            </div>
            <input type="submit" class="form-control btn btn-success" value="Login" name="login">
        </form>
        <p>New User: <strong><a href="register_customer.php">Register</a></strong></p>
            </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>