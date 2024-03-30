<?php

include "../connect.php";

$email = filterRequest('email');
$pass = filterRequest('password'); //? new password

$data = array(
    "delivery_password" => $pass,
);

updateData('delivery' ,$data ,"delivery_email = '$email'");