<?php

include '../connect.php';

$email = filterRequest('email');
$vrefiyCode = filterRequest('vrefiycode');


$stmt = $con->prepare("SELECT * FROM `users` WHERE `email` =? AND `vrefiycode` = ?");

$stmt->execute(array($email , $vrefiyCode));

$count = $stmt->rowCount();

if($count >0 ){
    //? update user approve to 1 if the vrefiy code is correct
    $data = array(
        "approve"=>"1",
    );
    updateData('users' ,$data ,"email = '$email'");
    
}else {
    printFaliure("Your Vrefiy Code Not Correct! Please Enter Vaild Code.");
}