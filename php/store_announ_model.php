<?php
declare(strict_types=1);

function store_announ(object $conn,string $title,string $content,string $currentDate,array $items){
    var_dump($currentDate);
    $select = "INSERT INTO announcements(title,text,time) VALUES (:title,:content,:date)";
    $check = $conn->prepare($select);
    $check->bindParam(":title",$title);
    $check->bindParam(":content",$content);
    $check->bindParam(":date",$currentDate);
    $check->execute();
    $select = "SELECT id_ann FROM announcements WHERE title = :title and text = :content";
    $check = $conn->prepare($select);
    $check->bindParam(":title",$title);
    $check->bindParam(":content",$content);
    $check->execute();
    $result=$check->fetch(PDO::FETCH_ASSOC);
    $id_ann = $result["id_ann"];
    foreach($items as $item){
        $select = "INSERT INTO announ_product(id_ann_match,id_pro_match) VALUES (:id_ann,:item)";
        $check = $conn->prepare($select);
        $check->bindParam(":id_ann",$id_ann);
        $check->bindParam(":item",$item);
        $check->execute();
    }

}
?>