<?php


//? get user canseld order
include '../connect.php';

$userId = filterRequest("id");

getAllData('orderview' ,"order_user_id = '$userId' AND order_status = 4");

//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,