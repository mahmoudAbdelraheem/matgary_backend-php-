<?php 


include "../connect.php";

$userId = filterRequest('userid');
$userAddress = filterRequest('useraddress');
$orderType = filterRequest('ordertype');
$paymentMethod = filterRequest('paymentmethod');
$shippingPrice = filterRequest('shippingprice');
$orderPrice = filterRequest('orderprice');
$couponId = filterRequest('couponid');

$data = array(
    'order_user_id' => $userId,
    'order_user_address' => $userAddress,
    'order_type' => $orderType,
    'order_payment_method' => $paymentMethod,
    'order_shipping_price' => $shippingPrice,
    'order_price' => $orderPrice,
    'order_coupon' => $couponId,
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