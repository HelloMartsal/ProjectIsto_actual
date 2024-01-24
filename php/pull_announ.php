<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        require_once 'dbc.php';
        require_once 'pull_announ_model.php';
        require_once 'pull_announ_view.php';
        require_once 'pull_announ_control.php';
        require_once 'config_sess.php';
        $result = pull_announment($conn);
        send_announ($result);
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