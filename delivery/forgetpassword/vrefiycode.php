<?php

include '../../connect.php';

$email = filterRequest('email');
$vrefiyCode = filterRequest('vrefiycode');


$stmt = $con->prepare("SELECT * FROM `delivery` WHERE `delivery_email` =? AND `delivery_vrefiycode` = ?");

$stmt->execute(array($email , $vrefiyCode));

$count = $stmt->rowCount();

printResult($count,'Your Vrefiy Code Correct' , 'Your Vrefiy Code Not Correct! Please Enter Vaild Code.');