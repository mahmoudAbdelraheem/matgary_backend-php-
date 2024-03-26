<?php 


include "../connect.php";

$userId = filterRequest('userid');
$userAddress = filterRequest('useraddress');
$orderType = filterRequest('ordertype');
$paymentMethod = filterRequest('paymentmethod');
$shippingPrice = filterRequest('shippingprice');
$orderPrice = filterRequest('orderprice');
$couponId = filterRequest('couponid');
$couponDiscount = filterRequest('coupondiscount');

if($orderType == '1'){
    $shippingPrice = 0;
}


$orderTotalPrice = $orderPrice + $shippingPrice;
//? check coupon 
//? current date
$now = date("Y-m-d H:i:s");


$checkCoupon =  getAllData('coupon' , "coupon_id = '$couponId' AND 	coupon_expire_date > '$now' AND coupon_count> 0",null,false);

//? if coupon is not expired
if($checkCoupon>0){
    $orderTotalPrice = $orderTotalPrice - ($orderPrice *$couponDiscount /100 );

    $stmt= $con->prepare("UPDATE coupon SET coupon_count = coupon_count -1 WHERE coupon_id = ?");
    $stmt->execute(array($couponId));
}

$data = array(
    'order_user_id' => $userId,
    'order_user_address' => $userAddress,
    'order_type' => $orderType,
    'order_payment_method' => $paymentMethod,
    'order_shipping_price' => $shippingPrice,
    'order_price' => $orderPrice,
    'order_total_price' => $orderTotalPrice,
    'order_coupon' => $couponId,
    'order_coupon_discount' => $couponDiscount,
);

$count = insertData('orders' , $data, false);

if($count >0){
    $stmt = $con->prepare("SELECT MAX(order_id) FROM orders");
    $stmt->execute();
    $maxId = $stmt->fetchColumn();

    $data = array(
        'cart_order_id' => $maxId,
    );
    updateData('cart' , $data,"cart_user_id = '$userId' AND cart_order_id =0");
}