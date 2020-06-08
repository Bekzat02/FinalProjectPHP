<?php

require_once "config.php";
require_once "Database.php";

$conn=new Database(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

$link=$conn->connect();
