<?php
//? get all pending orders
include "../../connect.php";

getAllData('orderview' , "order_status = 1");

//? 0 => pending approval , 
//? 1 => order approve and prepare, 
//? 2 => on delivery order , 
//? 3 => archive order and , 
//? 4 => canceld order ,