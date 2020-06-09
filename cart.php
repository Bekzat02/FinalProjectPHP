<?php
session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");
$db=new CreateDb("riseup","products");
if(isset($_POST['remove'])){
if($_GET['action']=="remove"){
    foreach ($_SESSION['cart'] as $key=>$value){
        if($value['product_id']==$_GET['id']){
            unset($_SESSION['cart'][$key]);
            echo "<script> alert('Product has been Removed') </script>";
            echo "<script> window.location='cart.php'</script>";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="projectt.css">
    <script src="https://kit.fontawesome.com/f237661d57.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="basy">

    <div class="birinshi">
        <div class="search-box">
            <input class="search-txt" type="text" name="" placeholder="Type to search">
            <a class="search-btn" href="#">
                <i class="fas fa-search"></i>
            </a>
        </div>

        <div class="current">
            Current
            <select name="select" id="select">
                <option value="">USD</option>
                <option value="">EURO</option>
                <option value="">KZT</option>
            </select>
        </div>
    </div>
    <div></div>
    <div class="ekinshi">

        <div class="eki"><a href="registrationfrom.php" style="font-size: 12px; color: white;">
                <i class="fas fa-user"></i></a>
        </div>
        <div class="ush"><a href="#" style="font-size: 12px; color: white;">
                <i class="fas fa-shopping-basket"></i></a>
        </div>

    </div>
</div>
<div class="navbar">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="#">HOME</a></li>
        <li><a href="shop.html">SHOP</a></li>
        <li><a href="#">MUSIC</a></li>
        <li><a href="contact.html">CONTACT US</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
                <?php
                $total=0;
                if(isset($_SESSION['cart'])){
                    $product_id=array_column($_SESSION['cart'],'product_id');
                    $result=$db->getData();
                    while($row=mysqli_fetch_assoc($result)){
                        foreach ($product_id as $id){
                            if($row['id']==$id){
                                cartElement($row['product_image'],$row['product_name'],$row['price'],$row['id']);
                                $total+=$row['price'];
                            }
                        }
                    }
                }
                else{
                    echo "<h5> Cart is Empty </h5>";
                }

                ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if(isset($_SESSION['cart'])){
                        $count=count($_SESSION['cart']);
                        echo "<h6> Price ($count items)</h6>";
                        }
                        else{
                            echo "<h6>Price (0 items) </h6>";
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total;?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php echo $total?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

