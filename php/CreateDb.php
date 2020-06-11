<?php


class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $tablename;
    public $dbname;
    public $con;

    public function __construct(
        $dbname = "riseup",
        $tablename = "products",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con) {
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        try {
            mysqli_query($this->con, $sql);

            $this->con = mysqli_connect($servername, $username, $password, $dbname);
        } catch (SQLiteException $ex) {
            return $ex = "Connection failed";
        }


    }

    public function getData()
    {
        $sql = "Select * from $this->tablename";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }

    }
}