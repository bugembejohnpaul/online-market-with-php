<?php
include('../connection.php');
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $ip_address = $_POST['ip_address'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    if($username=='' or $email=='' or $password =='' or $user_image=='' or $ip_address==''or $address==''or $mobile ==''){
        echo"<script>alert('Fill All Fields.')</script>";
    }else{
        // Making Sure that username is Unique.........
        $select_check = "select * from user where username = '$username' or email ='$email'";
        $results_check=mysqli_query($conn,$select_check);
        $number_check=mysqli_num_rows($results_check);
        if($number_check<1){
            move_uploaded_file($user_image_tmp,"./user_profiles/$user_image");
            $insert_query="insert into user(username,email,password,user_image,user_ip,user_address,user_mobile)
            values('$username','$email','$password','$user_image','$ip_address','$address','mobile')";
            $results = mysqli_query($conn,$insert_query);
            if($results){
                echo"<script>alert('User data Inserted')</script>";
            }else{
                echo"<script>alert('User data NOT Inserted')</script>";
            }
        }else{
            echo"<script>alert('Username or Email Already Exits')</script>";
        }
        
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
            <div class="col-lg-12 shadow m-5">
            <h2 class="text-center m-2">Register Here</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="m-5">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label for="user_image">Choose Image</label>
              <input type="file" class="form-control" name="user_image" >
            </div>
            <div class="form-group">
              <label for="ip_address">Ip address</label>
              <input type="text" class="form-control" name="ip_address" id="" placeholder="Enter IP address">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="" placeholder="Enter Physical Address">
            </div>
            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input type="text" class="form-control" name="mobile" id="" placeholder="Enter Mobile Number">
            </div>
            <input type="submit" class="form-control btn btn-success" value="Register" name="register">
        </form>
        <p>Already have an account: <strong><a href="login.php">Login</a></strong></p>
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