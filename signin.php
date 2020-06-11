<?php
session_start();


if (isset($_SESSION['user'])) {
    header("Location: user_profile.php");
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JSON Example</title>
    <style>
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $("#submitbtn").click(function(event) {
                event.preventDefault();
                $.ajax('authorization.php', {
                    type: 'POST', // http method
                    data: {
                        email: $("#exampleInputEmail1").val(),
                        password: $("#exampleInputPassword1").val()
                    }, // data to submit
                    accepts: 'application/json; charset=utf-8',
                    success: function(data) {
                        if (data.message == 'success') {
                            window.location.href = "user_profile.php";
                        }
                    },
                    error: function(errorData, textStatus, errorMessage) {

                        var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        $("#errormsg").text('Error: ' + msg + ', ' + errorData.status);

                        $("#errormsg").show();
                    }
                });


            });
            $("#register").click(function(e) {

                e.preventDefault();
                $.ajax('Reg.php', {
                    type: 'POST',
                    data: {
                        emaill: $("#emaill").val(),
                        name: $("#name").val(),
                        surname: $("#surname").val(),
                        passwordd: $("#pwd").val(),
                        birthdayy: $("#birthday").val(),
                        img: $("#avatar").val()
                    }, // data to submit
                    accepts: 'application/json; charset=utf-8',
                    
                    success: function(data) {


                        if (data.message === 'success') {
                            
                            window.location.href = "signin.php";

                        }
                    },
                    error: function(errorData, textStatus, errorMessage) {
                        alert('failed');
                        var msgg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        $("#errormsgg").text('Error: ' + msgg + ', ' + errorData.status);

                        $("#errormsgg").show();
                        
                    }
                });
            });
        });
    </script>


    <script>
        $(function() {
            $('#signUp').on('click', function(e) {
                $('#form1').css('display', 'none');
                $('#form2').css('display', 'inline');
                e.preventDefault();
            })  
        })

        $(function() {
            $('#logIn').on('click', function(e) {
                $('#form2').css('display', 'none');
                $('#form1').css('display', 'inline');
                e.preventDefault();
            })
        })
    </script>

    <script>
    $(document).ready(function(){
        $('#exampleInputEmail1').bind('blur', function()
        {
            $.ajax({
                url:"main1.php",
                type:"POST",
                data:{
                    email:$('#exampleInputEmail1').val()
                },
                dataType:'html',
                beforeSend:function()
                {
                    $('#checkname').text('loading data');
                },
                success:function(data)
                {
                    data=JSON.parse(data); 
                    for (var key in data)
                            {
                                if(data['Name']=='absent')
                                {
                                   
                                    $('#checkname').removeClass('green');
                                    $('#checkname').addClass('red');
                                    $("#checkname").text('Unregistered account');
                                    $("#submitbtn").prop('disabled', true);
                                    //document.querySelector('#submit1').disabled = true;
                                    //$('submit[name="login"]').attr('disabled','true');
                                   
                                }
                                else
                                {
                                    $('#checkname').removeClass('red');
                                    $('#checkname').addClass('green');
                                    $("#checkname").text('Account exist');
                                    $("#submitbtn']").prop('disabled', false);
                                    //document.querySelector('#submit1').disabled = false;

                                }
                            }
                }
            }
                
            )
        })
    })
    </script>




</head>

<body>

    <div class="container container-login">
        <div class="row">
            <div class="col-md-6" id="form1">
                <form method="post">
                    <span class="error text-danger" id="errormsg" style="display: none"></span>
                    <div class="form-group">
                        <h2>Authorisation</h2>
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"><span id="checkname"></span><br>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitbtn">Submit</button>
                </form>
                <div>
                    <p>not a member at yet please? <a href="" id="signUp">signUp</a></p>
                </div>

                <p id='p1'></p>
            </div>




            <div class="col-md-6" id="form2">
                <form class="main" method="post">
                    <span class="error text-danger" id="errormsgg" style="display: none"></span>
                    <div class="form-group">
                        <h2>Registration</h2>
                        <label for="emaill">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                        <label for="surname">Second Name</label>
                        <input type="text" class="form-control" id="sname" placeholder="Enter Second Name">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="avatar">URL Avatar</label>
                        <input type="text" class="form-control" id="avatar" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Birthdate</label>
                        <input type="text" class="form-control" id="birthday" placeholder="">
                    </div>
                    <button class="btn btn-success" id="register">Registrate</button>
                </form>
                <div>
                    <p>Already a member please? <a href="" id="logIn">Login</a></p>
                </div>

                <p id='p1'></p>
            </div>
        </div>
    </div>

</body>

</html>