<?php
declare(strict_types=1);

function pull_offers(object $conn){
    $offers = get_offers($conn);
    return $offers; 
}

function pull_requests(object $conn){
    $requests = get_requests($conn);
    return $requests;
}

function pull_users(object $conn){
    $users = get_user($conn);
    return $users;
}

function pull_base(object $conn){
    $base = get_base($conn);
    return $base;
}

function get_all_data(object $conn){
    $offersData = pull_offers($conn);
    $requestsData = pull_requests($conn);
    $usersData = pull_users($conn);
    $baseData = pull_base($conn);

    $allData = [
        'offers' => $offersData,
        'requests' => $requestsData,
        'users' => $usersData,
        'base' => $baseData
    ];

    return $allData;
}

?>