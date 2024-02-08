<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){

    try {
        require_once 'dbc.php';
        require_once 'config_sess.php';
        require_once 'organize_model.php';
        require_once 'organize_view.php';
        require_once 'organize_control.php';   
        if(isset($_POST["add"])){
        check_item_add($conn,$_POST['item_name'],$_POST['quantity']);
        }
        if(isset($_POST["change"])){
        check_item_change($conn,$_POST['item_name2'],$_POST['quantity2']);
        }
        if(isset($_POST["remove"])){
        check_item_remove($conn,$_POST['item_name3'],$_POST['quantity3']);
        }
        $conn=null;
        $check=null;
        header("Location:../base.php");
        die();
    }catch(PDOException $e){
    die("Query failed:". $e->getMessage());
    }

}else{
    header("Location:../index.php"); 
}
?>