<?php
//? get user on demand orders
include "../connect.php";

$deliveryId = filterRequest('id');

 getAllData('orderview' , "1=1 AND order_status = 10 OR (order_status = 1 AND order_delivery_id = $deliveryId)");
