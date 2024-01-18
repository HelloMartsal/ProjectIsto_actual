<?php
declare(strict_types=1);
function pull_off_req_data($conn){
    $off = pull_off($conn);
    $req = pull_req($conn);
    $fin_off= pull_fin_off($conn);
    $fin_req = pull_fin_req($conn);

    $data = array(
        "off" => $off,
        "req" => $req,
        "fin_off" => $fin_off,
        "fin_req" => $fin_req
    );

    return $data;

}
?>