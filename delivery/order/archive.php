<?php
//? get user on demand orders
include "../connect.php";

$deliveryId = filterRequest('id');

 getAllData('orderview' , "1=1 AND order_status = 2 AND order_delivery_id = $deliveryId");
