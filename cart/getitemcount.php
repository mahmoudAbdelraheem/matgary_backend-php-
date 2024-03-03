<?php

include '../connect.php';

$userId = filterRequest('userid');
$itemId = filterRequest('itemid');

$stmt = $con->prepare("SELECT COUNT(cart.cart_id) AS itemcount FROM cart WHERE cart_user_id =? AND cart_item_id =? AND cart_order_id =0");

$stmt->execute(array($userId , $itemId));

$count = $stmt->rowCount();
$data  = $stmt->fetchColumn();
if($count >0){
     echo json_encode(array("status" => "success", "data" => $data));     
}else {
    echo json_encode(array("status" => "success", "data" => '0'));
}