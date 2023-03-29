<?php

require "dbconnection.php";

if(isset($_GET["num"])){
    
    if(empty($_GET['num'])){
        header("location:user_dashboard_travel_x.php");
        exit;
    }

    $val = htmlentities($_GET['num']);
    $active = "active";
    $sql1 = "select `first_name`,`id` from users where `id` = ?";
    $stmt1 = mysqli_prepare($connection,$sql1);
    mysqli_stmt_bind_param($stmt1,"s",$val);
    mysqli_stmt_execute($stmt1);
    $final = mysqli_stmt_get_result($stmt1);
    $result =  mysqli_fetch_all($final,MYSQLI_ASSOC);
    $newId = strval($result[0]['id']).$result[0]['first_name'];

    $sql2 = "update users set `application id` = ?,`status`=? where id = ?";
    $stmt2 = mysqli_prepare($connection,$sql2);
    mysqli_stmt_bind_param($stmt2,"ssi",$newId,$active,$val);
    mysqli_stmt_execute($stmt2);
    header("location:user_dashboard_travel_x.php");
    exit;


}else{
    header("location:user_dashboard_travel_x.php");
    exit;
}