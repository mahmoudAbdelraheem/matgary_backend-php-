<?php

//? get user archived order
include "../../connect.php";

 getAllData('orderview' , "1=1 AND order_status = 2");

