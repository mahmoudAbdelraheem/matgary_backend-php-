<?php

include '../../connect.php';

$orderId =filterRequest('orderid');
$userId =filterRequest('userid');
$deliveryId = filterRequest('deliveryid'); //! from sharedprefs

 $data = array(
    'order_status' => '2', //? order is approved and be prepered 
    'order_delivery_id' => $deliveryId,
 );

updateData('orders',$data,"order_id = '$orderId' AND order_status = 1");


//? send and insert notify
sendAndInsertNotify($userId,"Matgary","Yor Order Is On The Way","users$userId","none","refreshpendingorders");

//? just send notify to admin to know that the order is on the way to the customer
//? admin for admin topic
sendGCM('Matgary',"The Order ( no.$orderId ) Is On The Way",'admin','none','none');

//? just send notify to all delivery to know that the order will be deliver by delivery man no 00
//? delivery for delivery topic
sendGCM('Delivery',"The Order ( no.$orderId ) Will be Deliverd by ( no.$deliveryId )",'delivery','none','none');


//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,