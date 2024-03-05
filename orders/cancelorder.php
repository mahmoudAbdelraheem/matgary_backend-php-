<?php
//? cancle order and make order status = 3
include "../connect.php";


$orderId = filterRequest('orderid');
$userId = filterRequest('userid');

$data = array(
    'order_status' => '3',
);

updateData('orders',$data , "order_id = '$orderId'  AND order_user_id = '$userId'");