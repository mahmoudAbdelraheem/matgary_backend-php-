<?php

include "../connect.php";

$search = filterRequest('search');

//! getAllData('items1view' , "item_name LIKE '%$search%' OR item_name_ar LIKE '%$search%'");
$stmt = $con->prepare("SELECT items1view.* ,(item_price - (item_price * item_discount /100)) as item_discount_price 
FROM items1view 
WHERE item_name LIKE '%$search%' OR item_name_ar LIKE '%$search%';
");

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }

    