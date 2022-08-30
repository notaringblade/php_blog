<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "my_blogs";

    $con = mysqli_connect($host, $user, $password,$dbname);

    if (!$con) {
        echo "Database is not Connected." .mysqli_connect_error();
    }
?>