<?php
declare(strict_types=1);

function isfilled(string $username,string $password,string $onoma,string $lastname,string $phonenum){
    if(empty($username)||empty($password)|| empty($onoma)||empty($lastname) ||empty($phonenum)){
        return true;
    }else{
        return false;
    }
}
function username_taken(object $conn,string $username){
    if (fetch_username($conn,$username)) {
        return true;
    } else {
        return false;
    }
    
}
function create_savior_profile(object $conn,string $username1,string $password1,string $onoma, string $lastname,string $phonenum,string $salt,string $pepper){
    set_savior_profile($conn,$username1,$password1,$onoma,$lastname,$phonenum,$salt,$pepper);
}

function hashpassfunc(string $password){
    $salt = bin2hex(random_bytes(16));
    $pepper = "SuperSecureOrganicPepper";
    $passtohash = $password . $salt . $pepper;
    $hashedpass = hash("sha256",$passtohash);
    return [$hashedpass,$salt,$pepper];
}
?>