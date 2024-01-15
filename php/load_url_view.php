<?php
declare(strict_types=1);
function show_url_errors(){
    if(isset($_SESSION['url_error'])){
        $url_error = $_SESSION['url_error'];
        echo "<p>Σφάλμα: " . $url_error . "</p>";
        unset($_SESSION['url_error']);
    }
}
?>