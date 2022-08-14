<?php
include("../connection.php");
if(isset($_POST['add_category'])){
    $category_title = $_POST['category'];
    $insert_category = "insert into categories(category_title) values('$category_title')";
    $result_category = mysqli_query($conn,$insert_category);
    if($result_category){
        echo"<script>alert('Hi, Product inserted into the data base.')</script>";
    }
    else{
        echo"<script>alert('Hi, Product Not inserted.')</script>";
    }
}
?>

<div class="title text-center m-2">
    <h4>Add Product</h4>
</div>
<form action="" method="POST">
<div class="category input-group m-2">
    <input type="text" name="category" placeholder="Enter Category" class="form-control">
</div>
<div class="input-group" m-2>
    <input type="submit" name="add_category"  class="form-control btn btn-primary m-2" value="Add Product">
</div>
</form>