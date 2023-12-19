<?php
$host = "127.0.0.1"; 
$dbname = "mydatabase";
$usename = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $usename, $password);  //adikimeno pou sindeetai stin vasi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //to sfalma to pernw apo to pdo den einai ena geniko exception
} catch(PDOException $e){
        die("connection failed:". $e->getMessage());
    }
?>