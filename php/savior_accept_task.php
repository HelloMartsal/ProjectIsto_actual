<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $type = $_POST['type'];
    try {
        require_once 'dbc.php';
        require_once 'savior_accept_task_model.php';
        require_once 'savior_accept_task_view.php';
        require_once 'savior_accept_task_control.php';
        require_once 'config_sess.php';
        $user_id = $_SESSION['user_id'];
        if($type == 'offer'){
            accept_offer($conn,$task_id,$user_id);
        }
        else if($type == 'request'){
            if(check_availability($conn,$task_id)){
                accept_request($conn,$task_id,$user_id);
            }
            else{
                echo "Not enough items";
                die();
            }
       }else if ($type == 'delivery'){
            deliver_request($conn,$task_id);
        }
        
        $conn = null;
        $check = null;
        die();
    } catch (Exception $e) {
        echo "Query failed." . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
?>