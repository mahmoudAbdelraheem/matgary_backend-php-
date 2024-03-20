<?php

include "../connect.php";

$CartOrderId = filterRequest('id');

getAllData('ordersdetaisview',"cart_order_id = '$CartOrderId'");