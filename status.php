<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/status.css">
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
                <a>Application Status</a>
            </div>
            <div>
                <a href="about.php">About Us</a>
            </div>
            <div>
                <a href="#">Contact</a>
            </div>
        </div>
        <div class="clicks2">
            <a>Apply Now</a>
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
            <a>
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
    <div class="section1">
        Check Your Application Status
    </div> 
    <div class="section2">
        You may now be able to check the status of your Immigration or study application online. 
        It depends on what you applied for.<br>
        If you can't check your status online, you can use processing times to find out how long it might take to<br>
        process your application..
    </div>
    <div class="section3">
        Answer the questions below to check your application status.
    </div>
    <div class="section4">
       <div class="star">
            &lowast;
       </div>
       <div class="rest">
         What did you apply for? <span> (required)</span>
       </div>
    </div>

    <?php if(isset($_GET['error'])){?>
    <div class="warning">
        <div>
            <?php echo htmlentities($_GET['error'])?>
            <span class="span">&times;</span>
        </div>
    </div>
    <?php } ?>

    <form action="user.php" method="post">
        <img src="images/up-select.svg" alt="" class="img1">
        <img src="images/down-select.svg" alt="" class="img2">
        <label for="">Visa type</label><br>
        <select name="visa">
            <option value="study">Study Visa</option>
            <option value="transit">Transit Visa</option>
            <option value="travel">Travel Visa</option>
            <option value="work">Work Visa</option>
        </select>
        <input type="text" name="id" id="" placeholder="Enter your application ID here..." class="input">
        <input type="submit" value="submit" name="submit" class="submit">
    </form>
    <footer>
        <div>
            <span>Travelx</span>
        </div>
        <div>
            <a href="index.php#visas">Visas</a>
            <a href="apply.php">Apply Now</a>
            <a>Check Application Status</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <span>&copy;2022 Travelx. All rights reserved</span>
        </div>
    </footer>
    <script src="scripts/error.js"></script>

    <?php if(isset($_GET['error'])){?>
    <script src="scripts/close1.js"></script>
    <?php }?>

</body>
</html>