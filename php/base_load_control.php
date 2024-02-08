<?php
declare(strict_types=1);

function pull_offers($conn){
    $user_id = $_SESSION["user_id"];
    $user_id = (int)$user_id;
    $result  = get_offers_of_user($conn, $user_id);
    move_offer($conn, $user_id);
    remove_offers($conn, $user_id);
    return $result;    
}

function decode_to_base($conn){
    $result = pull_offers($conn);
    update_base($conn, $result);
}

function encode_to_request($conn){
    $user_id = $_SESSION["user_id"];
    $user_id = (int)$user_id;
    $result = get_request_by_user($conn,$user_id);
    $result = get_agro($result);
    set_state_request($conn,$user_id);
    remove_items_from_base($conn, $result);

}
function get_agro(array $array){
    $agro_array = [];
    foreach($array as $row=>$value1){
       $people = $value1["people"]; 
        foreach($value1['items'] as $key=>$value){
            if(array_key_exists($value["id_item_l"],$agro_array)){
                $agro_array[$value["id_item_l"]] += $people;
            } else {
                $agro_array[$value["id_item_l"]] = $people;
            }
        }
    }
    $agro_table = [];
    foreach($agro_array as $key=>$value){
        $agro_table[] = ["item"=>$key,"quant"=>$value];
    }
    return $agro_table;
}
?>