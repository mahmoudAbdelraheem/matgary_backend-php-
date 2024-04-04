<?php
//? cancle order and make order status = 3
include "../connect.php";


$orderId = filterRequest('orderid');
$userId = filterRequest('userid');

$data = array(
    'order_status' => '4',
);

updateData('orders',$data , "order_id = '$orderId'  AND order_user_id = '$userId'");

//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,