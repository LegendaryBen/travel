<?php

if(isset($_GET['check'])){
    $path = htmlentities($_GET['check']);
    $file3 = substr($path,7);

    header("Content-type:application/force-download");
    header("Content-Disposition:attachment; filename=\"$file3\"");
    readfile($path);

}else{
    header("location:user_dashboard_travel_x.php");
}