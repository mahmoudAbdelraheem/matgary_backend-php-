<?php

include '../../connect.php';

$orderId =filterRequest('orderid');
$userId =filterRequest('userid');

 $data = array(
    'order_status' => '3', //? order is deliver seccussfuly and go to archived orders
 );

updateData('orders',$data,"order_id = '$orderId' AND order_status = 2");

//? just send notify
//sendGCM('Matgary',"Yor Order Is Approved And On The Way",$userId,'','refreshpendingorders');

//? send and insert notify
sendAndInsertNotify($userId,"Matgary","Yor Order Is Deliver Seccussfuly","users$userId","none","refreshpendingorders");

//? just send notify to admin to know that the order is on the way to the customer
//? admin for admin topic
sendGCM('Matgary',"The Order ( no.$orderId ) Is Deliverd Successfuly",'admin','none','none');

//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,