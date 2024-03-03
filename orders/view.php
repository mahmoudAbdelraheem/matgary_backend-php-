<?php

include "../connect.php";

$userId = filterRequest('id');

 getAllData('orders' , "order_user_id = '$userId'");
