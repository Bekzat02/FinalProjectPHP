<?php
session_start();
require_once('php/component.php');
require_once ('php/CreateDb.php');

$database=new CreateDb("riseup","products");

if (isset($_POST['add'])) {
/// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");
        print_r($item_array_id);
        print_r($_SESSION['cart']);
        if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script> alert('Product is already added in the cart!') </script>";
            echo "<script>window.location='chelsea.php' </script>";
        }
        else{
            $count=count($_SESSION['cart']);

            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count]=$item_array;
        }
    }

    else {

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
        <li><a href="projectt.css">HOME</a></li>
        <li><a href="projectt.css">HOME</a></li>
        <li><a href="shop.html">SHOP</a></li>
        <li><a href="#">MUSIC</a></li>
        <li><a href="contact.html">CONTACT US</a></li>
    </ul>
</div>
<div class="container">
    <div class="row text-center py-5">
        <?php
       $result=$database->getData();
       while($row=mysqli_fetch_assoc($result)){
           component($row['product_name'],$row['price'],$row['product_image'],$row['id']);
       }
         ?>
    </div>
</div>