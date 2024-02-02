<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $items = $_POST['items'];
    $items = json_decode($items,true);
    $people = $_POST['people'];
    try {
        require_once 'dbc.php';
        require_once 'request_store_model.php';      
        require_once 'request_store_control.php';
        require_once 'config_sess.php';
        $user_id = $_SESSION["user_id"];
        push_new_request($conn, $user_id, $items, $people);
        $conn = null;
        $check = null;
        die();
    } catch (Exception $e) {
        echo "Query failed." . $e->getMessage();
    }
} else {
    // Handle non-POST requests
    echo "Invalid request method";
}
?>