<?php

include "../connect.php";

$email = filterRequest('email');
$pass = filterRequest('password');
//$pass = sha1($_POST['password']); //! sha1 for encrype password

//?
$stmt = $con->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` =?");

$stmt->execute(array($email,$pass));

$count =$stmt->rowCount();

if($count > 0){
    printSuccess('login success');
}else {
    printFaliure('Email Or Password Not Correct');
}