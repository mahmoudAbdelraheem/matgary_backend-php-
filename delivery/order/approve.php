<?php

include '../../connect.php';

$orderId =filterRequest('orderid');
$userId =filterRequest('userid');
$deliveryId = filterRequest('deliveryid'); //! fron sharedprefs

 $data = array(
    'order_status' => '1', //? order is approved and be prepered 
    'order_delivery_id' => $deliveryId,
 );

updateData('orders',$data,"order_id = '$orderId' AND order_status = 10");

//? just send notify
//sendGCM('Matgary',"Yor Order Is Approved And On The Way",$userId,'','refreshpendingorders');

//? send and insert notify
sendAndInsertNotify($userId,"Matgary","Yor Order Is On The Way","users$userId","none","refreshpendingorders");

//? just send notify to admin to know that the order is on the way to the customer
//? admin for admin topic
sendGCM('Matgary',"The Order ( no.$orderId ) Is On The Way",'admin','none','none');

//? just send notify to all delivery to know that the order will be deliver by delivery man no 00
//? delivery for delivery topic
sendGCM('Matgary',"The Order ( no.$orderId ) Will be Deliverd by ( no.$deliveryId )",'delivery','none','none');
