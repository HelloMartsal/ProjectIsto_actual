<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $username1 = $_POST["username"];
    $password1 = $_POST["password"];

    try {
        require_once 'dbc.php';
        require_once 'login_model.php';
        require_once 'login_view.php';
        require_once 'login_control.php';
        $errors = [];
        if (isfilled($username1,$password1)){
            $errors["field_empty"]="Fields are empty";
        }
        if(!find_username($conn,$username1)){
            $errors["wrong_username"]="The credentials are wrong";
        }else {
            echo 'correct user';
        }
        if(!compare_pass($conn,$username1,$password1)){
            $errors["wrong_password"]="The credentials are wrong";
        }
        require_once 'config_sess.php'; //Ξεκινάμε session
        if ($errors){
            session_unset();
            regenerate_session_whid();
            unset($_SESSION["login_errors"]);         
            $_SESSION["login_errors"] = $errors;
            
            header("Location:../login_page.php");
            die();           
        }
        session_unset();
        regenerate_session_whid();
        $userdata = fetch_user($conn,$username1);
        $_SESSION["user_id"]=$userdata["user_id"];
        $_SESSION["user_type"]=$userdata["usertype"];
        $_SESSION["username"]=$userdata["username"];
        direct_to_page();
        $conn=null;
        $check = null;
        die();
    } catch(PDOException $e){
        die("Query failed:". $e->getMessage());
    }
    

}else{
   header("Location:../index.php"); 
}
?>