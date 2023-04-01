<?php
require "dbconnection.php";

if(isset($_POST['submit'])){

    $visa = htmlentities(trim($_POST['visa']));
    $id =  htmlentities(trim($_POST['id']));

    if(empty($visa)||empty($id)){
        header("location:status.php?error=some input fields where empty, check properly!");
        exit;
    }

    $sql = "select * from users where `application id` =? and `visa type` = ? ";

    $stmt = mysqli_prepare($connection,$sql);

    mysqli_stmt_bind_param($stmt,"ss",$id,$visa);
    mysqli_stmt_execute($stmt);

    $final = mysqli_stmt_get_result($stmt);
    $result2 = mysqli_fetch_all($final,MYSQLI_ASSOC);

    if(empty($result2)){
        header("location:status.php?error=user not found, check your id properly!");
        exit;
    }

}else{

    header("location:status.php");
    exit;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
    <title>Travel-X</title>
</head>
<body>
    <div class="ham-menu">
        <div class="head">
            <div>
                <img src="images/logo.svg" alt="" class="logo1">
                <span>Travelx</span>
            </div>
            <img src="images/cancel.svg" alt="" class="cancle">
        </div>
        <div class="clicks">
            <div>
                <a href="index.php">Home</a>
            </div>
            <div>
                <a href="index.php#visas">Visas</a>
            </div>
            <div>
                <a href="status.php">Application Status</a>
            </div>
            <div>
                <a href="about.php">About Us</a>
            </div>
            <div>
                <a href="#">Contact</a>
            </div>
        </div>
        <div class="clicks2">
            <a class="third" href="apply.php">Apply Now</a>
        </div>
    </div>
    <header>
        <div class="first">
            <a href="index.php">
                <img src="images/logo.svg" alt="" class="log">
                <div>Travel x</div>
            </a>
        </div>
        <div class="second">
            <a href="index.php">Home</a>
            <a href="index.php">Visas</a>
            <a href="status.php">
                <div>Application</div>
                <div>Status</div>
            </a>
            <a href="about.php">About Us</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <a  class="third toggle" href="apply.php">Apply Now</a>
            <img src="images/black-ham.svg"  alt="" class="ham"> 
        </div>
    </header>
    <div class="section1">
        <img src="images/canada.jpg" style="width:100px;height:100px;object-fit:contain;"><br>Government Of Canada<br>
        Gouvernement du Canada
    </div>
    <div class="section2">
        <div>
            <img src="<?php echo $result2[0]['passport url']?>" alt="">
            <div class="details">
                <div> <?php echo $result2[0]['first_name']." ".$result2[0]['last_name']?> </div>
                <div>Visa Type : <?php echo $result2[0]['visa type']?> visa</div>
            </div>
        </div>
    </div>
    <div class="warning">
        <div>
            Warning! This site is very sensitive and only for the owner of this application
            <span class="span">&times;</span>
        </div>
    </div>
    <div class="user-details">
        <div>
            <div class="applicant">
                <div>
                    Applicant's Information
                </div>
            </div>
            <div class="next">
                <div class="information">
                    <span>
                        Surname:
                    </span>
                    <span>
                        <?php echo $result2[0]['first_name']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        First name:
                    </span>
                    <span>
                    <?php echo $result2[0]['last_name']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        Nationality:
                    </span>
                    <span>
                    <?php echo $result2[0]['nationality']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        Passport number:
                    </span>
                    <span>
                    <?php echo $result2[0]['passport number']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        D.O.B:
                    </span>
                    <span>
                    <?php echo $result2[0]['date_of_birth']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        Phone number:
                    </span>
                    <span>
                    <?php echo $result2[0]['phone']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        Application ID:
                    </span>
                    <span>
                    <?php echo $result2[0]['application id']?>
                    </span>
                </div>
                <div class="information">
                    <span>
                        Service agent:
                    </span>
                    <span>
                    <?php echo $result2[0]['service agent']?>
                    </span>
                </div>
                <div class="last">
                    <span>
                        Status:
                    </span>
                    <span>
                    <?php echo $result2[0]['status']?>
                    </span> 
                </div>
            </div>
        </div>
    </div>
    <div class="loader">
        <div>
            <div class="load" style="width:<?php echo $result2[0]['percentage']."%"?>">
                <div >
                <?php echo $result2[0]['percentage']."%"?>
                </div>
            </div>
        </div>
    </div>
    <div class="notice">
        <div>
            <div>
                <span>Note:</span> For any enquiries or help, please contact your service agent
                <div class="close">&times;</div>
            </div>
        </div>  
    </div>
    <footer>
        <div>
            <span>Travelx</span>
        </div>
        <div>
            <a href="index.php#visas">Visas</a>
            <a href="apply.php">Apply Now</a>
            <a href="status.php">Check Application Status</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <span>&copy;2022 Travelx. All rights reserved</span>
        </div>
    </footer>
    <script src="scripts/error.js"></script>
    <script src="scripts/close.js"></script>
</body>
</html>