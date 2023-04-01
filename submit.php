<?php

require "dbconnection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

if(isset($_POST['submit'])){

    $first_name = htmlentities(trim($_POST['first_name']));
    $last_name =  htmlentities(trim($_POST['last_name']));
    $nationality = htmlentities(trim($_POST['nationality']));
    $dob =  htmlentities(trim( $_POST['date_of_birth']));
    $lang = htmlentities(trim($_POST['langu']));
    $emails = htmlentities($_POST['email']);
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

    if(empty($first_name)||empty($last_name)||empty($nationality)||empty($dob)||empty($lang)||empty($phone)||empty($cor)||empty($sex)||empty($marital)||empty($occupation)||empty($visa)||empty($passport_number)||empty($issue_date)||empty($passport_url)||empty($country_of_issue)||empty($expiry)||empty($country_of_choice)||empty($document_url)||empty($emails)){
        header("location:apply.php?error=some inputs fields are empty, check properly!");
        exit;
    }

    $fileType = $_FILES["pass"]["name"];
    $fileType2 = $_FILES["doc"]["name"];
    $needed = ['jpg','jpeg','png'];
    $needed2 = ['pdf'];
    $check = $_FILES['pass']['error'];
    $check2 = $_FILES['doc']['error'];
    $type1 = explode(".",$fileType);
    $type2 = explode(".",$fileType2);
    $type1actual = strtolower(end($type1));
    $type2actual = strtolower(end($type2));

    if(in_array($type1actual,$needed)){

        if($check === 0){
            if(in_array($type2actual,$needed2)){

                if($check2 == 0){

                    $passname =  stripslashes("uploads/".time().$passport_url);

                    $docname =  stripcslashes("uploads/".time().$document_url);
        
                    $temp1 = $_FILES["pass"]["tmp_name"];
        
                    $temp2 = $_FILES["doc"]["tmp_name"];
        
                    if(move_uploaded_file($temp1, $passname) && move_uploaded_file($temp2, $docname)){
                        $sql = "insert into users(`first_name`,`last_name`,`nationality`,`date_of_birth`,`language`,`phone`,`country of residence`,`sex`,`marital status`,`occupation`,`visa type`,`status`,`percentage`,`passport number`,`issue date`,`passport url`,`country of issue`,`expiry date`,`country of choice`,`application id`,`document url`,`service agent`,`email`) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $stm = mysqli_prepare($connection,$sql);
        
                        if(!$stm){
                            unlink($passname);
                            unlink($docname);
                            header("location:error.php");
                            exit;
                        }
        
                        mysqli_stmt_bind_param($stm,"sssssssssssssssssssssss",$first_name,$last_name,$nationality,$dob,$lang,$phone,$cor,$sex,$marital,$occupation,$visa,$status,$percentage,$passport_number,$issue_date,$passname,$country_of_issue,$expiry,$country_of_choice,$application_id,$docname,$service_agent,$emails);
                        
                        $final = mysqli_execute($stm);
                        
                        if(!$final){
                            unlink($passname);
                            unlink($docname);
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
                            $mail->Subject = 'Registration';
                            $mail->Body    = '<h1>Welcome to travel-X</h1>';
                        
                            $mail->send();
        
                            header("location:success.php");
                            exit;
                            
                        } catch (Exception $e) {
                            header("location:success.php");
                            exit;
                        }
        
                    }else{
                        header("location:error.php");
                        exit;
                    }
        
                }else{
                    header("location:apply.php?error=Network error when uploading the cv");
                    exit; 
                }
            }else{
                header("location:apply.php?error=upload a pdf file");
                exit;  
            }
        }else{
            var_dump($check);
            header("location:apply.php?error=Network error when uploading the image");
            exit;
        }
    }else{
        header("location:apply.php?error=upload a jpeg, jpg or png image");
        exit;
    }

}else{
    header("location:apply.php");
    exit;
}