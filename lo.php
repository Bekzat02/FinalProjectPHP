<?php

class Database
{

    // specify your own database credentials
    private $connection;

    function connect($host, $username, $password, $database)
    {
        $this->connection = mysqli_connect($host, $username, $password,$database);
    }

    function showLoginForm()
    {
        return ('<form action="" method="post"><h1 align="center">Login form</h1>
                  Name<input type="text" name="username"><br>
                  Password<input type="password" name="password">
                  <input type="submit" name="submit">
        ');
    }
    public function login($username,$password){
        $sql="select *from login"."where login='".$username."'and password='".$password."'";
        echo ($sql);
        $result=mysqli_query($sql);
        return $result;
    }
}
$obj=new database;
$obj->connect('localhost','root','','login');
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
<?php if(isset($_POST['submit'])){
    if($obj->login($_POST['username'],$_POST['password'])){
        echo ("<h1 align='center'>:)You are inside System</h1>");
    }
    else{
        echo ($obj->showLoginForm());
    }
}
else{
    echo ($obj->showLoginForm());
}
?>
    </body>
    </html>
<?php
