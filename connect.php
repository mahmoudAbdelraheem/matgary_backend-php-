<?php

//sql source
$host = "mysql:host=localhost";
// database name
$dbName = "matgary";
// database name & location
$dns = $host . ";dbname=" . $dbName; 
//user
$user = "root"; 
// password for user
$pass = "";
$option = array(
    // for support arabic language
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);

try{

    $con = new PDO("$dns" , $user , $pass , $option);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");


    include "./functions.php";
    if (!isset($notAuth)) {
      // checkAuthenticate();
   }

}catch(PDOException $e){
    echo "ERROR ". $e->getMessage();
}

