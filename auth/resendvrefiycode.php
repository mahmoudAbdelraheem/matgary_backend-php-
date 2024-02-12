<?php

include "../connect.php";

$email = filterRequest('email');

 //? random vrefiy code form 5 digits 
$vrefiyCode = rand(10000,99999);


$stmt = $con->prepare("SELECT * FROM `users` WHERE `user_email` = ?");
$stmt->execute(array($email));
$count =$stmt->rowCount();

if($count >0){
    //? send vrefiy code to user email
    //sendEmail($email , "vrefiy code for matgary app" , "welcom your vrefiy code is $vrefiyCode");
    $data =array(
        'user_vrefiycode' =>  $vrefiyCode,
    );
   updateData('users' ,$data, "user_email = '$email'");
}else {
    printFaliure('email not found');
}