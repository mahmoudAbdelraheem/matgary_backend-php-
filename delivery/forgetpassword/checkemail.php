<?php

include '../../connect.php';

$email = filterRequest('email');

$vrefiyCode = rand(10000 , 99999);

$stmt  = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_email` = ?");

$stmt->execute(array($email));

$count = $stmt->rowCount();

printResult($count , 'email found' , 'email not found');


//? if user email is found 
if($count > 0){

    //? send new email vrefiy code and save it in database
    $data = array(
        "delivery_vrefiycode"=> $vrefiyCode,
    );

    //? json =false for make sure that updata data func don't print eny thing
    updateData("delivery",$data ,"delivery_email = '$email'" , false);

}
