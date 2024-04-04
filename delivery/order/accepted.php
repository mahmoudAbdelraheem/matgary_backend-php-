<?php
//? get all acceptedorders
include "../../connect.php";

$deliveryId = filterRequest('id');

 getAllData('orderview' , "order_status = 2 AND order_delivery_id = $deliveryId");

 //? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,