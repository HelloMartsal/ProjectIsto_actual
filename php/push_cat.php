<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $category = $_POST["category_name"];
    try {
        require_once 'dbc.php';
        require_once 'push_cat_model.php';
        require_once 'push_cat_view.php';
        require_once 'push_cat_control.php';
        require_once 'config_sess.php';
        if(fetch_category($conn,$category)){
            $_SESSION['error']="category exists";
            header("Location:../add_cat_item.php");
        }
        else{       
        $_SESSION['category'] = $category;
        push_new_category($conn,$category);
        $conn=null;
        $check=null;
        header("Location:../add_cat_item.php");
        die();}
    } catch(PDOException $e){
        die("Query failed:". $e->getMessage());
    }
    

}else{
   header("Location:../index.php"); 
}
?>