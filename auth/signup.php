<?php

include "../connect.php";

$name = filterRequest('name');
$email = filterRequest('email');
$phone = filterRequest('phone');
$pass = filterRequest('password'); 
//$pass = sha1($_POST['password']); //! sha1 for encrype password
 //? random vrefiy code form 5 digits 
$vrefiyCode = rand(10000,99999);


$stmt = $con->prepare("SELECT * FROM `users` WHERE `email` = ? OR `phone` =?");

$stmt->execute(array($email,$phone));

$count =$stmt->rowCount();

if($count >0){
    printFaliure('Email Or Phone is Existing');
}else {
    $data = array(
        "name"=>$name,
        "email"=> $email,
        "phone"=>$phone,
        "password"=>$pass,
        "vrefiycode"=>$vrefiyCode,
        
    );
    //? send vrefiy code to user email
    //sendEmail($email , "vrefiy code for matgary app" , "welcom your vrefiy code is $vrefiyCode");
    //?save user data to my db
    insertData('users' , $data);
}