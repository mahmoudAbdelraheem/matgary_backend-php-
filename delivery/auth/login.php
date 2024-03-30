<?php

include "../connect.php";

$email = filterRequest('email');
$pass = filterRequest('password');

//$hashedPassword = password_hash($pass, PASSWORD_BCRYPT); //! sha1 for encrype password

//?

//? useing getdata func

getData("delivery", "delivery_email = ? AND delivery_password =?", array($email, $pass));