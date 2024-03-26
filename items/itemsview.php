<?php
include '../connect.php';

//? get category id from user to get items that belong to this category
$categoryId = filterRequest('id');
$userId = filterRequest('userid');

//?getAllData('items1view' , "cate_id = $categoryId");

$stmt = $con->prepare("SELECT items1view.* ,(item_price - (item_price * item_discount /100)) as item_discount_price FROM items1view
INNER JOIN favorite ON favorite.favorite_items_id = items1view.item_id AND favorite.favorite_users_id = $userId
WHERE cate_id = $categoryId
UNION ALL 
SELECT *, 0 AS favorite_item ,(item_price - (item_price * item_discount /100)) as item_discount_price FROM items1view
WHERE cate_id = $categoryId AND item_id NOT IN (SELECT items1view.item_id FROM items1view
INNER JOIN favorite ON favorite.favorite_items_id = items1view.item_id AND favorite.favorite_users_id = $userId)");

$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }

