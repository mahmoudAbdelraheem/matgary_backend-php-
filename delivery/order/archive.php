<?php
//? get user on demand orders
include "../../connect.php";

$deliveryId = filterRequest('id');

 getAllData('orderview' , "1=1 AND order_status = 3 AND order_delivery_id = $deliveryId");


//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,