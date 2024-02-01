<?php

include "../connect.php";

$email = filterRequest('email');
$pass = filterRequest('password'); //? new password

$data = array(
    "password" => $pass,
);

updateData('users' ,$data ,"email = '$email'");