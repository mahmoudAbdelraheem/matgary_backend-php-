<?php

//? get user archived order
include "../connect.php";

$userId = filterRequest('id');

 getAllData('orderview' , "order_user_id = '$userId' AND order_status = 2");

