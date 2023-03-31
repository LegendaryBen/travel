<?php

require "dbconnection.php";

if(isset($_POST['submit'])){

    $first_name = htmlentities(trim($_POST['first_name']));
    $last_name =  htmlentities(trim($_POST['last_name']));
    $nationality = htmlentities(trim($_POST['nationality']));
    $dob =  htmlentities(trim( $_POST['date_of_birth']));
    $lang = htmlentities(trim($_POST['langu']));
    $phone =   htmlentities(trim($_POST['phone'])) ;
    $cor =  htmlentities(trim($_POST['country_of_residence'])); 
    $sex = htmlentities(trim( $_POST['sex'])); 
    $marital =  htmlentities(trim($_POST['marital_status']));
    $occupation = htmlentities(trim($_POST['occupation']));
    $visa =  htmlentities(trim($_POST['visa']));
    $status = "pending";
    $percentage = "0";
    $passport_number = htmlentities(trim( $_POST['passport_number']));
    $issue_date = htmlentities(trim($_POST['issue_date']));
    $passport_url =  htmlentities(trim($_FILES['pass']['name']));
    $country_of_issue = htmlentities(trim($_POST['country_of_issue']));
    $expiry =  htmlentities(trim($_POST['expiry_date']));
    $country_of_choice =htmlentities(trim( $_POST['country_of_choice']));
    $application_id = "empty";
    $document_url =  htmlentities(trim($_FILES['doc']['name']));
    $service_agent = "George Dennis";

    if(empty($first_name)||empty($last_name)||empty($nationality)||empty($dob)||empty($lang)||empty($phone)||empty($cor)||empty($sex)||empty($marital)||empty($occupation)||empty($visa)||empty($passport_number)||empty($issue_date)||empty($passport_url)||empty($country_of_issue)||empty($expiry)||empty($country_of_choice)||empty($document_url)){
        header("location:apply.php?error=some inputs fields are empty, check properly!");
        exit;
    }

    $fileType = $_FILES["pass"]["type"];

    if($fileType == "image/jpeg"){
        $fileType = $_FILES["doc"]["type"];
        if($fileType == "application/pdf"){

            $passname =  stripslashes("uploads/".time().$passport_url);

            $docname =  stripcslashes("uploads/".time().$document_url);

            $temp1 = $_FILES["pass"]["tmp_name"];

            $temp2 = $_FILES["doc"]["tmp_name"];

            if(move_uploaded_file($temp1, $passname) && move_uploaded_file($temp2, $docname)){
                $sql = "insert into users(`first_name`,`last_name`,`nationality`,`date_of_birth`,`language`,`phone`,`country of residence`,`sex`,`marital status`,`occupation`,`visa type`,`status`,`percentage`,`passport number`,`issue date`,`passport url`,`country of issue`,`expiry date`,`country of choice`,`application id`,`document url`,`service agent`) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stm = mysqli_prepare($connection,$sql);

                if(!$stm){
                    unlink($passname);
                    unlink($docname);
                    header("location:error.php");
                    exit;
                }

                mysqli_stmt_bind_param($stm,"ssssssssssssssssssssss",$first_name,$last_name,$nationality,$dob,$lang,$phone,$cor,$sex,$marital,$occupation,$visa,$status,$percentage,$passport_number,$issue_date,$passname,$country_of_issue,$expiry,$country_of_choice,$application_id,$docname,$service_agent);
                
                $final = mysqli_execute($stm);
                
                if(!$final){
                    unlink($passname);
                    unlink($docname);
                    header("location:error.php");
                    exit;
                }

                echo " uploaded succefully";

            }else{
                header("location:error.php");
                exit;
            }

        }else {
            header("location:apply.php?error= upload a  pdf file");
            exit;
        }
    }else{
        header("location:apply.php?error= upload a jpeg or png file!");
        exit;
    }
}else{
    header("location:apply.php");
    exit;
}