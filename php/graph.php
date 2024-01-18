<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        require_once 'dbc.php';
        require_once 'graph_model.php';
        require_once 'graph_view.php'; 
        require_once 'graph_control.php';
        require_once 'config_sess.php';
        $results = pull_off_req_data($conn);
        send_data($results);
        $conn = null;
        $stmt = null;
        die();
    } catch (Exception $e) {
        echo "Query failed." . $e->getMessage();
    }
} else {
    header('../index.php');
}

?>