<?php

include "../connect.php";

$userId = filterRequest('id');

//? get all data in cart view table
$data = getAllData('cartview',"cart_user_id = '$userId'",null , false);

//? for calc total item price and total item count
$stmt = $con->prepare("SELECT SUM(itemprice) AS total_price , SUM(itemcount) AS total_count
FROM cartview WHERE cartview.cart_user_id = $userId
GROUP BY cart_user_id");

$stmt->execute();

$totalPriceCountData = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(
    array(
        "status" => "success",
        "data" =>$data,
        "totlaPriceCount" => $totalPriceCountData,
        )
);

