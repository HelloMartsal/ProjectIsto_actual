<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        require_once 'dbc.php';
        require_once 'savior_map_model.php';
        require_once 'savior_map_view.php'; 
        require_once 'savior_map_control.php';
        require_once 'config_sess.php';
        $results = get_all_data($conn); 
        send_data($results);
        $conn = null;
        $check = null;
        die();
    } catch (Exception $e) {
        echo "Query failed." . $e->getMessage();
    }
} else {
    header('../index.php');
}

?>