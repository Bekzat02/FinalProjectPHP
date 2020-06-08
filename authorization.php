<?php
header('Content-Type: application/json');

if(!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    require_once "link.php";

    $stmt = $link->prepare("Select * from users where email=? and password=?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row != null && $row['email'] != null) {
        session_start();
        $_SESSION['user'] = array(
            'email' => $row['email'],
            'fname' => $row['fname'],
            'sname' => $row['sname'],
            'img' => $row['img']
        );
        $return = array(
            'message' => "success"
        );
    }
}
    else{
        $return =array(
          'errorMessage'=>"Incorrect login or password!"
        );
        http_response_code(403);
    }
    echo (json_encode($return));