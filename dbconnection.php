<?php

$dbname = "travel_x";
$user = "root";
$pass = "";
$host = "localhost";


$connection = mysqli_connect($host,$user,$pass,$dbname);

if(!$connection){
    die("failed to conect".mysqli_connect_error());
}

