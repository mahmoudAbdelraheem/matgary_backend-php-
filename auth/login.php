<?php

include "../connect.php";

$email = filterRequest('email');
$pass = filterRequest('password');

//$hashedPassword = password_hash($pass, PASSWORD_BCRYPT); //! sha1 for encrype password

//?
// $stmt = $con->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` =? AND `user_approve` = 1");

// $stmt->execute(array($email,$pass));

// $count =$stmt->rowCount();

// if($count > 0){
//     printSuccess('login success');
// }else {
//     printFaliure('Email Or Password Not Correct');
// }

//? useing getdata func

getData("users", "user_email = ? AND user_password =?", array($email, $pass));