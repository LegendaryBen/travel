<?php

require "dbconnection.php";

if(isset($_POST['submit'])){
    $id = htmlentities(trim($_POST['nums']));

    if(!empty($id)){
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
        $passport_number = htmlentities(trim( $_POST['passport_number']));
        $issue_date = htmlentities(trim($_POST['issue_date']));
        $country_of_issue = htmlentities(trim($_POST['country_of_issue']));
        $expiry =  htmlentities(trim($_POST['expiry_date']));
        $country_of_choice =htmlentities(trim( $_POST['country_of_choice']));
        $service_agent = "George Dennis";
        $emails =  htmlentities($_POST['email']);
    
        if(empty($first_name)||empty($last_name)||empty($nationality)||empty($dob)||empty($lang)||empty($phone)||empty($cor)||empty($sex)||empty($marital)||empty($occupation)||empty($visa)||empty($passport_number)||empty($issue_date)||empty($country_of_issue)||empty($expiry)||empty($country_of_choice)||empty($id)||empty($emails)){
            header("location:edit.php?error=some inputs fields are empty, check properly!&&nums=$id");
            exit;
        }else{
            
            $sql = "update users set `first_name` = ?,`last_name`= ?,`nationality` = ?,`date_of_birth`=?,`language`=?,`phone`=?,`country of residence`=?,`sex`=?,`marital status`=?,`visa type`=?,`passport number`=?,`issue date`=?,`country of issue`=?,`expiry date`=?,`country of choice`=?,`occupation`=?,`email`=? where `id` = ?";
    
            $stm = mysqli_prepare($connection,$sql);

            if(!$stm){
                header("location:error.php");
                exit;
            }
      
            mysqli_stmt_bind_param($stm,"sssssssssssssssssi",$first_name,$last_name,$nationality,$dob,$lang,$phone,$cor,$sex,$marital,$visa,$passport_number,$issue_date,$country_of_issue,$expiry,$country_of_choice,$occupation,$emails,$id);

            $final = mysqli_stmt_execute($stm);
                
            if(!$final){
                header("location:error.php");
                exit;
            }

            header("location:user_dashboard_travel_x.php");
            exit;
        }
    }else{
        header("location:error.php");
    }

}else{
    header("location:error.php");
    exit;
}