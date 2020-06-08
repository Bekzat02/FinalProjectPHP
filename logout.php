<?php
require "login.php";
unset($_SESSION['logged_user']);
header('Location:/');