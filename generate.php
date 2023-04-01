<?php

require "dbconnection.php";
require "dbconnection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

if(isset($_GET["num"])){
    
    if(empty($_GET['num'])){
        header("location:error.php");
        exit;
    }

    $val = htmlentities($_GET['num']);
    $active = "active";
    $sql1 = "select `first_name`,`id`,`email`,`last_name` from users where `id` = ?";
    $stmt1 = mysqli_prepare($connection,$sql1);
    mysqli_stmt_bind_param($stmt1,"s",$val);
    mysqli_stmt_execute($stmt1);
    $final = mysqli_stmt_get_result($stmt1);
    $result =  mysqli_fetch_all($final,MYSQLI_ASSOC);

    if(empty($result)){
        header("location:error.php");
        exit;
    }

    $newId = strval($result[0]['id']).strval(789).$result[0]['first_name'];
    $first_name = $result[0]['first_name'];
    $last_name = $result[0]['last_name'];
    $emails = $result[0]['email'];

    $sql2 = "update users set `application id` = ?,`status`=? where id = ?";
    $stmt2 = mysqli_prepare($connection,$sql2);
    mysqli_stmt_bind_param($stmt2,"ssi",$newId,$active,$val);
    $check = mysqli_stmt_execute($stmt2);

    if(!$check){
        header("location:error.php");
        exit;
    }

    try {
        $mail->isSMTP();                                 
        $mail->Host       = 'smtp-relay.sendinblue.com';              
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'benjaminchima072@gmail.com';     
        $mail->Password   = '1NncsMOyaVC6Umtq';                              
        $mail->SMTPSecure = "ssl";   
        $mail->Port       = 465;       
    
        //Recipients
        $mail->setFrom('benjaminchima072@gmail.com', 'Travel-x');
        $mail->addAddress("$emails", $first_name." ".$last_name);
        $mail->isHTML(true);      
        $mail->Subject = 'User id';
        $mail->Body    = "Your travel-x status id is"." ".$newId;
    
        $mail->send();

        header("location:user_dashboard_travel_x.php");
        exit;
        
    } catch (Exception $e) {
        header("location:user_dashboard_travel_x.php");
        exit;
    }

}else{
    header("location:error.php");
    exit;
}