<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $username1 = $_POST["username"];
    $password1 = $_POST["password"];
    $onoma = $_POST["name"];
    $lastname = $_POST["lastname"];
    $phonenum = $_POST["Phonenumber"];

    try {
        require_once 'dbc.php';
        require_once 'savior_sign_up_model.php';
        require_once 'savior_sign_up_view.php';
        require_once 'savior_sign_up_control.php';
        $errors = [];
        if (isfilled($username1,$password1,$onoma,$lastname,$phonenum)){
            $errors["field_empty"]="Fields are empty";
        }
        if(username_taken($conn,$username1)){
            $errors["username_taken"]="This username is already in use";
        }

        require_once 'config_sess.php'; //Ξεκινάμε session

        if ($errors){            
            $_SESSION["sign_up_errors"] = $errors;
            header("Location:../create_savior_page.php");
            die();           
        }
        $pwd = hashpassfunc($password1);
        create_savior_profile($conn,$username1,$pwd[0],$onoma,$lastname,$phonenum,$pwd[1],$pwd[2]);  
        $_SESSION["temp_user"]=$username1; 
        header("Location:../process_coordinates_page.php");
        $conn=null;
        $check=null;
        die();
    } catch(PDOException $e){
        die("Query failed:". $e->getMessage());
    }
    

}else{
   header("Location:../index.php"); 
}
?>