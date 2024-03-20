<?php
//? get user on demand orders
include "../connect.php";

$userId = filterRequest('id');

 getAllData('orderview' , "order_user_id = '$userId' AND order_status = 0 OR order_status = 1");
