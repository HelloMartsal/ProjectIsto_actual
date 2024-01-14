<?php

    $json = file_get_contents('http://usidas.ceid.upatras.gr/web/2023/export.php');
    $obj = json_decode($json,true);
    foreach ($obj['items'] as $item) {
        echo $item['name'] . "<br>";
      }

?>
<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){

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