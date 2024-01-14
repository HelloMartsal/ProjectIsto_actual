<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);
    $name = $data['name'];
    $details = json_encode($data['details']);
    try {
        require_once 'dbc.php';
        require_once 'push_pro_model.php';
        require_once 'push_pro_view.php';
        require_once 'push_pro_control.php';
        require_once 'config_sess.php';
        $category = intval($data['category']);
        // TODO : check if the item already exists
        $_SESSION['category'] = $category;
        $_SESSION['name'] = $name;
        $_SESSION['details'] = $details;
        push_new_item($conn,$name,$category,$details);
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