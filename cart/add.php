<?php

include '../connect.php';

$userId = filterRequest('userid');
$itemId = filterRequest('itemid');

$count = getData("cart","cart_user_id  = '$userId' AND cart_item_id = '$itemId'",null , false);

// if($count> 0 ){
//     //? update item count
// }else {
    //? add item to cart
    $data = array(
        "cart_user_id" => $userId,
        "cart_item_id" => $itemId,
    );
    insertData("cart" , $data);
// }