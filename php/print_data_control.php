<?php
declare(strict_types=1);
function send_data(array $results){ //TODO BGALE TA EPIKINDINA DEDOMENA
    $jsonData = json_encode($results);
    header('Content-Type: application/json');
    echo $jsonData;
}

?>