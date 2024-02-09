<?php
declare(strict_types=1);

function check_item_add(object $conn,string $name,int $quantity){
if(!fetch_item($conn,$name)){
no_item();
$_SESSION['error']="error";   
}
elseif(!select_quan_from_name($conn,$name)){
 $id = intval(fetch_id_name($conn,$name));
  if(!fetch_id($conn,$id)){
  insert_base($conn,$quantity,$id);
  }
  else{ 
  add_quan($conn,$quantity,$id,0);
  }
}
else{ 
$id = intval(fetch_id_name($conn,$name));
$quan = select_quan_from_name($conn,$name);
add_quan($conn,$quantity,$id,$quan);
}
}

function check_item_change(object $conn,string $name,int $quantity){
if(!fetch_item($conn,$name)){
no_item2();
$_SESSION['error2']="error"; 
}
elseif(select_quan_from_name($conn,$name)!=0){
$id = intval(fetch_id_name($conn,$name));
add_quan($conn,$quantity,$id,0);
}
elseif(select_quan_from_name($conn,$name)==0){
$id = intval(fetch_id_name($conn,$name));
add_quan($conn,$quantity,$id,0);
}
}

function check_item_remove(object $conn,string $name,int $quantity){
if(!fetch_item($conn,$name)){
no_item3();
$_SESSION['error3']="error"; 
}
elseif(select_quan_from_name($conn,$name)){
$id = intval(fetch_id_name($conn,$name));
$quan = select_quan_from_name($conn,$name);
 if($quan >= $quantity){
   remove_quan($conn,$quantity,$id,$quan);
 }
 else{
 er_quant();
 $_SESSION['quant']="error";
 }
}
}

?>