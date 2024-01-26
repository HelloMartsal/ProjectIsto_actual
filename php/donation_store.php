<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $items = $_POST['items'];
    $items = json_decode($items,true);
    try {
        require_once 'dbc.php';
        require_once 'donation_store_model.php';      
        require_once 'donation_store_control.php';
        require_once 'config_sess.php';
        $user_id = $_SESSION["user_id"];
        push_new_offer($conn, $user_id, $items);

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