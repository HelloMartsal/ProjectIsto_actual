<?php
declare(strict_types=1);

function isfilled(string $username,string $password){
    if(empty($username)||empty($password)){
        return true;
    }else{
        return false;
    }
}

function compare_pass(object $conn,string $username,string $password){
    $passarray = fetch_user($conn,$username);
    $cur_pass = $password . $passarray["salt"] . $passarray["pepper"];
    $cur_pass_hash = hash("sha256",$cur_pass);
    if ($passarray["pwd"]===$cur_pass_hash){
        return true;
    }else{
        return false;
    } 
}
function find_username(object $conn,string $username){
    if (fetch_user($conn,$username)){
        return true;
    }else {
        return false;
    }
}

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