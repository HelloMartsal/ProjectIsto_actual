<?php
declare(strict_types=1);

function update_coordinates(object $conn, float $lat,float $log){
    set_coordinates($conn,$lat,$log);
}

?>