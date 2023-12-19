<?php
declare(strict_types=1);

function update_coordinates_sign_up(object $conn, float $lat,float $log,string $usr){
    set_coordinates($conn,$lat,$log,$usr);
}

?>