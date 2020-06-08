<?php
if(empty($_POST["email"])&&!empty($_POST["password"])){
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $conn=new Database(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

    $link=$conn->connect();

    $stmt=$link->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss",$email,$pass);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
    if($row!=null){
        $return=array(
            'email'=>$row['email'],
            'fullname'=>$row['fname'].' '.$row['sname'],
            'password'=>$row['password'],
            'img'=>$row['img'],
            'birthdate'=>$row['birthdate']
        );
    }
}
