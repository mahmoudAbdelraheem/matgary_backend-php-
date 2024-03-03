<?php

include '../connect.php';

$userId = filterRequest('userid');
$itemId = filterRequest('itemid');

 deleteData("cart","cart_id =( SELECT cart_id FROM cart WHERE cart_user_id  = $userId AND cart_item_id = $itemId AND cart_order_id =0 LIMIT 1)  ");
