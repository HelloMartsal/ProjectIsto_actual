<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
$url = $_POST["url"];
    try {
        require_once 'dbc.php';
        require_once 'load_url_model.php';
        require_once 'load_url_view.php';
        require_once 'load_url_control.php';
        require_once 'config_sess.php';
        $json = @file_get_contents($url);
        if ($json === false) {
            $_SESSION['url_error'] = "Failed to open the provided URL.";
            header("Location:../add_cat_item.php");
            die();
        }
        $data = json_decode($json, true);
        if ($data === null) {
            $_SESSION['url_error'] = "The url is not valid";
            header("Location:../add_cat_item.php");
            die();
        }
        $array = check_category($conn,$data);
        check_item($conn,$data);
        update_items($conn,$array,$data);
        while(count($array)>0){
        array_pop($array);
        }
        $conn=null;
        $check=null;
        header("Location:../add_cat_item.php");
        die();
    } catch(PDOException $e){
        die("Query failed:". $e->getMessage());
    }
    

}else{
   header("Location:../index.php"); 
}
?>
