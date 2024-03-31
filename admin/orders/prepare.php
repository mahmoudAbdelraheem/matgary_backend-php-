<?php

include '../../connect.php';

$orderId =filterRequest('orderid');
$userId =filterRequest('userid');
$orderType = filterRequest('ordertype');

//? 0 for delivery
if($orderType =='0'){

    $data = array(
    'order_status' => '10', //? order is approved and prepare 
 );
 

}else {
   //? 1 for recive
    $data = array(
    'order_status' => '2', //? order is approved and prepare 
 );

}



updateData('orders',$data,"order_id = '$orderId' AND order_status = 0");

//? just send notify
//sendGCM('Matgary',"Yor Order Is Approved And On The Way",$userId,'','refreshpendingorders');

//? send and insert notify
sendAndInsertNotify($userId,"Matgary","Yor Order Is Approved And Prepare","users$userId","none","refreshpendingorders");


//? just send notify to all delivery ther is an order been prepare
//! delivery for all delivery topic
if($orderType =='0'){
sendGCM('Matgary',"There Is A New Order Need To Deliver",'delivery','none','none');
}
