<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: user_profile.php");
    return;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            $(".submit").click(function (event) {
                event.preventDefault();
                $.ajax('authorization.php', {
                    type: 'POST',
                    data: {
                        email: $(".email").val(),
                        password: $(".password").val()
                    },
                    accepts: 'application/json; charset=utf-8',
                    success: function (data) {
                        if (data.message == 'success') {
                            window.location.href = "theme.php";
                        }
                    },
                    error: function (errorData) {
                        var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        $("#errormsg").text('Error' + msg + ', ' + errorData.status);

                        $(".errormsg").show();
                    }
                });

            });
            $(".register").click(function (e) {
                e.preventDefault();
                $.ajax('Reg.php', {
                    type: 'POST',
                    data: {
                        email: $(".email").val(),
                        fname: $(".fname").val(),
                        sname: $(".sname").val(),
                        pass: $(".password").val(),
                        img: $(".avatar").val()
                    },
                    accepts: 'application/json; charset=utf-8',

                    success: function (data) {

                        if (data.message == 'success') {
                            window.location.href = "signin.php";
                        }
                    },
                    error:function (errorData) {
                        alert('failed');
                        var msg=(errorData.responseJSON!=null)? errorData.responseJSON.errorMessage:'';
                        $("#errormsg").text('Error'+msg+', '+errorData.status);

                        $("#errormsg").show();
                    }
                });
            });
        });
    </script>


</head>
<body>
<?php include_once('theme.php'); ?>

<div class="container container-login row m-4">

    <div class="row">
        <div class="container-fluid pl-4">

            <h1>Authorisation</h1>
            <form action="" method="post">
                <label for="">Email address</label><br>
                <input type="email" placeholder="Enter email" name="email" required>
                <p>We'll never share your email with anyone else</p>
                <label>Password</label><br>
                <input type="password" name="Password" placeholder="Password" required><br><br>
                <button class="btn btn-primary" name="submit">Submit</button>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="container-fluid pl-4 ml-4" onclick="">

            <h1>Registration</h1>
            <form action="" method="post">
                <label for="">Email </label><br>
                <input type="email" placeholder="Enter email" name="email" required><br><br>
                <label>First name</label><br>
                <input type="text" name="fname" placeholder="Enter First name" required><br><br>
                <label>Second name</label><br>
                <input type="text" name="sname" placeholder="Enter Second name"><br><br>
                <label>Password</label><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <label>URL Avatar</label><br>
                <input type="text" placeholder="avatar" name="img"><br><br>
                <label for="">Birth date</label><br>
                <input type="text" name="birthdate--" id=""><br><br>
                <button class="btn btn-success" name="register">Registrate</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>