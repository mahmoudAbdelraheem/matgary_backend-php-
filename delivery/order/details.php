<?php

include "../../connect.php";

$CartOrderId = filterRequest('id');

getAllData('ordersdetaisview',"cart_order_id = '$CartOrderId'");

//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,