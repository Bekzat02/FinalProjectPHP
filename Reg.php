<?php

header('Content-Type: application/json');

if (
    !empty($_POST["emaill"]) && !empty($_POST["name"]) &&
    !empty($_POST["surname"]) && !empty($_POST["passwordd"])
) {
    $email = $_POST["emaill"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $pass = $_POST["passwordd"];
    
    require_once "link.php";

    $stmt = $link->prepare("INSERT INTO players (name, surname, email, password, img, birthday)
         
        VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",  $name, $surname, $email, $pass, $img, $birthday);
    /* execute query */
    $stmt->execute();
    

    /* Get the result */
    $result = $stmt->get_result();
    
    
    if($result==null) {
        json_encode($return = array(
        'message' => "success"
    )); 
    }
    else{
        $return = array(
            'errorMessage' => "Error."
        );
    }
    $stmt->close();
}
else{
    $return = array(
        'errorMessage' => "Login attempt denied."
    );
    http_response_code(403);
}
echo (json_encode($return));