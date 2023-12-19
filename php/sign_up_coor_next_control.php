<?php
declare(strict_types=1);


function direct_to_page(){
    if (isset($_SESSION["user_type"])){
        if ($_SESSION["user_type"]==="citizen"){
            header("Location:../citizen.php");
        }else if ($_SESSION["user_type"]==="savior"){
            header("Location:../savior.php");
        }else if ($_SESSION["user_type"]==="admin"){
            header("Location:../admin.php");
        }
        die();
    }else {
        header("Location:../login_page.php");
        die();
    }
}
?>