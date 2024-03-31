<?php
//? get user on demand orders
include "../../connect.php";

 getAllData('orderview' , "1=1 AND order_status = 0 OR order_status = 1");
