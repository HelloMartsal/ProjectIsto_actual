<?php
@session_start();
session_unset();
var_dump($_SESSION);
header("Location:../index.php");
?>