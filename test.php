<?php 

include "connect.php";

//$email = filterRequest('email');
$password = filterRequest('password');

// Hash the password
//$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT );

// Use prepared statement to prevent SQL injection
// $stmt = $con->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ? AND `approve` = 1");
// $stmt->execute([$email, $hashedPassword]);

// // Fetch the result
// $user = $stmt->fetch();

// if ($user>0) {
//      echo json_encode(array("status" => "success", "data" => $user));
// } else {
//      echo json_encode(array("status" => "failuer"));
// }
echo json_encode(array("hashed pass" => $hashedPassword));