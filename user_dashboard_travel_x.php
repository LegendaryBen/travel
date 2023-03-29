<?php
require "dbconnection.php";
$serachNull = false;
$clientsNull = false;
$result;
$result2;
$percent = "%";
$active = "active";
$num = 1;
$num2 = 1;
$pending = "pending";

if(isset($_POST['search'])){
    $searchs = htmlentities(trim($_POST['serching']));
    if(empty($searchs)){
        $serachNull = true;
    }else{
        $sql = "select `id`,`first_name`,`last_name`,`document url`,`visa type`,`passport url`,`application id`,`percentage`,`status` from users where `first_name` regexp ? or `last_name` regexp ? or `application id` regexp ? and `status` = ?";
        $stmt = mysqli_prepare($connection,$sql);
        mysqli_stmt_bind_param($stmt,"ssss",$searchs,$searchs,$searchs,$active);
        mysqli_stmt_execute($stmt);
        $final = mysqli_stmt_get_result($stmt);
        $result =  mysqli_fetch_all($final,MYSQLI_ASSOC);
    }
}else{
    $sql = "select `id`,`first_name`,`last_name`,`document url`,`visa type`,`passport url`,`application id`,`percentage`,`status` from users where `status` = ?";
    $stmt = mysqli_prepare($connection,$sql);
    mysqli_stmt_bind_param($stmt,"s",$active);
    mysqli_stmt_execute($stmt);
    $final = mysqli_stmt_get_result($stmt);
    $result =  mysqli_fetch_all($final,MYSQLI_ASSOC);
}

$sql2 = "select `id`,`first_name`,`last_name`,`visa type`,`passport url`,`status` from users where `status` = ?";
$stmt2 = mysqli_prepare($connection,$sql2);
mysqli_stmt_bind_param($stmt2,"s",$pending);
mysqli_stmt_execute($stmt2);
$final2 = mysqli_stmt_get_result($stmt2);
$result2 =  mysqli_fetch_all($final2,MYSQLI_ASSOC);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
    <title>Travel-X</title>
</head>
<body>
   <header>
        <div class="first-head">
            <div>
                <img src="images/newT.svg" alt="">
                <span>Travelx</span>
            </div>
            <a href="#"><span>Clich here to go to website's Home page</span><img src="images/at.svg"></a>
        </div>
        <div class="second-head">
            <div class="dashboard">
                Dashboard  
            </div>
            <form action="user_dashboard_travel_x.php" method="post" class="form1">
                <input type="text" name="serching" id="" class="text" placeholder="Search">
                <input type="submit" name="search" value="submit" class="submit">
                <img src="images/search.svg" alt="" class="search3">
            </form>
        </div>
        <div class="third-head">
            <div class="clients">
                Clients
            </div>
            <div class="applicants">
                Submitted Applications
            </div>
        </div>

        <?php if($serachNull == true) { ?>
        <div class="warning">
            <div>
                Your search input was empty! , check properly.
                <span class="span">&#88;</span>
            </div>
        </div>
        <?php } ?>

        <?php if(isset($_GET['error'])&& (!empty($_GET['error']))) { ?>
        <div class="warning">
            <div>
                <?php echo htmlentities($_GET['error'])?>
                <span class="span">&#88;</span>
            </div>
        </div>
        <?php } ?>


        <div class="last">
            <img src="images/caution.svg" alt="">
            <span>Please remember to save any changes you make on any profile</span>
        </div>
   </header>
   <div class="container">
     <div class="container-first">
        
        <?php if(!empty($result)){?>
        <?php foreach($result as $key){?>
        <div class="users">
            <div class="u-first">
                <div>
                    <span><?php echo $num?></span>
                    <img src="<?php echo $key['passport url'];?>" alt="">
                </div>
                <div>
                    <div class="name"><?php echo $key['first_name']." ".$key['last_name']?></div>
                    <div class="visa">Visa type: <?php echo $key['visa type']?></div>
                </div>
                <div class="edit">
                    <a href="edit.php?num=<?php echo $key["id"];?>"><img src="images/edit.svg" alt=""></a>
                    <a href="download.php?check=<?php echo $key["document url"];?>" class="download">download</a>
                </div>
            </div>
            <div class="u-second">
                <div>
                    <?php echo $key['application id']?>
                    <img src="images/options2.svg" alt="">
                </div>
            </div>
            <div class="u-third">
                <div>
                    <div class="edit">Edit</div>
                    <form action="update.php" class="form2" method="post">
                        <div>
                            <input type="number" class="write" placeholder="Enter percentage" name="text">
                        </div>
                        <div class="submit2">
                            <input type="submit" value="Save" class="save" name="save">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $key['id']?>">
                    </form>
                </div>
                <div class="loader">
                    <div class="main-loader" style="width:<?php echo $key['percentage'].$percent;?>">
                        <div class="count1"><?php echo strval($key['percentage'] ).$percent;?></div>
                    </div>
                </div>
            </div>
            <div class="u-fourth">
                 <div>Status :</div>
                <span><?php echo $key['status']?></span>
            </div>
        </div>
        <?php $num++?>
        <?php }?>
        <?php }?>
     </div>
     <div class="container-last">
        <?php if(!empty($result2)){;?>
        <?php foreach($result2 as $key2){;?>
        <div class="users">
            <div class="u-first">
                <div>
                    <span><?php echo $num2 ?></span>
                    <img src=" <?php echo $key2['passport url'];?> " alt="">
                </div>
                <div>
                    <div class="name"><?php echo $key2['first_name']." ".$key['last_name']?></div>
                    <div class="visa">Visa type: <?php echo $key2['visa type']?></div>
                </div>
                <div class="edit">
                    <a href="edit.php?num=<?php echo $key2["id"];?>"><img src="images/edit.svg" alt=""></a>
                </div>
            </div>
            <div class="u-second">
                <div style="background-color: #EB3800;">
                    <a href="generate.php?num=<?php echo $key2["id"];?>" style="color:white;text-decoration:none;font-family: 'Montserrat';font-style: normal;font-weight: 600;font-size: 12px;">Generate id</a>
                </div>
            </div>
            <div class="u-third">
                <div>
                    <div class="edit">Edit</div>
                    <form action="" class="form2">
                        <div style="border: 1px solid #E0E0E0;
                        border-radius: 3px;height: 40px;">
                            
                        </div>
                        <div class="submit2" style="display:flex;justify-content:center;align-items:center;width: 58px;
                        height: 37px;background: #BEBEBE;border-radius: 6px; font-family: 'Montserrat';font-style: normal;font-weight: 600;font-size: 14px;line-height: 17px;color: #F2F2F2;">
                            Save
                        </div>
                    </form>
                </div>
                <div class="loader">
                    <div class="main-loader" style="background: #BEBEBE;width:3%;">
                    </div>
                </div>
            </div>
            <div class="u-fourth">
                 <div>Status :</div>
                <span style="background: rgba(235, 56, 0, 0.1);color: #EB3800;"><?php echo $key2['status']?></span>
            </div>
        </div>
        <?php $num2++?>
        <?php }?>
        <?php }?>

     </div>
   </div>
   <script src="scripts/dashboard.js"></script>

   <script>

         function queryA(a){
            return document.querySelectorAll(a);
        }

        let span1 = queryA(".span");
        let container = query(".container");

        for(let spans of span1){
            spans.addEventListener("click",function(){
                spans.parentNode.parentNode.style.display = "none";
                container.style.marginTop = "280px"
            })
        }

   </script>

   <script>

         function queryA(a){
            return document.querySelectorAll(a);
        }

        let write = queryA(".write");

        for(let input of write){
            let show = input.parentNode.parentNode.children[1].children[0];

            input.addEventListener("focus",function(){
                show.style.backgroundColor = "rgb(235, 56, 0)";
            })

        }
        
   </script>

</body>
</html>