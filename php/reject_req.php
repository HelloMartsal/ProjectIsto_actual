<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $ids = $data['savior_id'];
    $idr = $data["id_req"];
    try {
        require_once 'dbc.php';
        require_once 'config_sess.php';
        $update = "UPDATE request SET savior_id = null WHERE savior_id = :id AND 
        id_req = :idr";
        $check = $conn->prepare($update);
        $check->bindParam(":id", $ids);
        $check->bindParam(":idr", $idr);
        $check->execute();
        
        $conn = null;
        $check = null;
        die();
        
    } catch (PDOException $e) {
            // Log or display the error message
            die("Query failed: " . $e->getMessage());
        }
}else{
    header("Location:../index.php"); 
 }
?>