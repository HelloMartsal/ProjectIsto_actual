<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $items = json_decode($_POST['items']);
        require_once 'dbc.php';
        require_once 'store_announ_model.php';
        require_once 'store_announ_control.php';
        push_announ($conn,$title,$content,$items);
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

