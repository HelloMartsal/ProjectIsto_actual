<?php
declare(strict_types=1);
@session_start();
function show_new_category(){
    if(isset($_SESSION['category'])){
        $category = $_SESSION['category'];
        echo "<p>Η κατηγορία με όνομα: " . $category . " έχει προστεθεί στη βάση δεδομένων.</p>";
        unset($_SESSION['category']);
    }

}