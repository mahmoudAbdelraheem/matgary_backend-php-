<?php

include "../connect.php";

$orderId = filterRequest('id');
$rating = filterRequest('rating');
$comment = filterRequest('comment');

$data = array(
    "order_rating" => $rating,
    "order_rating_note" => $comment,
);

updateData('orders',$data,"order_id = '$orderId'");