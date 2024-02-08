<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        require_once 'dbc.php';
        require_once 'config_sess.php';
        require_once 'pull_task_model.php';
        require_once 'pull_task_control.php';
        require_once 'pull_task_view.php';
        $dataType = $_GET['dataType'];
        if ($dataType == 'offers') {
        $result = pull_task_offer($conn);
        send_task($result);
    } else if ($dataType == 'requests') {
        $result = pull_task_request($conn);
        send_task($result);
    }
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