<?php 

include './connect.php';
$table = "users";
// $name = filterRequest("namerequest");
$data = array( 
"name" => "mahmoud",
"email" => "memo@gmail.com",
"phone" => "324234",
"password" => "hdfjksdhfsdk",
"vrefiycode" => "32432",       
);
$count = insertData($table , $data);