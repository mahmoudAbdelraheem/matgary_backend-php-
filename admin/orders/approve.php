<?php

include '../../connect.php';

$orderId =filterRequest('orderid');
$userId =filterRequest('userid');

 $data = array(
    'order_status' => '1', //? order is approved and on the way to user 
 );

updateData('orders',$data,"order_id = '$orderId' AND order_status = 0");

//? just send notify
//sendGCM('Matgary',"Yor Order Is Approved And On The Way",$userId,'','refreshpendingorders');

//? send and insert notify
sendAndInsertNotify($userId,"Matgary","Yor Order Is Approved And On The Way","users$userId","none","refreshpendingorders");