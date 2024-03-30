<?php

include '../connect.php';

$email = filterRequest('email');
$vrefiyCode = filterRequest('vrefiycode');


$stmt = $con->prepare("SELECT * FROM `users` WHERE `user_email` =? AND `user_vrefiycode` = ?");

$stmt->execute(array($email , $vrefiyCode));

$count = $stmt->rowCount();

printResult($count,'Your Vrefiy Code Correct' , 'Your Vrefiy Code Not Correct! Please Enter Vaild Code.');