<?php

include "../connect.php";

$userId= filterRequest('userid');
$addressName= filterRequest('name');
$city= filterRequest('city');
$street= filterRequest('street');
//? for user address location
$lat= filterRequest('lat');
$lang= filterRequest('lang');

$data = array(
    "address_user_id" => $userId,
    "address_name" => $addressName,
    "address_city" => $city,
    "address_street" => $street,
    "address_lat" => $lat,
    "address_long" => $lang,
);

insertData("address",$data);