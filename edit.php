<?php
require "dbconnection.php";

if(isset($_GET['nums'])){

    if(empty($_GET['nums'])){
        header("error.php");
        exit;
    }else
        $var = htmlentities($_GET['nums']);
        $sql = "select * from users where `id` =? ";
        $stmt = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($stmt,"i",$var);
        mysqli_stmt_execute($stmt);

        $final = mysqli_stmt_get_result($stmt);
        $result2 = mysqli_fetch_all($final,MYSQLI_ASSOC);

        if(empty($result2)){
            header("location:error.php");
            exit;
        }

    }

else{
    header("location:user_dashboard_travel_x.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/apply.css">
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
            <a class="third">Apply Now</a>
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
            <a href="index.php#visas">Visas</a>
            <a href="status.php">
                <div>Application</div>
                <div>Status</div>
            </a>
            <a href="about.php">About Us</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <a  class="third toggle">Apply Now</a>
            <img src="images/black-ham.svg"  alt="" class="ham"> 
        </div>
    </header>
    <div class="section-2 sec2-1">
        <div class="section2-container sec2-11">
            <div>
                Edit User
            </div>
            <div>
                start your application process by filling the form below with the<br>
                appropriate documents 
            </div>
        </div>
    </div>
    <div class="section1">
        <div class="sec1-container">
            <div></div>
            <a class="sec1-first">1</a>
        <a class="sec1-second">2</a>
        </div>
    </div>

    <?php if(isset($_GET['error'])){ ?>

    <div class="warning">
        <div>
            <?php echo stripslashes( htmlentities($_GET['error'] ) ) ; ?>
            <span class="span">&#88;</span>
        </div>
    </div>

    <?php } ?>

    <div class="form-container">
        <form action="verifyedit.php" method="post">
            <div class="form-first">
                <div>
                    <div class="form-first1">
                        <div class="divs">
                            <label>First name</label><br><br>
                            <input type="text" name="first_name" id="" placeholder=" Name" class="first-name" value="<?php echo $result2[0]['first_name'];?>">
                        </div>
                        <div class="divs">
                            <label>Nationality</label><br><br>
                            <input type="text" name="nationality" id="" placeholder="e.g Finnish " class="nationality" value="<?php echo $result2[0]['nationality'];?>">
                        </div>
                        <div class="divs">
                            <label>Date of birth</label><br><br>
                            <input type="text" name="date_of_birth" id="" placeholder="DD / MM / YY " class="birth" value="<?php echo $result2[0]['date_of_birth'];?>">
                        </div>
                        <div class="divs">
                            <label>Language</label><br><br>
                            <input type="text" name="langu" id="" placeholder="e.g English" class="language" value="<?php echo $result2[0]['language'];?>">
                        </div>
                        <div class="divs">
                            <label>Phone number</label><br><br>
                            <input type="text" name="phone" id="" placeholder="Phone number" class="phone" value="<?php echo $result2[0]['phone'];?>">
                        </div>
                    </div>
                    <div class="form-first2">
                        <div class="divs">
                            <label>Last name</label><br><br>
                            <input type="text" name="last_name" id="" placeholder="Surname" class="last-name" value="<?php echo $result2[0]['last_name'];?>">
                        </div>
                        <div class="divs">
                            <label>Country of residence</label><br><br>
                            <input type="text" name="country_of_residence" id="" placeholder="country" class="country" value="<?php echo $result2[0]['country of residence'];?>">
                        </div>
                        <div class="divs">
                            <label>Sex</label><br><br>
                            <input type="text" name="sex" id="" placeholder="e.g Male" class="sex" value="<?php echo $result2[0]['sex'];?>">
                        </div>
                        <div class="divs">
                            <label>Marital status</label><br><br>
                            <input type="text" name="marital_status" id="" placeholder="e.g Single" class="marital" value="<?php echo $result2[0]['marital status'];?>">
                        </div>
                        <div class="divs">
                            <label>Occupation</label><br><br>
                            <input type="text" name="occupation" id="" placeholder="e.g Farmer" class="occupation" value="<?php echo $result2[0]['occupation'];?>">
                        </div>
                        <div class="divs">
                            <label>Visa Type</label><br><br>
                            <select name="visa">
                                <option value="study">Study Visa</option>
                                <option value="transit">Transit Visa</option>
                                <option value="travel">Travel Visa</option>
                                <option value="work">Work Visa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-first1">
                        <div class="divs">
                            <label>Passport number</label><br><br>
                            <input type="text" name="passport_number" id="" placeholder="e.g 0122398436" class="passport"value="<?php echo $result2[0]['passport number'];?>" >
                        </div>
                        <div class="divs">
                            <label>Issue date</label><br><br>
                            <input type="text" name="issue_date" id="" placeholder="MM / YY" class="issue" value="<?php echo $result2[0]['issue date'];?>">
                        </div>
                    </div>
                    <div class="form-first2">
                        <div class="divs">
                            <label>Country of issue</label><br><br>
                            <input type="text" name="country_of_issue" id="" placeholder="country of issue" class="country1" value="<?php echo $result2[0]['country of issue'];?>">
                        </div>
                        <div class="divs">
                            <label>Expiry date</label><br><br>
                            <input type="text" name="expiry_date" id="" placeholder="MM / YY" class="expire" value="<?php echo $result2[0]['expiry date'];?>">
                        </div>
                        <div class="divs">
                            <label>email</label><br><br>
                            <input type="text" name="email" id="" placeholder="e.g mrjohndoe@gmail.com" class="occupation" value="<?php echo $result2[0]['email'];?>">
                        </div>
                        <div class="divs">
                            <label>Country of choice</label><br><br>
                            <input type="text" name="country_of_choice" id="" placeholder="e.g Germany" class="choice" value="<?php echo $result2[0]['country of choice'];?>">
                        </div>
                        <input type="hidden" name="nums" value="<?php echo htmlentities($_GET['nums'])?>">
                    </div>
                </div>
            </div>
            <div class="form-second">
                <div>
                    <a class="next">
                        <div class="next1">Next</div>
                        <span>&gt;</span>
                    </a>
                    <a class="back">
                        <span>&lt;</span>
                        <div>Back</div>
                    </a>
                </div>
                <div>
                    <input type="submit" name="submit" value="submit" class="submit">
                </div>
            </div>
        </form>
    </div>
    <footer>
        <div>
            <span>Travelx</span>
        </div>
        <div>
            <a href="index.php">Visas</a>
            <a>Apply Now</a>
            <a href="status">Check Application Status</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <span>&copy;2022 Travelx. All rights reserved</span>
        </div>
    </footer>
    <script src="scripts/edit.js"></script>

    <?php if(isset($_GET['error'])){ ?>
    <script>
        function query(a){
            return document.querySelector(a);
        }

        function listener(funcName,funcType,funcElement){
            funcElement.addEventListener(funcType,funcName);
        }

        let span1 = query(".span");
        listener(hideDiv,"click",span1);
    </script>
     <?php } ?>

</body>
</html>