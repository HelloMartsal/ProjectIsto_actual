<?php
declare(strict_types=1);
@session_start();
function no_item(){
    if(isset($_SESSION['error'])){
        echo "Δεν υπάρει στον πίνακα item το συγκεκριμένο item";
        unset($_SESSION['error']);
    }
}
function no_item2(){
    if(isset($_SESSION['error2'])){
        echo "Δεν υπάρει στον πίνακα item το συγκεκριμένο item";
        unset($_SESSION['error2']);
    }
}
function no_item3(){
    if(isset($_SESSION['error3'])){
        echo "Δεν υπάρει στον πίνακα item το συγκεκριμένο item";
        unset($_SESSION['error3']);
    }
}

function er_quant(){
    if(isset($_SESSION['quant'])){
        echo "H ποσότητα που αφαιρείται υπερβαίνει την υπάρχουσα";
        unset($_SESSION['quant']);
    }
}