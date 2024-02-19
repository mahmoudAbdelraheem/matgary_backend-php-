<?php

include "../connect.php";

$addressId= filterRequest('addressid');
$addressName= filterRequest('name');
$city= filterRequest('city');
$street= filterRequest('street');
//? for user address location
$lat= filterRequest('lat');
$lang= filterRequest('long');

$data = array(
    "address_name" => $addressName,
    "address_city" => $city,
    "address_street" => $street,
    "address_lat" => $lat,
    "address_long" => $lang,
);

updateData("address",$data,"address_id =$addressId");