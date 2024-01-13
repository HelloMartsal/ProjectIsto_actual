<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        require_once 'dbc.php';
        require_once 'print_data_model.php';
        require_once 'print_data_control.php';
        $dataType = $_GET['dataType'];
        if ($dataType == 'categories') {
            $result = get_category($conn);
            send_data($result);
        } else if ($dataType == 'items') {
            $result = get_items($conn);
            send_data($result);
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


