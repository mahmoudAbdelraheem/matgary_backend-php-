<?php

include "../connect.php";

$email = filterRequest('email');
$pass = filterRequest('password'); //? new password

$data = array(
    "user_password" => $pass,
);

updateData('users' ,$data ,"user_email = '$email'");