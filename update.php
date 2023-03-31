<?php
require "dbconnection.php";
if(isset($_POST['save'])){
    $id = $_POST['id'];
    $text = $_POST['text'];

    if(empty($id)){
        header("location:user_dashboard_travel_x.php");
        exit;
    }

    if(empty($text)){
        header("location:user_dashboard_travel_x.php?error=check your inputs. Inputs cannnot be letters");
        exit;
    }

    if($text > 100){
        header("location:user_dashboard_travel_x.php?error=Input value cannot cannot exceed 100%");
        exit;
    }

    $sql = "update users set `percentage` = ? where `id` = ?";
    $stmt = mysqli_prepare($connection,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$text,$id);
    $check = mysqli_stmt_execute($stmt);

    if(!$check){
        header("location:error.php");
        exit;
    }

    header("location:user_dashboard_travel_x.php");
    exit;
}else{
    header("location:user_dashboard_travel_x.php");
}