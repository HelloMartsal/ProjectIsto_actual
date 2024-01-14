<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);
    $name = $data['name'];
    $category = $data['category'];
    $details = $data['details'];
    var_dump($name);
    var_dump($category);
    var_dump($details); 
    try {
        require_once 'dbc.php';
        require_once 'push_pro_model.php';
        require_once 'push_pro_view.php';
        require_once 'push_pro_control.php';
        
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