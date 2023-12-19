<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    try {
        require_once 'dbc.php';
        function get_category($conn) {
            $select = "SELECT * FROM category;";
            $check = $conn->prepare($select);
            $check->execute();
            $result = $check->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }
        function send_data($results){ //TODO BGALE TA EPIKINDINA DEDOMENA
            $jsonData = json_encode($results);
            header('Content-Type: application/json');
            echo $jsonData;
        }
        $result = get_category($conn);
        send_data($result);
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


