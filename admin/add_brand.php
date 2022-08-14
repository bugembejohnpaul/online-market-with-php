<!-- Inserting Brand into Database -->
<?php
include("../connection.php");
if(isset($_POST['add_brand'])){
    $brand_title = $_POST['brand_name'];
    $select ="select * from brands where brand_title = '$brand_title'";
    $result = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($result);
    if($row<1){
        $insert_brand = "insert into brands(brand_title) values('$brand_title')";
        $result_brand = mysqli_query($conn,$insert_brand);
        if($result_brand){
            echo"<script>alert('Hi, Brand inserted into the data base.')</script>";
        }
    }else{
        echo"<script>alert('Hi, Brand Not inserted. Already Exists.')</script>";
    }
}
?>
<div class="title text-center m-2">
    <h4>Add Brand</h4>
</div>
<form action="" method="POST">
<div class="category input-group">
    <input type="text" name="brand_name" placeholder="Enter Brand" class="form-control">
</div>
<div class="input-group">
    <input type="submit" name="add_brand"  class="form-control btn btn-primary m-2" value="Add Brand">
</div>
</form>