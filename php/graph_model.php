<?php
declare(strict_types=1);
function pull_off($conn){
    $sql = "SELECT * FROM offers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $off = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $off;
}

function pull_req($conn){
    $sql = "SELECT * FROM request";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $req;
}

function pull_fin_off($conn){
    $sql = "SELECT * FROM finished_offers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $fin_off = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $fin_off;
}

function pull_fin_req($conn){
    $sql = "SELECT * FROM finished_requests";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $fin_req = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $fin_req;
}
?>