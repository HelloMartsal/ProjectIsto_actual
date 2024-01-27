<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);
    $name = $data['name'];
    $details = json_encode($data['details']);
    $category = $data['category'];
    try {
        require_once 'dbc.php';
        require_once 'push_pro_model.php';
        require_once 'push_pro_view.php';
        require_once 'push_pro_control.php';
        require_once 'config_sess.php';
        
        $_SESSION['category'] = $category;
        $_SESSION['name'] = $name;
        $_SESSION['details'] = $details;
        if(item_exists($conn,$name)){
            print_item_exists_error();
            unset($_SESSION['name']);
            unset($_SESSION['category']);
            unset($_SESSION['details']);
            die();
        }
        $id_cat = find_category_by_name($conn,$category);
        if (!$id_cat){
            print_category_error();
            unset($_SESSION['name']);
            unset($_SESSION['category']);
            unset($_SESSION['details']);
            die();
        } 
        push_new_item($conn,$name,$id_cat,$details);
        show_new_item();
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