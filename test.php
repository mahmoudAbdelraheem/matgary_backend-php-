<?php 
// $to = 'mmoud2031@gmail.com';
// $title= 'hi';
// $body = 'from back end test.php';
// $header = 'From: support@memo.com' . '\n' . 'CC:mmoud2031@gmail.com';
// mail($to,$title,$body,$header);


// include "connect.php";

// getAllData("users" ,"1=1");



// include "connect.php";

// $email = filterRequest('email');
// $pass = sha1('password'); //! sha1 for encrype password



include "connect.php";

$pass = sha1($_POST['password']);

$stmt = $con->prepare("SELECT * FROM `users` WHERE `id` = '19' OR `password` = ?");

$stmt->execute(array($pass));

$count =$stmt->rowCount();

if($count >0){
    echo json_encode(array("status" => "success"));
}else {
    printFaliure('Email Or password dose not Existing');
}
