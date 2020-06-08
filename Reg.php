<?php
header('Content-Type: application/json');

if (
    !empty($_POST["email"]) && !empty($_POST['fname']) &&
    !empty($_POST['sname']) && !empty($_POST['password'] &&
        !empty($_POST['img']) && !empty($_POST['birthdate']))
) {
    $email = $_POST["email"];
    $name = $_POST['fname'];
    $sname = $_POST['sname'];
    $password = $_POST['password'];
    $birthday = $_POST['birthdate'];
    $img = $_POST["img"];

    require_once "link.php";

    $stmt = $link->prepare("insert into users (email,fname,sname,password,img,birthdate)
                         values (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $email, $name, $sname, $password, $img, $birthday);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result == null) {
        json_encode($return = array(
            'message' => "success"
        ));
    } else {
        $return = array(
            'errorMessage' => "Error."
        );
    }
    $stmt->close();
} else {
    $return = array(
        'errorMessage' => "Login attempt denied."
    );
    http_response_code(403);
}
echo(json_encode($return));