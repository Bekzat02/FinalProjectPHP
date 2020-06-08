<?php
$db=mysqli_connect("localhost","root","","register_bd");
if($db==false){
    echo mysqli_connect_error();
}
$c=mysqli_query($db,"SELECT * FROM users");
$a=mysqli_fetch_all($c,MYSQLI_ASSOC);
echo $a;