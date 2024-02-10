<?php

include "../connect.php";

$name = filterRequest('name');
$email = filterRequest('email');
$phone = filterRequest('phone');
$pass = filterRequest('password');
//? Hash the password
//$hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
 //? random vrefiy code form 5 digits 
$vrefiyCode = rand(10000,99999);


$stmt = $con->prepare("SELECT * FROM `users` WHERE `user_email` = ? OR `user_phone` =?");

$stmt->execute(array($email,$phone));

$count =$stmt->rowCount();

if($count >0){
    printFaliure('Email Or Phone is Existing');
}else {
    $data = array(
        "user_name"=>$name,
        "user_email"=> $email,
        "user_phone"=>$phone,
        "user_password"=>$pass,
        "user_vrefiycode"=>$vrefiyCode,
        
    );
    //? send vrefiy code to user email
    //sendEmail($email , "vrefiy code for matgary app" , "welcom your vrefiy code is $vrefiyCode");
    //?save user data to my db
    insertData('users' , $data);
}