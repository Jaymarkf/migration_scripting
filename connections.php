<?php

$host = "localhost";
$username = "root";
$pwd = "r00tb33r";
$db = "migration_page";
$conn = mysqli_connect($host,$username,$pwd,$db);
if(!$conn){
    die("connection database error" .mysqli_connect_error());
}


