<?php

include "../../connect.php";

$name = filterRequest('name');
$email = filterRequest('email');
$phone = filterRequest('phone');
$pass = filterRequest('password');
//? Hash the password
//$hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
 //? random vrefiy code form 5 digits 
$vrefiyCode = rand(10000,99999);


$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_email` = ? OR `delivery_phone` =?");

$stmt->execute(array($email,$phone));

$count =$stmt->rowCount();

if($count >0){
    printFaliure('Email Or Phone is Existing');
}else {
    $data = array(
        "delivery_name"=>$name,
        "delivery_email"=> $email,
        "delivery_phone"=>$phone,
        "delivery_password"=>$pass,
        "delivery_vrefiycode"=>$vrefiyCode,
        
    );
    //? send vrefiy code to user email
    //sendEmail($email , "vrefiy code for matgary app" , "welcom your vrefiy code is $vrefiyCode");
    //?save user data to my db
    insertData('delivery' , $data);
}