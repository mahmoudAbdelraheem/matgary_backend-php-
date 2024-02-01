<?php

include '../connect.php';

$email = filterRequest('email');

$vrefiyCode = rand(10000 , 99999);

$stmt  = $con->prepare("SELECT * FROM `users` WHERE `email` = ?");

$stmt->execute(array($email));

$count = $stmt->rowCount();

printResult($count , 'email found' , 'email not found');


//? if user email is found 
if($count > 0){

    //? send new email vrefiy code and save it in database
    $data = array(
        "vrefiycode"=> $vrefiyCode,
    );

    //? json =false for make sure that updata data func don't print eny thing
    updateData("users",$data ,"email = '$email'" , false);

}
