<?php
declare(strict_types=1);
function check_category(object $conn,array $data){
    $numArray = array();
    foreach($data['categories'] as $categ){   
      if(!fetch_category($conn,$categ['category_name'])){
        $keeps =intval($categ['id']);
        $ct = $keeps;
         while(fetch_cat_id($conn,$ct)){
            $ct = $ct +1;
           }                
        
        $keepl =$ct;
        insert_cat_url($conn,$ct,$categ['category_name']);
        $numArray[] = array($keeps, $keepl);
        }      
    }
    return $numArray;
}

function check_item(object $conn,array $data){
    foreach($data['items'] as $item){   
        $id = intval($item['id']);
        $category = intval($item['category']);
        $details = json_encode($item['details']);
      if(!fetch_item($conn,$item['name'])){
         while(fetch_item_id($conn,$id)){
            $id= $id +1;
           }
        insert_item_url($conn,$id,$category,$item['name'],$details);
        }                  
    }  
}

function update_items(object $conn,array $array,array $data){
  foreach($data['items'] as $item){
    foreach ($array as $row){
      if($item['category'] == $row[0]){
        update($conn,$row[1],$row[0],$item['name']);
      }
    }
   }
}
?>