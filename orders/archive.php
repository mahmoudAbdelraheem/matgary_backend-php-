<?php

//? get user archived order
include "../connect.php";

$userId = filterRequest('id');

 getAllData('orders' , "order_user_id = '$userId' AND order_status = 2");

