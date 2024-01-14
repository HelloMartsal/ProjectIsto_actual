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
if (isset($_GET['show_new_item'])) {
    show_new_item();
}
?>