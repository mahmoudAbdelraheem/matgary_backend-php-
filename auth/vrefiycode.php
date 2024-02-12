<?php

include '../connect.php';

$email = filterRequest('email');
$vrefiyCode = filterRequest('vrefiycode');


$stmt = $con->prepare("SELECT * FROM `users` WHERE `user_email` =? AND `user_vrefiycode` = ?");

$stmt->execute(array($email , $vrefiyCode));

$count = $stmt->rowCount();

if($count >0 ){
    //? update user approve to 1 if the vrefiy code is correct
    $data = array(
        "user_approve"=>"1",
    );
    updateData('users' ,$data ,"user_email = '$email'");
    
}else {
    printFaliure("Your Vrefiy Code Not Correct! Please Enter Vaild Code.");
}