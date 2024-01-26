<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $type = $_POST["type"];
    try {
        require_once 'dbc.php';
        require_once 'base_load_model.php';
        require_once 'base_load_control.php';
        require_once 'config_sess.php';
        decode_to_base($conn);
        
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