<?php
declare(strict_types=1);
@session_start();
function show_new_item(){
    if(isset($_SESSION['name']) && isset($_SESSION['category']) && isset($_SESSION['details'])){
        $name = $_SESSION['name'];
        $category = $_SESSION['category'];
        $details = $_SESSION['details'];
        $details = json_decode($details,true);
        echo "<p>Το προϊόν με όνομα: " . $name . " και κατηγορία: " . $category . " έχει προστεθεί στη βάση δεδομένων με τα ακόλουθα χαρακτηριστικά: " . print_r($details, true) . "</p>";
        unset($_SESSION['name']);
        unset($_SESSION['category']);
        unset($_SESSION['details']);
    }

}

function print_item_exists_error(){
    $name = $_SESSION['name'];
    echo "<p>Το προϊόν " . $name . " υπάρχει ήδη στη βάση δεδομένων</p>";
}
function print_category_error(){
    $category = $_SESSION['category'];
    echo "<p>Η κατηγορία " . $category . " δεν υπάρχει στη βάση δεδομένων</p>";
}
?>