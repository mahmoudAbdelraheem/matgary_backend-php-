<?php

include "../connect.php";

$couponName = filterRequest('couponname');

//? current date
$now = date("Y-m-d H:i:s");


getAllData('coupon' , "coupon_name = '$couponName' AND 	coupon_expire_date > '$now' AND coupon_count> 0");




// $stmt= $con->prepare("UPDATE coupon SET coupon_count = coupon_count -1 WHERE coupon_name = ?");

// $stmt->execute(array($couponName));





